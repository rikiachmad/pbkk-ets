<header class="shadow-sm bg-white">
    <div class="p-4 mx-auto max-w-screen-xl">
        <div class="flex items-center justify-between space-x-4 lg:space-x-10">
            <div class="flex lg:w-3 lg:flex-1">
                <x-application-logo width="50" height="50" />
            </div>

            <nav class="hidden text-sm font-medium space-x-8 md:flex">
                <a href="/" class="{{ Request::is('/') ? 'text-blue-500' : 'text-gray-500' }}">Home</a>
                <a href="/books" class="{{ Request::is('books') ? 'text-blue-500' : 'text-gray-500' }}">Katalog</a>
                <a href="/contact" class="{{ Request::is('contact') ? 'text-blue-500' : 'text-gray-500' }}">Hubungi
                    Kami</a>
            </nav>

            @auth
            <div class="inline-block py-2 border-l border-gray-200">
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm space-x-2 font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : 'https://source.unsplash.com/500x400?people' }}" alt="" class="rounded-full h-6 w-6">
                                <div>{{ Auth::user()->name }}</div>
    
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
    
                        <x-slot name="content">
                            @can('admin')
                            <x-dropdown-link href="/dashboard">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            @endcan
                            <x-dropdown-link href="/profile/{{ auth()->user()->username }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="">
                                {{ __('Settings') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        class="text-red-600"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>


            @else
            <div class="items-center justify-end flex-1 hidden space-x-4 sm:flex">
                <a href="{{ route('login') }}"
                    class="px-5 py-2 text-sm font-medium text-gray-500 bg-gray-100 rounded-lg transition duration-300 hover:bg-gray-200">Log
                    in</a>
                <a href="{{ route('register') }}"
                    class="px-5 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg transition duration-300 hover:bg-blue-700">Sign
                    up</a>
            </div>
            @endauth

            <div class="lg:hidden">
                <button class="p-2 text-gray-600 bg-gray-100 rounded-lg" type="button">
                    <span class="sr-only">Open menu</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <script>

    </script>
</header>