<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $planes = Plan::all();
        return view('planes', compact("planes"));
    }

    public function getPlan(Plan $plan, Request $req)
    {

        $intent = auth()->user()->createSetupIntent();
        return view("contratar", compact("plan", "intent"));
    }

    public function contratar(Plan $plan, Request $req)
    {
            // return view("contrato_success");
        try {
            if ($req->contrato == 'unico') {
                $stripeCharge = $req->user()->charge(
                    1000,
                    $req->paymentMethodId
                );
                echo 'unico';
            } else {

                $req->user()->newSubscription($req->plan)->meteredPrice('price_1OEKbnKfuYCQVBMcKc3J3sle')->create($req->token);
                echo 'suscipcion';

            }
            return view("contrato_success");
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
