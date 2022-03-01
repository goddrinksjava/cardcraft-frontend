@php($routes = [(object) ['name' => 'Rate Your Anime', 'url' => '/'], (object) ['name' => 'About Us', 'url' => 'about'], (object) ['name' => 'Admin Panel', 'url' => 'admin']])

<nav class="bg-gray-800">
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
                <button type="button"
                    class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <div class="hidden relative mr-3 md:mr-0 md:block">
                        <input type="text" id="email-adress-icon"
                            class="block p-2 pl-10 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search...">
                    </div>
                </button>

                <a href="{{ url('/sign-in') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Sign in
                </a>

                <div class="ml-3 relative">
                    <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-0">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-2">Sign out</a>
                    </div>
                </div>
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
