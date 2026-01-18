{{-- category-carousel.blade.php - FULLY RESPONSIVE --}}
@props(['title', 'description', 'products', 'categoryName'])

@php
    $productCount = $products->count();
@endphp

<div class="max-w-7xl mx-auto mt-6 sm:mt-8 lg:mt-10 xl:mt-12 mb-6 sm:mb-8 lg:mb-10 font-[Poppins]">
    {{-- Header Section --}}
    <div class="mb-4 sm:mb-5 lg:mb-6 px-4 sm:px-6 lg:px-8 carousel-header">
        <h2 class="mb-2 text-lg sm:text-xl lg:text-2xl xl:text-3xl font-semibold">{{ $title }}</h2>
        <p class="text-xs sm:text-sm lg:text-base text-gray-600">{{ $description }}</p>
    </div>

    {{-- Carousel Container --}}
    <div class="relative px-8 sm:px-10 lg:px-12 xl:px-14" x-data="carousel({{ $productCount }})">
        
        {{-- Carousel Wrapper --}}
        <div class="overflow-hidden">
            <div class="flex transition-transform duration-500 ease-in-out" 
                 :style="`transform: translateX(-${currentSlide * 100}%)`">
                
                {{-- Group products into slides --}}
                @php
                    $productsArray = $products->values()->all();
                    $slides = [];
                    $itemsPerSlide = 3; // desktop default
                    
                    // Create slides for desktop (3 items per slide)
                    for ($i = 0; $i < count($productsArray); $i += $itemsPerSlide) {
                        $slides[] = array_slice($productsArray, $i, $itemsPerSlide);
                    }
                @endphp

                @foreach ($slides as $slideIndex => $slideProducts)
                <div class="w-full flex-shrink-0 px-2 sm:px-3 lg:px-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-5 xl:gap-6">
                        @foreach ($slideProducts as $product)
                        <div class="w-full product-card-wrapper">
                            {{-- Product Card - RESPONSIVE --}}
                            <div class="w-full overflow-hidden transition bg-white shadow-sm rounded-xl lg:rounded-2xl hover:shadow-lg h-full product-card">
                                
                                {{-- IMAGE - Responsive height --}}
                                <div class="bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center h-[160px] sm:h-[180px] lg:h-[200px] xl:h-[220px] 2xl:h-[240px] p-3 sm:p-4">
                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="object-contain max-h-full"
                                    >
                                </div>

                                <div class="p-3 sm:p-4 lg:p-5 space-y-2 sm:space-y-3">
                                    {{-- CATEGORY + STOCK --}}
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                            {{ $product->category }}
                                        </span>
                                        <span class="px-2 py-0.5 text-xs font-medium rounded-full
                                            {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $product->stock > 0 ? 'Tersedia' : 'Habis' }} ({{ $product->stock }})
                                        </span>
                                    </div>

                                    {{-- Product Name - Responsive text --}}
                                    <h3 class="text-sm sm:text-base lg:text-lg font-semibold leading-tight line-clamp-2 min-h-[40px] sm:min-h-[48px] lg:min-h-[56px]">
                                        {{ $product->name }}
                                    </h3>

                                    {{-- Description --}}
                                    <p class="text-xs sm:text-sm text-gray-500 line-clamp-2 min-h-[32px] sm:min-h-[36px] lg:min-h-[40px]">
                                        {{ $product->description ?? 'No description has added yet.' }}
                                    </p>

                                    {{-- PRICE + ACTION --}}
                                    <div class="flex items-center justify-between pt-2 sm:pt-3">
                                        <span class="text-base sm:text-lg lg:text-xl xl:text-2xl font-bold text-red-600">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>

                                        <div class="flex items-center gap-2 sm:gap-3">
                                            {{-- Wishlist --}}
                                            <form method="POST" action="{{ route('wishlist.add', $product->id) }}">
                                                @csrf
                                                <button
                                                    class="{{ auth()->user() && auth()->user()->wishlistItems()->where('product_id', $product->id)->exists() 
                                                        ? 'text-red-500' 
                                                        : 'text-gray-400 hover:text-red-500' }} transition"
                                                    aria-label="Wishlist"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 sm:w-6 sm:h-6"
                                                        viewBox="0 0 24 24"
                                                        fill="{{ auth()->user() && auth()->user()->wishlistItems()->where('product_id', $product->id)->exists() ? 'currentColor' : 'none' }}"
                                                        stroke="currentColor"
                                                        stroke-width="2">
                                                        <path d="M12.1 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6 4 4 6.5 4c1.74 0 3.41 1.01 4.13 2.44h.74C13.09 5.01 14.76 4 16.5 4 19 4 21 6 21 8.5c0 3.78-3.4 6.86-8.65 11.54l-1.45 1.31z"/>
                                                    </svg>
                                                </button>
                                            </form>

                                            {{-- Cart --}}
                                            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                                @csrf
                                                <button
                                                    class="{{ auth()->user() && auth()->user()->cartItems()->where('product_id', $product->id)->exists() 
                                                        ? 'text-blue-500' 
                                                        : 'text-gray-400 hover:text-blue-500' }} transition"
                                                    {{ $product->stock <= 0 ? 'disabled' : '' }}
                                                    aria-label="Cart"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 sm:w-6 sm:h-6"
                                                        fill="{{ auth()->user() && auth()->user()->cartItems()->where('product_id', $product->id)->exists() ? 'currentColor' : 'none' }}"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13L17 13M9 21h6"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        {{-- Navigation Buttons - Responsive sizing --}}
        @if($productCount > 3)
        <button 
            @click="prevSlide()" 
            x-show="currentSlide > 0"
            class="absolute left-0 top-1/2 -translate-y-1/2 z-30 bg-white rounded-full p-1.5 sm:p-2 shadow-lg hover:bg-gray-50 transition">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <button 
            @click="nextSlide()" 
            x-show="currentSlide < totalSlides - 1"
            class="absolute right-0 top-1/2 -translate-y-1/2 z-30 bg-white rounded-full p-1.5 sm:p-2 shadow-lg hover:bg-gray-50 transition">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        {{-- Indicators - Responsive sizing --}}
        <div class="flex justify-center gap-1.5 sm:gap-2 mt-4 sm:mt-5 lg:mt-6">
            <template x-for="i in totalSlides" :key="i">
                <button 
                    @click="currentSlide = i - 1"
                    :class="currentSlide === (i - 1) ? 'bg-gray-800 w-6 sm:w-8' : 'bg-gray-300 w-2.5 sm:w-3'"
                    class="h-2.5 sm:h-3 rounded-full transition-all duration-300">
                </button>
            </template>
        </div>
        @endif

    </div>
</div>

{{-- Alpine.js Component --}}
@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('carousel', (totalItems) => ({
        currentSlide: 0,
        itemsPerSlide: 3,
        
        get totalSlides() {
            return Math.ceil(totalItems / this.itemsPerSlide);
        },
        
        nextSlide() {
            if (this.currentSlide < this.totalSlides - 1) {
                this.currentSlide++;
            }
        },
        
        prevSlide() {
            if (this.currentSlide > 0) {
                this.currentSlide--;
            }
        }
    }))
})
</script>
@endpush