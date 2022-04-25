<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WebhooksController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\ShoppingCart;

Route::get('/', WelcomeController::class)->name('index');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('search', SearchController::class)->name('search');
Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');


route::middleware(['auth'])->group(function () {

    Route::get('orders', [OrderController::class,'index'])->name('orders.index');

    Route::get('orders/create', CreateOrder::class)->name('orders.create');

    Route::get('orders/pay', [OrderController::class, 'pay']);
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/{request}/pay', [OrderController::class, 'pay'])->name('orders.pay');
    Route::get('orders/{order}/payment', [OrderController::class, 'payment'])->name('orders.payment');

    Route::post('webhooks', WebhooksController::class);
});



/* Route::get('pays/success', [Controller::class,'success'])->name('pays.success');
Route::get('pays/failure', [Controller::class,'failure'])->name('pays.failure');
Route::get('pays/pending', [Controller::class,'pending'])->name('pays.pending'); */


/* Route::get('orders/pay', function (Request $request) {
    return  redirect()->route('orders.pay',$request);
})->name('pay');
 */