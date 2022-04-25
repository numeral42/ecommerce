<x-app-layout>

    <div class=" max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">
            <div class="relative">
                <div
                    class="{{ $order->status >= 2 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full flex h-12 w-12 items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <div class="absolute -left-6 mt-0.5">
                    Comfirmada
                </div>
            </div>
            <div
                class="h-1 flex-1 {{ $order->status >= 3 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} mx-2">
            </div>
            <div class="relative">
                <div
                    class="{{ $order->status >= 3 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full flex h-12 w-12 items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>
                <div class="absolute -left-1 mt-0.5">
                    Enviada
                </div>
            </div>
            <div
                class="h-1 flex-1 {{ $order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} mx-2">
            </div>
            <div class="relative">
                <div
                    class="{{ $order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full flex h-12 w-12 items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <div class="absolute -left-3.5 mt-0.5">
                    Entregada
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class=" text-gray-700 uppercase"><span class=" font-semibold">Número de orden:</span>
                order-{{ $order->id }}
            </p>
            @if ($order->status==1)
            <x-button  onclick="window.location.href='{{route('orders.payment',$order)}}'" class="ml-auto" color="orange">Ir a pagar</x-button>
            @endif
        </div>
       
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div class="">
                    <p class="text-lg font-semibold uppercase">Envío</p>
                    @if ($order->envio_type == 1)
                        <p class="text-sm">Los productos deben de ser retirados en la tienda:</p>
                        <p class="text-sm">Santa cruz Nº376</p>
                    @else
                        <p class="text-sm">Los productos seran enviados a:</p>
                        <p class="text-sm capitalize">{{ $order->address }}</p>
                        <p>{{ $order->department->name }}-{{ $order->city->name }}-{{ $order->district->name }}
                        </p>
                    @endif
                </div>
                <div class="">
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                    <p class="text-sm">Persona que recibira el producto: {{ $order->contact }}</p>
                    <p class="text-sm">Teléfono de contacto: {{ $order->phone }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>
            <table class="table-auto w-full text-center">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class=" divide-y divide-gray-200">

                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class=" flex ">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                        alt="">
                                    <article>
                                        <h1 class=" font-bold">{{ $item->name }}</h1>
                                        <div class="flex text-xs">
                                            @isset($item->options->color)
                                                Color: {{ __($item->options->color) }}
                                            @endisset
                                            @isset($item->options->size)
                                                - {{ $item->options->size }}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>
                            <td>$ {{ $item->price }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>$ {{ $item->price * $item->qty }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
