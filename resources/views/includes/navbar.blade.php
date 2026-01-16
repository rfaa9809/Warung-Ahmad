<nav class="bg-[#B90B0B]">
        <div class="max-w-7xl mx-auto px-2 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <img src="{{ asset('img/logo/logowarmad.png') }}" class="h-full">
                    {{-- Logged Username (Only will show if the user has logged in) --}}
                    @auth
                        <h1 class="text-white">Selamat datang Kembali!, <span class="font-semibold">{{ Auth::user()->name }}</span></h1>
                    @endauth
                <div class="flex gap-3">


                    <!-- Search Bar (hidden on mobile) -->
                    <div class="hidden md:flex flex-1 justify-center px-4">
                        <form action="" method="POST" class="font-[Poppins] w-[300px]">
                            <input type="text" placeholder="Search..."
                                class="w-full px-3 py-1.5 bg-white text-black rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500" />
                        </form>
                    </div>

                    <!-- Notification Button Desktop -->
                    <button class="hidden lg:block text-white focus:outline-none mr-3 scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405C18.21 14.79 18 14.4 18 14V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3c0 .4-.21.79-.595 1.595L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </button>

                    <!-- Cart Button Desktop -->
                    <a href="{{ route('cart.index') }}" class="mt-1.5 hidden lg:block text-white focus:outline-none mr-5 scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13L17 13M7 13h10M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z">
                            </path>
                        </svg>
                    </a>

                    <!-- Desktop Nav Links -->
                    <div class="hidden md:flex space-x-8 items-center font-[Poppins]">
                        <a href="{{ route('main.index') }}" class="text-white hover:text-[#FB9935]">Home</a>
                        <a href="#" class="text-white hover:text-[#FB9935]">Shop</a>
                        <a href="{{ route('wishlist.index') }}" class="text-white hover:text-[#FB9935]">Wishlist</a>

                        <form method="POST" action="{{ route('auth.logout') }}">
                            @csrf
                            <button
                                class="text-white hover:text-[#FB9935] bg-[#8C0909] px-3 py-1 rounded-2xl">Logout</button>
                        </form>
                        @auth
                            @if (auth()->user()->role == 'admin')
                                <a href="{{ route('products.index') }}"
                                    class="text-white hover:text-orange-200 px-3 py-1 rounded-2xl bg-green-700">Dashboard</a>
                            @endif
                        @endauth
                    </div>
                </div>

                <!-- Mobile menu button and icons -->
                <div class="md:hidden mr-4 flex items-center space-x-4">
                    <!-- Notification Button Mobile -->
                    <button class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405C18.21 14.79 18 14.4 18 14V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3c0 .4-.21.79-.595 1.595L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </button>

                    <!-- Cart Button Mobile -->
                    <button class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13L17 13M7 13h10M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z">
                            </path>
                        </svg>
                    </button>

                    <!-- Mobile Menu Toggle -->
                    <button id="menu-btn" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 font-[Poppins]">
            <input type="text" placeholder="Search..."
                class="w-full mb-2 px-3 py-1.5 bg-white rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500" />
            <a href="{{ route('main.index') }}" class="block py-2 text-orange-100 hover:text-orange-600">Home</a>
            <a href="#" class="block py-2 text-orange-100 hover:text-orange-600">Contact</a>
            <a href="#" class="block py-2 text-orange-100 hover:text-orange-600">Wishlist</a>
            <form method="POST" action="{{ route('auth.logout') }}" class="w-full">
                @csrf
                <button
                    class="w-full block py-1 text-orange-100 hover:text-orange-600 bg-red-800 text-center">Logout</button>
            </form>
            @auth
                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('products.index') }}" class="w-full block py-1 text-orange-100 hover:text-orange-600 bg-green-800 mt-2 text-center"">Dashboard</a>
                @endif
            @endauth
        </div>
    </nav>