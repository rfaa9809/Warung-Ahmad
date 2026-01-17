{{-- category-carousel.blade.php --}}
@props(['title', 'description', 'products', 'categoryName'])

@php
    $productCount = $products->count();
@endphp

<div class="max-w-7xl mx-auto mt-10 mb-10 font-[Poppins]">
    {{-- Header Section --}}
    <div class="mb-6 carousel-header">
        <h2 class="mb-2 text-2xl font-semibold">{{ $title }}</h2>
        <p class="text-sm text-gray-600">{{ $description }}</p>
    </div>

    {{-- Carousel Container --}}
    <div class="relative px-12" x-data="carousel({{ $productCount }})">
        
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
                <div class="flex-shrink-0 w-full">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($slideProducts as $product)
                        <div class="w-full product-card-wrapper">
                            {{-- Product Card --}}
                            <div class="w-full h-full overflow-hidden transition bg-white shadow-sm rounded-2xl hover:shadow-lg product-card">
                                
                                {{-- IMAGE --}}
                                <div class="bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center h-[220px] p-4">
                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="object-contain max-h-full"
                                    >
                                </div>

                                <div class="p-5 space-y-3">
                                    {{-- CATEGORY + STOCK --}}
                                    <div class="flex items-center gap-2">
                                        <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                            {{ $product->category }}
                                        </span>
                                        <span class="px-2 py-0.5 text-xs font-medium rounded-full
                                            {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $product->stock > 0 ? 'Tersedia' : 'Habis' }} ({{ $product->stock }})
                                        </span>
                                    </div>

                                    {{-- Product Name --}}
                                    <h3 class="text-lg font-semibold leading-tight line-clamp-2 min-h-[56px]">
                                        {{ $product->name }}
                                    </h3>

                                    {{-- Description --}}
                                    <p class="text-sm text-gray-500 line-clamp-2 min-h-[40px]">
                                        {{ $product->description ?? 'No description has added yet.' }}
                                    </p>

                                    {{-- PRICE + ACTION --}}
                                    <div class="flex items-center justify-between pt-3">
                                        <span class="text-xl font-bold text-red-600">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>

                                        <div class="flex items-center gap-3">
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
                                                        class="w-6 h-6"
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
                                                        class="w-6 h-6"
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

        {{-- Navigation Buttons - Only show if more than 3 products --}}
        @if($productCount > 3)
        <button 
            @click="prevSlide()" 
            x-show="currentSlide > 0"
            class="absolute left-0 z-30 p-2 transition -translate-y-1/2 bg-white rounded-full shadow-lg top-1/2 hover:bg-gray-50">
            <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <button 
            @click="nextSlide()" 
            x-show="currentSlide < totalSlides - 1"
            class="absolute right-0 z-30 p-2 transition -translate-y-1/2 bg-white rounded-full shadow-lg top-1/2 hover:bg-gray-50">
            <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        {{-- Indicators --}}
        <div class="flex justify-center gap-2 mt-6">
            <template x-for="i in totalSlides" :key="i">
                <button 
                    @click="currentSlide = i - 1"
                    :class="currentSlide === (i - 1) ? 'bg-gray-800 w-8' : 'bg-gray-300 w-3'"
                    class="h-3 transition-all duration-300 rounded-full">
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