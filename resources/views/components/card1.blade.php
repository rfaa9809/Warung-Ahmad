@props([
    'image', 
    'name', 
    'price', 
    'category', 
    'stock', 
    'product', 
    'description', 
    'addToCart', 
    'addToWishlist',
    'inCart' => false,  // New prop default false
    'inWishlist' => false  // New prop default false
])

<div class="flex items-start justify-between gap-4 p-4 border rounded-lg shadow-sm hover:shadow-md transition-shadow">
    <!-- Product Image -->
    <img src="{{ $image }}" alt="{{ $name }}"
        class="w-16 h-16 lg:w-20 lg:h-20 rounded object-cover flex-shrink-0" />
    
    <!-- Product Details -->
    <div class="flex-1 min-w-0 space-y-1">
        <!-- Title and Price -->
        <div class="flex justify-between items-start">
            <h3 class="text-sm font-semibold text-gray-900 lg:text-lg truncate">{{ $name }}</h3>
            <p class="text-sm font-medium text-gray-900 lg:text-md whitespace-nowrap ml-2">Rp. {{ $price }}</p>
        </div>
        
        <!-- Category and Status -->
        <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-800">{{ $category }}</span>
            <span class="px-2 py-0.5 text-xs font-medium rounded-full {{ ($product->stock > 0) ? ' bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}}">{{ ($product->stock > 0) ? 'Tersedia' : 'Habis'}} ({{ $stock }})</span>
        </div>
        
        <!-- Description -->
        <p class="text-xs text-gray-500 line-clamp-2 lg:text-sm lg:line-clamp-3">
            {{ $description }}
        </p>
    </div>
    
    <!-- Action Buttons -->
    <div class="flex flex-col gap-3 h-full justify-center text-gray-500 ml-2">
        <!-- Wishlist Button -->
        <form method="POST" action="{{ $addToWishlist }}">
            @csrf
            <button class="{{ $inWishlist ? 'text-red-500' : 'text-gray-500 hover:text-red-500' }} transition-colors" 
                    aria-label="{{ $inWishlist ? 'Remove from wishlist' : 'Add to wishlist' }}">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5 lg:h-6 lg:w-6" 
                     viewBox="0 0 24 24" 
                     fill="{{ $inWishlist ? 'currentColor' : 'none' }}" 
                     stroke="currentColor"
                     stroke-width="{{ $inWishlist ? '0' : '2' }}">
                    <path d="M12.1 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6 4 4 6.5 4c1.74 0 3.41 1.01 4.13 2.44h.74C13.09 5.01 14.76 4 16.5 4 19 4 21 6 21 8.5c0 3.78-3.4 6.86-8.65 11.54l-1.45 1.31z" />
                </svg>
            </button>
        </form>
        
        <!-- Cart Button -->
        <form action="{{ $addToCart }}" method="POST">
            @csrf
            <button class="{{ $inCart ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }} transition-colors" 
                    aria-label="{{ $inCart ? 'Remove from cart' : 'Add to cart' }}"
                    {{ $product->stock <= 0 ? 'disabled' : '' }}>
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5 lg:h-6 lg:w-6" 
                     fill="{{ $inCart ? 'currentColor' : 'none' }}" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor"
                     stroke-width="{{ $inCart ? '0' : '2' }}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13L17 13M9 21h6" />
                </svg>
            </button>
        </form>
    </div>
</div>