<x-app-layout> 
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div class="">
                <div class="flexslider">
                    <ul class="slides">

                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="">
                <h1 class="text-xl font-bold text-gray-700">{{ $product->name }}</h1>
                <div class="flex">
                    <p class="text-gray-700">Marca: <a class=" underline capitalize hover:text-orange-500"
                            href="">{{ $product->brand->name }}</a></p>
                    <p class=" text-gray-700 ml-6 mr-1">5 <i class="fas fa-star text-sm text-yellow-500"></i></p>
                    <p class=" text-orange-500 hover:text-orange-700 underline">39 reseñas</p>
                </div>
                <p class="text-2xl font-semibold text-gray-700 my-4">$ {{ $product->price }}</p>
                {{-- Tarjeta de envío --}}
                <div class="bg-white rounded-lg shadow-xl mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-lime-500 ">
                            <i class=" text-white text-sm fas fa-truck"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-lime-500">Se hacen envíos a todo el país</p>
                            <p class="text-gray-500">Recibelo el
                                {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>
                {{-- Detalles del producto --}}
                @if ($product->subcategory->size)
                    @livewire('add-cart-size',['product'=>$product])
                @elseif ($product->subcategory->color)
                    @livewire('add-cart-color',['product'=>$product])
                @else
                    @livewire('add-cart-item',['product'=>$product])
                @endif
            </div>
        </div>
    </div>


    @push('js')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
