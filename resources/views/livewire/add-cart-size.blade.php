<div x-data>
    <div class="">
        <p class="text-xl text-gray-700">Talla:</p>
        <select wire:model="size_id" class="form-control p-2 w-full">
            <option value="" selected disabled>Selecione una talla</option>
            @foreach ($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-2">
        <p class="text-xl text-gray-700">Color:</p>
        <select wire:model="color_id" class="form-control p-2 w-full">
            <option value="" selected disabled>Selecione un color</option>
            @foreach ($colors as $color)
                <option class=" capitalize" value="{{ $color->id }}">{{ __($color->name) }}</option>
            @endforeach
        </select>
    </div>
    <p class="text-gray-700 my-4">
        <span class="font-semibold text-lg">Stock disponible:</span>
        @if ($quantity)
            {{ $quantity }}
        @else
            {{ $product->stock/*  -$carts */}}
        @endif
    </p>
    <div class="flex">
        <div class="mr-4 ">
            <x-jet-secondary-button disabled 
            x-bind:disabled="$wire.qty <= 1" 
            wire:loading.attr="disabled"
            wire:target="decrement" 
            wire:click="decrement">
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-gray-700">
                {{ $qty }}
            </span>
            <x-jet-secondary-button 
            x-bind:disabled="$wire.qty >= $wire.quantity" 
            wire:loading.attr="disabled"
                wire:target="increment" 
                wire:click="increment">
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-button color="orange" class="w-full" 
            x-bind:disabled="{{-- $wire.qty >  --}}!$wire.quantity"
                {{-- x-bind:disabled='!$wire.quantity' --}} 
                wire:click="addItem" 
                wire:loading.attr="disabled" 
                wire:target="addItem">>

                Agregar al carrito de compras

            </x-button>
        </div>
    </div>
</div>
