<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
    return view('aboutUs');
})->name('about_us');

Route::get('/service', function(){
    return view('service');
})->name('service');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::get('/auth-face/redirect', [AuthController::class, 'redirect_face'])->name('auth.redirect.face');
 
Route::get('/auth-face/callback', [AuthController::class, 'callback_face'])->name('auth.callback.face');

Route::get('/auth-google/redirect', [AuthController::class, 'redirect_google'])->name('auth.redirect.g');
 
Route::get('/auth-google/callback', [AuthController::class, 'callback_google'])->name('auth.callback.g');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/products', [ProductController::class, 'getroducts'])->name('products.all');
    Route::get('/formulario', [ProductController::class, 'labFormulario'])->name('formulario');

    Route::post('/buy_product', [ProductController::class, 'checkPurchase'])->name('checkout');
     


    Route::get('/buy_success', [ProductController::class, 'checkoutSuccess'])->name('products_buy.success');
    Route::get('/buy_cancel', [ProductController::class, 'checkoutCancel'])->name('products_buy.cancel');


    Route::get('/billing', function (Request $request) {
        return $request->user()->redirectToBillingPortal(route('dashboard'));
    })->middleware(['auth'])->name('billing');


    Route::get('/test', [ProductController::class, 'lab'])->name('test');
    
});

Route::post('/webhook', [ProductController::class, 'webhook'])->name('products_buy.webhook');


require __DIR__.'/auth.php';



// Route::get('/planes', [PlanController::class, 'index'])->name('planes.mostrar');
// Route::get('/planes/{plan}', [PlanController::class, 'getPlan'])->name('plan.contratar');
// Route::post('/contratar', [PlanController::class, 'contratar'])->name('plan.create');
// Route::get('/subscription-checkout', function (Request $request) {
//     return $request->user()
//         ->newSubscription('default', 'price_basic_monthly')
//         ->trialDays(5)
//         ->allowPromotionCodes()
//         ->checkout([
//             'success_url' => route('your-success-route'),
//             'cancel_url' => route('your-cancel-route'),
//         ]);
// });