@extends('layouts.default')

@section('page_title', 'Your Cart')

@section('body_style', 'font-[Poppins]')

@section('page_content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Your Cart</h1>

        @if ($cartItems->isEmpty())
            <div class="text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <p class="mt-4 text-gray-600">Your cart is empty</p>
                <a href="{{ route('products.index') }}"
                    class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Continue Shopping
                </a>
            </div>
        @else
            <div class="grid gap-6 md:grid-cols-3">
                <!-- Cart Items -->
                <div class="md:col-span-2 space-y-4">
                    @foreach ($cartItems as $item)
                        <div class="flex flex-col sm:flex-row gap-4 p-4 border rounded-lg shadow-sm">
                            <!-- Product Image -->
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                                class="w-full sm:w-24 h-24 object-cover rounded">

                            <!-- Product Info -->
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <h3 class="font-medium text-gray-900">{{ $item->product->name }}</h3>
                                    <p class="font-semibold">Rp.
                                        {{ number_format($item->product->price * $item->quantity) }}</p>
                                </div>
                                <p class="text-sm text-gray-500">{{ $item->product->category }}</p>

                                <!-- Quantity Controls -->
                                <div class="mt-3 flex items-center">
                                    <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="p-1 text-gray-500 hover:text-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>

                                    <span
                                        class="mx-2 px-3 py-1 border rounded text-center w-12">{{ $item->quantity }}</span>

                                    <form action="{{ route('cart.increase', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="p-1 text-gray-500 hover:text-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Remove Button -->
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="self-start sm:self-center p-2 text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="border rounded-lg p-6 h-fit sticky top-4">
                    <h2 class="text-lg font-semibold mb-4">Order Summary</h2>

                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>Rp. {{ number_format($subtotal) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tax</span>
                            <span>Rp. {{ number_format($tax) }}</span>
                        </div>
                        <div class="border-t pt-3 flex justify-between font-semibold text-lg">
                            <span>Total</span>
                            <span>Rp. {{ number_format($total) }}</span>
                        </div>
                    </div>

                    <form action="{{ route('cart.checkout') }}" method="POST" class="mt-6 ">
                        @csrf
                        <button type="submit"
                            class="w-full hover:cursor-pointer block text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                            Checkout
                        </button>
                    </form>

                    <div class="mt-4 text-center">
                        <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">
                            ← Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
