<div class="container py-8 grid grid-cols-5 gap-6">

    <div class=" col-span-3">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="mb-4">
                <x-jet-label>Nombre de contácto</x-jet-label>
                <x-jet-input type='text' placeholder='Ingrese el nombre de la persona que recibirá el pedido'
                    class='w-full'
                    wire:model.defer="contact">
                </x-jet-input>
                <x-jet-input-error for="contact"></x-jet-input-error>
            </div>
            <div class="">
                <x-jet-label>Teléfono de contácto</x-jet-label>
                <x-jet-input type='text' placeholder='Ingrese el número de teléfono de contacto' 
                class='w-full'
                wire:model.defer="phone">
            </x-jet-input>
            <x-jet-input-error for="phone"></x-jet-input-error>
            </div>
        </div>
        <div class="" x-data="{ envio_type: @entangle('envio_type') }">
            <p class=" mt-6 mb-3 text-lg text-gray-700 font-semibold">Envíos</p>

            <x-jet-label class=" bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4">
                <x-jet-input class=" text-gray-700" name="envio_type" value="1" 
                x-model="envio_type" type="radio"
                    name="envio"></x-jet-input>
                <span class="ml-2 text-gray-700">Retirar por tienda (Calle: Santa Cruz nº376)</span>
                <span class=" font-semibold text-gray-700 ml-auto">Gratis</span>
            </x-jet-label>
            <div class="bg-white rounded-lg shadow ">
                <x-jet-label class=" px-6 py-4 flex items-center">
                    <x-jet-input class=" text-gray-700" name="envio_type" value="2" 
                    x-model="envio_type" type="radio"
                        name="envio"></x-jet-input>
                    <span class="ml-2 text-gray-700">Envío a domicilio</span>
                    <span class=" font-semibold text-gray-700 ml-auto">$</span>
                </x-jet-label>

                <div class="hidden" :class="{'hidden':envio_type!=2}">
                    <div class="px-6 pb-6 grid grid-cols-2 gap-6 ">
                        {{-- Departments --}}
                        <div class="">
                            <x-jet-label value="Departamento" />
                            <select class="form-control p-2 w-full" 
                            wire:model="department_id">
                                <option value="" disabled>Seleccione un departamento</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="department_id"></x-jet-input-error>
                        </div>
                        {{-- Cities --}}
                        <div class="">
                            <x-jet-label value="Ciudades" />
                            <select class="form-control p-2 w-full" 
                            wire:model="city_id">
                                <option value="" disabled>Seleccione una cuidad</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="city_id"></x-jet-input-error>
                        </div>
                        {{-- Districts --}}
                        <div class="">
                            <x-jet-label value="Distritos" />
                            <select class="form-control p-2 w-full" 
                            wire:model="district_id">
                                <option value="" disabled>Seleccione un distrito</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="district_id"></x-jet-input-error>
                        </div>
                        {{-- Dirección --}}
                        <div class="">
                            <x-jet-label value="Dirección" />
                            <x-jet-input type="text" class="form-control w-full"
                                placeholder="Ingrese la dirección de entrega" 
                                wire:model="address"></x-jet-input>
                                <x-jet-input-error for="address"></x-jet-input-error>
                            </div>
                        {{-- Referencia --}}
                        <div class=" col-span-2">
                            <x-jet-label value="Referencias" />
                            <x-jet-input type="text" class="form-control w-full" placeholder="" 
                            wire:model="references">
                            </x-jet-input>
                            <x-jet-input-error for="references"></x-jet-input-error>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="">
            <x-jet-button class="mt-6 mb-4 " 
                wire:click="create_order"
                wire:loading.attr="disabled" 
                wire:target="create_order">
                Conticuar con la compra
            </x-jet-button>
            <hr>
            <p class=" text-sm text-gray-700 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis
                veniam odit beatae assumenda deleniti delectus architecto aspernatur provident nobis porro quo,
                voluptates, culpa atque odio iure dolor voluptatum? Magni, suscipit! <a href=""
                    class=" font-semibold text-orange-500">Politicas de compra</a></p>
        </div>
    </div>

    <div class="col-span-2">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4 rounded-sm" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class=" font-bold">{{ $item->name }}</h1>
                            <div class="flex">
                                <p>Cant: {{ $item->qty }}</p>
                                @isset($item->options['color'])
                                    <p class="mx-2">- Color: {{ __($item->options->color) }}</p>
                                @endisset
                                @isset($item->options['size'])
                                    <p class="mx-2">{{ __($item->options->size) }}</p>
                                @endisset
                            </div>

                            <p>$ {{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            No tiene agregado ningun item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            <div class="text-gray-700 mt-4">
                <p class="flex justify-between items-center">
                    Subtotal:
                    <span class=" font-semibold">$ {{ str_replace(',','',Cart::subtotal()) }}</span>
                </p>
                <p class="flex justify-between items-center">
                    Envío:
                    <span class=" font-semibold">
                        @if ($envio_type==1 || $shipping_cost==0)
                            Gratis
                        @else
                            $ {{$shipping_cost}}
                        @endif
                    </span>
                </p>
                <hr class="mt-4 mb-3">
                <p class="flex justify-between items-center font-semibold">
                    <span class=" text-lg"> Total:</span>
                    @if ($envio_type==1)
                        $ {{ str_replace(',','',Cart::subtotal())}}
                    @else
                        $ {{ str_replace(',','',Cart::subtotal()) + $shipping_cost }}
                    @endif
                </p>
            </div>
        </div>

    </div>
</div>
