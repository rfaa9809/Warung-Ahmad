<nav class="bg-[#B90B0B]">
    <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8">
        <div class="flex justify-between items-center h-14 sm:h-16 lg:h-18 gap-2 sm:gap-4">
            
            <!-- LEFT SECTION: Logo & Welcome Text -->
            <div class="flex items-center gap-2 sm:gap-3 lg:gap-4 flex-shrink-0">
                <!-- Logo -->
                <img src="{{ asset('img/logo/logowarmad.png') }}" 
                     class="h-10 sm:h-12 lg:h-14 xl:h-16 object-contain" 
                     alt="Logo Warmad">

                <!-- Welcome Text - Responsive -->
                @auth
                    <!-- Mobile & Tablet - Short version -->
                    <h1 class="hidden sm:block xl:hidden text-white text-xs sm:text-sm whitespace-nowrap">
                        Halo, <span class="font-semibold">{{ Str::limit(Auth::user()->name, 10) }}</span>
                    </h1>
                    
                    <!-- Desktop & 4K - Full version -->
                    <h1 class="hidden xl:block text-white text-sm lg:text-base whitespace-nowrap">
                        Selamat datang Kembali!, 
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                    </h1>
                @endauth
            </div>

            <!-- CENTER SECTION: Search Bar - Hidden on mobile -->
            <div class="hidden md:flex flex-1 justify-center max-w-md lg:max-w-lg xl:max-w-xl">
                <form action="" method="POST" class="w-full font-[Poppins]">
                    <input type="text" 
                           placeholder="Search..."
                           class="w-full px-3 lg:px-4 py-1.5 lg:py-2 text-sm lg:text-base bg-white text-black rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 shadow-sm" />
                </form>
            </div>

            <!-- RIGHT SECTION: Icons & Nav Links -->
            <div class="flex items-center gap-2 sm:gap-3 lg:gap-4">
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-2 lg:gap-4">
                    
                    <!-- Notification Button -->
                    <button class="text-white focus:outline-none hover:text-orange-200 transition p-1">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405C18.21 14.79 18 14.4 18 14V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3c0 .4-.21.79-.595 1.595L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </button>

                    <!-- Cart Button -->
                    <a href="{{ route('cart.index') }}" 
                       class="text-white focus:outline-none hover:text-orange-200 transition p-1">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13L17 13M7 13h10M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z">
                            </path>
                        </svg>
                    </a>

                    <!-- Nav Links -->
                    <div class="flex items-center gap-4 lg:gap-6 xl:gap-9 font-[Poppins] text-sm lg:text-base">
                        <a href="{{ route('main.index') }}" 
                           class="text-white hover:text-[#FB9935] transition whitespace-nowrap">
                            Home
                        </a>
                        <a href="#" 
                           class="text-white hover:text-[#FB9935] transition whitespace-nowrap">
                            Shop
                        </a>
                        <a href="{{ route('wishlist.index') }}" 
                           class="text-white hover:text-[#FB9935] transition whitespace-nowrap">
                            Wishlist
                        </a>

                        <form method="POST" action="{{ route('auth.logout') }}">
                            @csrf
                            <button class="text-white hover:text-[#FB9935] bg-[#8C0909] px-2 lg:px-3 py-1 rounded-2xl text-sm lg:text-base transition hover:bg-[#6d0707] whitespace-nowrap">
                                Logout
                            </button>
                        </form>

                        @auth
                            @if (auth()->user()->role == 'admin')
                                <a href="{{ route('products.index') }}"
                                   class="text-white hover:text-orange-200 px-2 lg:px-3 py-1 rounded-2xl bg-green-700 text-sm lg:text-base transition hover:bg-green-800 whitespace-nowrap">
                                    Dashboard
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>

                <!-- Mobile Icons & Menu Button -->
                <div class="md:hidden flex items-center gap-3">
                    
                    <!-- Notification Button Mobile -->
                    <button class="text-white focus:outline-none">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405C18.21 14.79 18 14.4 18 14V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3c0 .4-.21.79-.595 1.595L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </button>

                    <!-- Cart Button Mobile -->
                    <a href="{{ route('cart.index') }}" class="text-white focus:outline-none">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13L17 13M7 13h10M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z">
                            </path>
                        </svg>
                    </a>

                    <!-- Mobile Menu Toggle -->
                    <button id="menu-btn" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-[#8C0909] font-[Poppins]">
        <div class="px-3 sm:px-4 py-3 sm:py-4 space-y-3">
            
            <!-- Search Bar Mobile - Di paling atas -->
            <div class="pb-3 border-b border-orange-300/30">
                <input type="text" 
                       placeholder="Search..."
                       class="w-full px-3 py-2 text-sm bg-white rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 shadow-sm" />
            </div>
            
            <!-- Welcome Text Mobile -->
            @auth
                <div class="text-white text-sm py-2 border-b border-orange-300/30">
                    Halo, <span class="font-semibold">{{ Auth::user()->name }}</span>
                </div>
            @endauth

            <!-- Navigation Links -->
            <a href="{{ route('main.index') }}" 
               class="block py-2.5 text-orange-100 hover:text-white hover:bg-[#B90B0B] px-3 rounded transition">
                Home
            </a>
            <a href="#" 
               class="block py-2.5 text-orange-100 hover:text-white hover:bg-[#B90B0B] px-3 rounded transition">
                Shop
            </a>
            <a href="{{ route('wishlist.index') }}" 
               class="block py-2.5 text-orange-100 hover:text-white hover:bg-[#B90B0B] px-3 rounded transition">
                Wishlist
            </a>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('auth.logout') }}" class="w-full">
                @csrf
                <button class="w-full block py-2.5 text-white bg-red-800 hover:bg-red-900 text-center rounded transition font-medium">
                    Logout
                </button>
            </form>

            <!-- Dashboard Button (Admin) -->
            @auth
                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('products.index') }}" 
                       class="w-full block py-2.5 text-white bg-green-700 hover:bg-green-800 text-center rounded transition font-medium">
                        Dashboard
                    </a>
                @endif
            @endauth
        </div>
    </div>
</nav>

<script>
// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
});
</script>