@extends('layouts.default')

@section('page_title', 'Your Wishlist')

@section('body_style', 'font-[Poppins]')

@section('page_content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Your Wishlist</h1>

        @if ($wishlistItems->isEmpty())
            <div class="text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                        d="M12.1 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6 4 4 6.5 4c1.74 0 3.41 1.01 4.13 2.44h.74C13.09 5.01 14.76 4 16.5 4 19 4 21 6 21 8.5c0 3.78-3.4 6.86-8.65 11.54l-1.45 1.31z" />
                </svg>
                <p class="mt-4 text-gray-600">Your wishlist is empty</p>
                <a href="{{ route('products.index') }}"
                    class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Browse Products
                </a>
            </div>
        @else
            <div class="grid gap-6">
                @foreach ($wishlistItems as $item)
                    <div
                        class="flex flex-col sm:flex-row gap-4 p-4 border rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <!-- Product Image -->
                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                            class="w-full sm:w-24 h-24 object-cover rounded">

                        <!-- Product Info -->
                        <div class="flex-1">
                            <div class="flex justify-between">
                                <h3 class="font-medium text-gray-900">{{ $item->product->name }}</h3>
                                <p class="font-semibold">Rp. {{ number_format($item->product->price) }}</p>
                            </div>
                            <p class="text-sm text-gray-500">{{ $item->product->category }}</p>
                            <p class="text-sm mt-2 {{ $item->product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $item->product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 self-center">
                            <form action="{{ route('wishlist.move-to-cart', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="flex items-center gap-1 px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
                                    {{ $item->product->stock <= 0 ? 'disabled' : '' }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span>Add to Cart</span>
                                </button>
                            </form>

                            <form action="{{ route('wishlist.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center gap-1 px-3 py-2 text-red-600 border border-red-600 rounded hover:bg-red-50 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Remove</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
