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
    'inCart' => false,
    'inWishlist' => false
])

<div class="w-full max-w-sm overflow-hidden transition bg-white shadow-sm rounded-2xl hover:shadow-lg">

    {{-- IMAGE --}}
    <div class="bg-gray-50 flex items-center justify-center h-[220px] p-4">
        <img
            src="{{ $image }}"
            alt="{{ $name }}"
            class="object-contain max-h-full"
        >
    </div>

    <div class="p-5 space-y-3">

        {{-- CATEGORY + STOCK --}}
        <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                {{ $category }}
            </span>

            <span class="px-2 py-0.5 text-xs font-medium rounded-full
                {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $product->stock > 0 ? 'Tersedia' : 'Habis' }} ({{ $stock }})
            </span>
        </div>

        
        <h3 class="text-lg font-semibold leading-tight line-clamp-2">
            {{ $name }}
        </h3>

        <p class="text-sm text-gray-500 line-clamp-2">
            {{ $description }}
        </p>

        {{-- PRICE + ACTION --}}
        <div class="flex items-center justify-between pt-3">
            <span class="text-2xl font-bold">
                Rp {{ number_format($price) }}
            </span>

            <div class="flex items-center gap-4">
                {{-- Wishlist --}}
                <form method="POST" action="{{ $addToWishlist }}">
                    @csrf
                    <button
                        class="{{ $inWishlist ? 'text-red-500' : 'text-gray-400 hover:text-red-500' }} transition"
                        aria-label="Wishlist"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            viewBox="0 0 24 24"
                            fill="{{ $inWishlist ? 'currentColor' : 'none' }}"
                            stroke="currentColor"
                            stroke-width="2">
                            <path d="M12.1 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                            2 6 4 4 6.5 4c1.74 0 3.41 1.01
                            4.13 2.44h.74C13.09 5.01 14.76 4
                            16.5 4 19 4 21 6 21 8.5
                            c0 3.78-3.4 6.86-8.65
                            11.54l-1.45 1.31z"/>
                        </svg>
                    </button>
                </form>

                {{-- Cart --}}
                <form method="POST" action="{{ $addToCart }}">
                    @csrf
                    <button
                        class="{{ $inCart ? 'text-blue-500' : 'text-gray-400 hover:text-blue-500' }} transition"
                        {{ $product->stock <= 0 ? 'disabled' : '' }}
                        aria-label="Cart"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="{{ $inCart ? 'currentColor' : 'none' }}"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4
                                M7 13l-1.5 7h13L17 13
                                M9 21h6"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>