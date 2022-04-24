<div>
    <div class="bg-white rounded-b-lg shadow-xl mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class=" font-semibold uppercase text-gray-700">{{ $category->name }}</h1>
            <div class="grid grid-cols-2 border-2 rounded-xl  border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i wire:click="$set('view','grid')"
                    class="{{ $view == 'grid' ? 'text-orange-500 ' : ' ' }}
                     rounded-l-lg cursor-pointer fas fa-border-all p-3 "></i>
                <i wire:click="$set('view','list')"
                    class="{{ $view == 'list' ? 'text-orange-500 ' : '' }}
                     rounded-r-lg cursor-pointer fas fa-rectangle-list p-3  font-medium"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5  gap-6">
        <aside>
            <h2 class=" font-semibold text-center mb-2">Subcategorías</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a class=" hover:text-orange-500 capitalize {{ $subcategoria == $subcategory->name ? 'text-orange-500 font-semiblod' : '' }}"
                            {{-- href="" --}} wire:click="$set('subcategoria','{{ $subcategory->name }}')">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <h2 class=" font-semibold text-center mb-2 mt-4">Marcas</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm">
                        <a class=" hover:text-orange-500 capitalize {{ $marca == $brand->name ? 'text-orange-500 font-semiblod' : '' }}"
                            {{-- href="" --}} wire:click="$set('marca','{{ $brand->name }}')">
                            {{ $brand->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <x-jet-button class="mt-4" wire:click='limpiar'>
                Eliminar filtros
            </x-jet-button>
        </aside>
        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
                {{-- Grid --}}
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($products as $product)
                        <li class="bg-white rounded-lg shadow overflow-auto">

                            <article>
                                <figure>
                                    <a href="{{ route('products.show', $product) }}"><img
                                            class="h-48 w-full object-cover object-center"
                                            src="{{ Storage::url($product->images->first()->url) }}" alt=""></a>
                                </figure>

                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold">
                                        <a href="{{ route('products.show', $product) }}">
                                            {{ Str::limit($product->name, 20) }}
                                        </a>
                                    </h1>

                                    <p class="font-bold text-gray-700">$ {{ $product->price }}</p>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @else
                {{-- List --}}
                <ul>
                    @foreach ($products as $product)
                        <x-product-list :product='$product'/>
                    @endforeach
                </ul>
            @endif


            <div class="">
                {{ $products->links() }}
            </div>
        </div>

    </div>


</div>
