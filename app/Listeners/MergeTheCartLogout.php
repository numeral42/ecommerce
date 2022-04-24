<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Gloudemans\Shoppingcart\Facades\Cart;

class MergeTheCartLogout
{

    public function __construct()
    {
        //
    }

    public function handle(Logout $event)
    {
        //Eliminar registro
        //Cart::erase(auth()->user()->id);

        //Nuevo registro
        Cart::store(auth()->user()->id);
    }
}
