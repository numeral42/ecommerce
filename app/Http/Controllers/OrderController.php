<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{
    public function payment(Order $order)
    {
        $this->authorize('author', $order);
        $this->authorize('payment', $order);

        $items = json_decode($order->content);

        return view('orders.payment', compact('order', 'items'));
    }

    public function show(Order $order)
    {
        $this->authorize('author', $order);

        $items = json_decode($order->content);

        return view('orders.show', compact('order', 'items'));
    }

    public function pay(Request $request)
    {

        /*        $response = $request->all();
        //dump($response);

        $payment_id = $request->get('payment_id');
        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=" . config('services.mercadopago.token'));
        //echo $response;

        $response = json_decode($response);
        //dump($response);/*  */

        $status = $request->get('status');
        $order_id = $request->get('order_id');

        $order = Order::find($order_id);

        $this->authorize('author', $order);

        if ($status == 'approved') {
            $order->status = 2;
            $order->save();
        }
        return redirect()->route('orders.show', $order);
    }

    public function index()
    {

        $pendientes = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
        $aprobados = Order::where('status', 2)->where('user_id', auth()->user()->id)->count();
        $enviados = Order::where('status', 3)->where('user_id', auth()->user()->id)->count();
        $entregados = Order::where('status', 4)->where('user_id', auth()->user()->id)->count();
        $anulados = Order::where('status', 5)->where('user_id', auth()->user()->id)->count();

        $orders = Order::query()->where('user_id', auth()->user()->id);

        if (request('status')) {
            $orders->where('status',request('status'));
        }
        $orders=$orders->get();

        return view('orders.index', compact('orders', 'pendientes', 'aprobados', 'enviados', 'entregados', 'anulados'));
    }
}
