<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\ShoppingCart;


Route::get('/', WelcomeController::class)->name('index');
Route::get('categories/{category}',[CategoryController::class,'show'])->name('categories.show');

Route::get('products/{product}', [ProductController::class,'show'])->name('products.show');

Route::get('search', SearchController::class)->name('search');

Route::get('shopping-cart',ShoppingCart::class)->name('shopping-cart');

Route::get('orders/create', CreateOrder::class)->middleware('auth')->name('orders.create');
Route::get('orders/{order}/payment',[OrderController::class,'payment'])->name('orders.payment');



Route::get('prueba',function(){
    return view('prueba');
});