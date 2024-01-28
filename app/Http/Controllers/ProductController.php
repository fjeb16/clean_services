<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Fluent;
use App\Http\Requests\StorePayRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    public function getroducts()
    {
        // $products = Product::all();
        $plans = Plan::all();
        return view('product.all_products', compact('plans'));
    }

    public function labFormulario()
    {
        // $products = Product::all();
        $plans = Plan::all();
        return view('formulario', compact('plans'));
    }

    public function checkPurchase(StorePayRequest $request)
    {
        $validated = $request->validated();
        $tipo = $request->tipo;
        $orden['cuartos'] = $validated['cuartos'];
        $orden['banos_extras'] = $validated['banos_extra'];
        $orden['medio_bano_extra'] = $validated['medio_banos_extra'];
        $orden['sala_oficina'] = $validated['sala_oficina'];
        $orden['horno'] = $validated['horno'];
        $orden['refri'] = $validated['refri'];
        $orden['socalo'] = $validated['socalo'];
        $orden['zotano'] = $validated['zotano'];
        $orden['ventana'] = $validated['ventana'];
        $orden['persiana'] =  $validated['persiana'];
        $orden['mascota'] = $validated['mascotas'];

        $prices = DB::table('plans')->select('content')->where('name', $validated['tipo'])->get();

        if (count($prices) < 1)
            return response('Denied', 403);


        $prices = json_decode($prices[0]->content);

        $procesRoom = $prices->dormitorios[$orden['cuartos'] - 1];
        $procesBanosExtras = $prices->bano_extra * $orden['banos_extras'];
        $procesMedioBanosExtras = $prices->medio_bano_extra * $orden['medio_bano_extra'];
        $sala_oficina = $prices->oficina_sala * $orden['sala_oficina'];
        $horno = $prices->horno * $orden['horno'];
        $refri = $prices->refri * $orden['refri'];
        $socalo = $prices->socalo * $orden['socalo'];
        $zotano = $prices->zotano * $orden['zotano'];
        $ventana = $prices->ventana * $orden['ventana'];
        $persiana = $prices->persiana * $orden['persiana'];
        $mascota = $prices->mascota * $orden['mascota'];


        $quantity = $procesRoom + $procesBanosExtras + $procesMedioBanosExtras + $sala_oficina + $horno + $refri + $socalo + $zotano + $ventana + $persiana + $mascota;

        $fecha1 = $validated['fecha_seleccionada1'];
        $fecha2 = $validated['fecha_seleccionada2'];
        $hora1 = $validated['hora1'] . ":00:00";
        $hora2 = $validated['hora2'] . ":00:00";
        $fechaHora1 = "$fecha1 $hora1";
        $fechaHora2 = "$fecha2 $hora2";
        $productId = ($validated['id_product'] == 3)?2:$validated['id_product'];
        $product = Product::find($productId);

        $order = order::create([
            'user_id' => $request->user()->id,
            'product_id' => $product->id,
            'cuantity' => $quantity,
            'status' => 'incomplete',
            'fecha_trabajo' => Carbon::parse($fechaHora1),
            'orden' => $orden,
            'tipo' => $tipo,
            'pago' => $quantity
        ]);
        $ordersId = ['order_id' => $order->id];
        if($validated['id_product'] == 3){
            $order2 = order::create([
                'user_id' => $request->user()->id,
                'product_id' => $product->id,
                'cuantity' => $quantity,
                'status' => 'incomplete',
                'fecha_trabajo' => Carbon::parse($fechaHora2),
                'orden' => $orden,
                'tipo' => $tipo,
                'pago' => $quantity
            ]);
            $ordersId['order2_id'] = $order2->id;
            $quantity *= 2;
        }

        $stripePriceId = $product->id_product;
        if ($product->type == 'suscripcion') {
            return $request->user()
                ->newSubscription('default', $stripePriceId)->quantity($quantity)
                ->trialDays(5)
                ->allowPromotionCodes()
                ->checkout([
                    'success_url' => route('products_buy.success') . '?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => route('products_buy.cancel'),
                    'metadata' =>  $ordersId,
                ]);
        } elseif ($product->type == 'unico') {
            return $request->user()->checkout([$stripePriceId => $quantity], [
                'success_url' => route('products_buy.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('products_buy.cancel'),
                'metadata' =>  $ordersId,
            ]);
        }
        return response('', 400);
    }

    public function checkoutSuccess(Request $request): View
    {
        return view('product.product_buy_success');
    }

    public function webhook()
    {
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                $order = Order::findOrFail($session->metadata->order_id);

                $order->update(['status' => 'unico']);
                if(isset($session->metadata->order2_id)){
                    $order = Order::findOrFail($session->metadata->order2_id);

                    $order->update(['status' => 'unico']);
                }

            case 'customer.subscription.created':
                $session = $event->data->object;

                $order = Order::findOrFail($session->metadata->order_id);

                $order->update(['status' => 'suscrito']);
                if(isset($session->metadata->order2_id)){
                    $order = Order::findOrFail($session->metadata->order2_id);

                    $order->update(['status' => 'suscrito']);
                }

                // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }

    public function lab()
    {
        // $user = User::find(Auth::id());
        // $orden = order::find(22);
        $plan = new Plan;
        $plan->name = 'profundo';


        // $options['cuartos'] = 2;
        // $options['banos_extras'] = 1;
        // $options['medio_banos_extras'] = 2;
        // $options['sala_oficina'] = 2;
        // $options['horno'] = 2;
        // $options['socalo'] = 2;
        // $options['refri'] = 2;
        // $options['zotano'] = 2;
        // $options['ventana'] = 2;
        // $options['socalo'] = 2;
        // $options['persiana'] = 2;
        // $options['mascota'] = 2;
        // $optionsBasico = $product->basico;
        // $optionsProfundo = $product->profundo;

        $optionsBasico['dormitorios'] = [120, 140, 160, 190, 220];
        $optionsBasico['bano_extra'] = 25;
        $optionsBasico['medio_bano_extra'] = 15;
        $optionsBasico['oficina_sala'] = 20;
        $optionsBasico['horno'] = 40;
        $optionsBasico['refri'] = 50;
        $optionsBasico['sacalo'] = 18;
        $optionsBasico['zotano'] = 50;
        $optionsBasico['ventana'] = 10;
        $optionsBasico['persiana'] = 6;
        $optionsBasico['mascota'] = 25;

        $optionsProfundo['dormitorios'] = [190, 213, 230, 267, 297];
        $optionsProfundo['bano_extra'] = 25;
        $optionsProfundo['medio_bano_extra'] = 18;
        $optionsProfundo['oficina_sala'] = 25;
        $optionsProfundo['horno'] = 40;
        $optionsProfundo['refri'] = 50;
        $optionsProfundo['sacalo'] = 18;
        $optionsProfundo['zotano'] = 50;
        $optionsProfundo['ventana'] = 10;
        $optionsProfundo['persiana'] = 6;
        $optionsProfundo['mascota'] = 25;

        $plan->content = $optionsProfundo;

        $plan->save();


        // $product->basico = $optionsBasico;
        // $product->profundo = $optionsProfundo;

        // $product->save();
        dd($plan);
        return;
    }
}
