@php($routes = [(object) ['name' => 'Rate Your Anime', 'url' => '/'], (object) ['name' => 'About Us', 'url' => 'about'], (object) ['name' => 'Admin Panel', 'url' => 'admin']])

<nav class="bg-gray-800 w-full">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <!-- Mobile menu-->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>

                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block h-8 w-auto" src="/svg/fox-color.svg" alt="Rate Your Anime Logo">
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        @foreach ($routes as $route)
                            @if (Request::is($route->url))
                                <a href="{{ url($route->url) }}"
                                    class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                                    aria-current="page">
                                    {{ $route->name }}
                                </a>
                            @else
                                <a href="{{ url($route->url) }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                    {{ $route->name }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                <div class="hidden relative mr-2 md:block">
                    <input type="text" id="navbarSearch"
                        class="block p-2 w-full rounded-lg border sm:text-sm bg-gray-700 border-gray-300 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search...">
                </div>

                @if (Auth::check())
                    <a href="/profile" id="profileButton"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Profile
                    </a>
                @else
                    <a href="{{ url('/login') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Sign in
                    </a>
                @endif



            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @foreach ($routes as $route)
                @if (Request::is($route->url))
                    <a href="{{ url($route->url) }}"
                        class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
                        aria-current="page">
                        {{ $route->name }}
                    </a>
                @else
                    <a href="{{ url($route->url) }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{ $route->name }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</nav>
