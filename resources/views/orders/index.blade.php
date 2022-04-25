<x-app-layout>

    <div class="container py-8">

        <section class="grid grid-cols-5 gap-6 text-white">
            <a href=" {{ route('orders.index') . '?status=1' }}"
                class="bg-gray-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class=" text-center text-2xl">{{ $pendientes }}</p>
                <p class=" text-center uppercase">Pendientes</p>
                <p class=" text-center text-2xl mt-2"><i class="fas fa-business-time"></i></p>
            </a>
            <a href=" {{ route('orders.index') . '?status=2' }}"
                class="bg-blue-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class=" text-center text-2xl">{{ $aprobados }}</p>
                <p class=" text-center uppercase">Aprobados</p>
                <p class=" text-center text-2xl mt-2"><i class="fas fa-credit-card"></i></p>
            </a>
            <a href=" {{ route('orders.index') . '?status=3' }}"
                class="bg-yellow-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class=" text-center text-2xl">{{ $enviados }}</p>
                <p class=" text-center uppercase">Enviados</p>
                <p class=" text-center text-2xl mt-2"><i class="fas fa-truck"></i></p>
            </a>
            <a href=" {{ route('orders.index') . '?status=4' }}"
                class="bg-green-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class=" text-center text-2xl">{{ $entregados }}</p>
                <p class=" text-center uppercase">Entregados</p>
                <p class=" text-center text-2xl mt-2"><i class="fas fa-check-circle"></i></p>
            </a>
            <a href=" {{ route('orders.index') . '?status=5' }}"
                class="bg-red-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class=" text-center text-2xl">{{ $anulados }}</p>
                <p class=" text-center uppercase">Anulados</p>
                <p class=" text-center text-2xl mt-2"><i class="fas fa-times-circle"></i></p>
            </a>
        </section>

        <section class="bg-white rounded-lg px-12 py-8 mt-12 text-gray-700">
            <div class="  flex justify-between items-center">
                <div class="">
                    <h1 class=" text-2xl mb-4">Pedidos recientes</h1>
                </div>
                <div class="mb-5">
                    <a href="{{ route('orders.index') }}" class="rounded-lg bg-orange-500 py-2 px-3">Ver todos</a>

                </div>

            </div>
            <ul>
                @foreach ($orders as $order)
                    <li class="">
                        <a class=" flex items-center py-2 px-4 hover:bg-gray-100"
                            href="{{ route('orders.show', $order) }}">
                            <span class="w-12 text-center">
                                @switch($order->status)
                                    @case(1)
                                        <i class="fas fa-business-time text-gray-500 opacity-50"></i>
                                    @break

                                    @case(2)
                                        <i class="fas fa-credit-card text-blue-500 opacity-50"></i>
                                    @break

                                    @case(3)
                                        <i class="fas fa-truck text-yellow-500 opacity-50"></i>
                                    @break

                                    @case(4)
                                        <i class="fas fa-check-circle text-green-500 opacity-50"></i>
                                    @break

                                    @case(5)
                                        <i class="fas fa-times-circle text-red-500 opacity-50"></i>
                                    @break

                                    @default
                                    @break
                                @endswitch
                            </span>
                            <span>
                                Order:{{ $order->id }} <br>
                                {{ $order->created_at->format('d/m/Y') }}
                            </span>
                            <div class="ml-auto w-20 ">
                                <span class="ml-auto font-bold">
                                    @switch($order->status)
                                        @case(1)
                                            Pendiente
                                        @break

                                        @case(2)
                                            Aprobado
                                        @break

                                        @case(3)
                                            Enviado
                                        @break

                                        @case(4)
                                            Entregado
                                        @break

                                        @case(5)
                                            Anulado
                                        @break

                                        @default
                                        @break
                                    @endswitch
                                </span>
                                <br>
                                <span class=" text-sm ">
                                    $ {{ $order->total }}
                                </span>
                            </div>
                            <span>
                                <i class="fas fa-angle-right ml-6"></i>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>

    </div>



</x-app-layout>
