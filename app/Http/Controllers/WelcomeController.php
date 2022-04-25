<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();

        if (auth()->user()) {
            $pendientes = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
            if ($pendientes) {
                $mensaje="Usted tiene $pendientes ordenes pendientes. <a class='font-bold' href='".route('orders.index')."?status=1'>¡¡¡Deberia revisarlas!!!</a>"; 
                session()->flash('flash.banner', $mensaje);
            }
        }



        return view('welcome', compact('categories'));
    }
}
