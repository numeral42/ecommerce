<div class="container py-8" x-data>
    <section class=" bg-white rounded-lg shadow-lg p-6 text-gray-700">
        <h1 class=" text-lg font-semibold mb-6">CARRITO DE COMPRAS</h1>

        @if (Cart::count())
            <table class="table-auto text-center w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                                    <div class="">
                                        <p class="font-bold">{{ $item->name }}</p>
                                        @if ($item->options->color)
                                            <span>Color: {{ __($item->options->color) }}</span>
                                        @endif
                                        @if ($item->options->size)
                                            <span class="mx-1">-</span>
                                            <span>{{ __($item->options->size) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>$ {{ $item->price }}</span>
                                <a class="ml-6 cursor-pointer hover:text-red-500" 
                                wire:click="delete('{{$item->rowId}}')"
                                wire:loading.class="text-red-500 opacity-25"
                                wire:target="delete('{{$item->rowId}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            <td>
                                <div class="flex justify-center">
                                    @if ($item->options->size)
                                        @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
                                    @elseif ($item->options->color)
                                        @livewire('update-cart-item-color', ['rowId' => $item->rowId],
                                        key($item->rowId))
                                    @else
                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                    @endif
                                </div>
                            </td>
                            <td>
                                $ {{ $item->price * $item->qty }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <a class=" cursor-pointer hover:underline text-sm inline-block mt-4" wire:click="destroy"><i
                    class="fas fa-trash"></i>
                Borrar carrito de compras</a>
        @else
            <div class="flex flex-col items-center">
                <x-cart />
                <p class=" text-lg text-gray-700 mt-4">TU CARRITO DE COMPRAS ESTA VACÍO</p>
                <x-button class="mt-4 px-16" color="orange"  onclick="window.location.href='/'">
                    Ir al inicio
                </x-button>
            </div>
        @endif

    </section>  
    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div class=""> 
                    <p class=" text-gray-700 ">
                        <span class="font-bold text-lg">Total: </span>
                        $ {{str_replace(',','',Cart::subTotal())}}
                    </p>
                </div>
                <div class="">
                    <x-button color="orange" onclick="window.location.href='{{route('orders.create')}}'">
                        Seguir comprando
                    </x-button>
                </div>
            </div>
        </div>
    @endif

</div>
