<x-app-layout>

    <div class="container py-8">
        <div>
            <figure>
                <img class="w-full h-80 object-cover  rounded-t-xl object-center"
                    src="{{ Storage::url($category->image) }}" alt="">
            </figure>
            @livewire('category-filter', ['category' => $category])
        </div>

    </div>

</x-app-layout>
