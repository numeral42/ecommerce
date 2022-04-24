<header class="bg-zinc-700 sticky z-50 top-0" x-data="dropdown()">
    <div class="container flex items-center h-16 justify-between sm:justify-start">
        <a x-on:click="show()"
            class="order-last md:order-first text-sm flex flex-col items-center justify-center px-6 md:px-4 bg-white cursor-pointer font-semibold h-full"
            :class="{'text-orange-500': open, 'text-white bg-opacity-25': !open}">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span :class="{'text-orange-500': open, 'text-white': !open}"
                class="text-sm hidden md:block">Categorías</span>
        </a>
        <a href="/" class="mx-6">
            <x-application-mark class=" block h-9 w-auto" />
        </a>
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>


        <div class="mx-6 relative hidden md:block">
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div>
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>


    </div>
    <nav id='navigation-menu' :class="{'block': open, 'hidden': !open}"
        class="bg-gray-700 bg-opacity-25 absolute w-full hidden">
        {{-- Menú computadora --}}
        <div class="container h-full hidden md:block">

            <div x-show="open" x-on:click.away="close()" class="grid grid-cols-4 h-full relative">

                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-gray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                            <a href="{{route('categories.show',$category)}}" class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>
                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 top-0 right-0 h-full hidden">
                                <x-navigation-subcategories :category='$category' />
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class=" col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category='$categories->first()' />
                </div>
            </div>

        </div> {{-- Menú mobil --}}
        <div class="bg-white h-full overflow-y-auto">
            <div class="container bg-gray-200 py-3 mb-2">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-gray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                        <a href="{{route('categories.show',$category)}}" class="py-2 px-4 text-sm flex items-center">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <p class="text-gray-500 px-6 my-2">
                Usuarios
            </p>
            
            @livewire('cart-mobil')

            @auth
                <a href="{{ route('profile.show') }}"
                    class="py-2 px-4 text-sm flex items-center text-gray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-address-card"></i>
                    </span>
                    Perfile
                </a>
                <a href="" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit()"
                    class="py-2 px-4 text-sm flex items-center text-gray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    </span>
                    Cerrar sesión
                </a>
                {!! Form::open(['route' => ['logout'], 'id' => 'logout-form', 'hidden']) !!}

                {!! Form::close() !!}
            @else
                <a href="{{ route('login') }}"
                    class="py-2 px-4 text-sm flex items-center text-gray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <img class="icons" src="{{asset('storage/icons/svgs/regular/circle-user.svg')}}" alt="">
                    </span>
                    Iniciar sesión
                </a>
                <a href="{{ route('register') }}"
                    class="py-2 px-4 text-sm flex items-center text-gray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-fingerprint"></i>
                    </span>
                    Registrarse
                </a>

            @endauth

        </div>

    </nav>
</header>
