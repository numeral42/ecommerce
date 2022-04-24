@props(['product'])

<li class="bg-white rounded-xl shadow-xl mb-4 ">
    <article class="flex ">
        <figure>
            <a href="{{ route('products.show', $product) }}">
                <img class="h-48 w-56 object-cover object-center rounded-l-xl"
                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
            </a>
        </figure>
        <div class="flex-1 py-4 px-6 flex flex-col">
            <div class="flex justify-between">
                <div class="">
                    <h1 class="text-lg font-semibold text-gray-700">{{ $product->name }}</h1>
                    <p class="font-bold text-gray-700">$ {{ $product->price }}</p>
                </div>
                <div class="flex items-center">
                    <ul class="flex text-sm">
                        <li><i class="fas fa-star text-yellow-500 mr-1">

                            </i></li>
                        <li><i class="fas fa-star text-yellow-500 mr-1">

                            </i></li>
                        <li><i class="fas fa-star text-yellow-500 mr-1">

                            </i></li>
                        <li><i class="fas fa-star text-yellow-500 mr-1">

                            </i></li>
                        <li><i class="fas fa-star text-yellow-500 mr-1">

                            </i></li>
                    </ul>
                    <span class="text-gray-700 text-sm">(24)</span>
                </div>
            </div>
            <div class="mt-auto mb-2">
                <x-danger-link href="{{ route('products.show', $product) }}">
                    Más información
                </x-danger-link>
            </div>
        </div>
    </article>
</li>