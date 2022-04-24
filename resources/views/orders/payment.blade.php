<x-app-layout>

    {{-- // SDK de Mercado Pago
        require base_path('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token')); --}}


    <div class=" container py-8">
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class=" text-gray-700 uppercase"><span class=" font-semibold">Número de orden:</span>
                order-{{ $order->id }}
            </p>

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
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
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
        <div class="bg-white rounded-lg shadow-lg px-6 py-2 flex justify-between items-center">
            <img class=" h-20" src="{{ Storage::url('images/pagos.png') }}" alt="">
            <div class="text-gray-700">
                <p class=" text-sm font-semibold">
                    Subtotal: $ {{ $order->total - $order->shipping_cost }}
                </p>
                <p class=" text-sm font-semibold">
                    Envío: $ {{ $order->shipping_cost }}
                </p>
                <p class=" text-lg font-semibold">
                    Total: $ {{ $order->total }}
                </p>
                <div class="cho-container"></div>
            </div>
        </div>
    </div>




</x-app-layout>
