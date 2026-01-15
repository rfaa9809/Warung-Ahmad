@extends('layouts.default')

@section('page_title', 'Home')

@section('page_styles')
    <style>
        @keyframes zoom-in-out {
            50% {
                transform: scale(1.5)
            }

            ,
            100% {
                transform: scale(1)
            }

            ,
        }

        .zoom-in-out {
            animation: zoom-in-out 500ms linear;
        }
    </style>
@endsection

@section('page_content')

    <div class="relative w-full h-[300px]">
        <div class="absolute w-full h-full object-cover brightness-50 z-[1]">
            <img class="w-full h-full object-cover" src="img/patterns/patterns1.avif">
        </div>
        <div class="absolute w-full h-full flex flex-col justify-center items-center z-[2] text-center">
            <h1 class="text-2xl lg:text-4xl text-white font-bold font-[Poppins]">Selamat Datang Kembali!,
                {{ auth()->user()->name }}</h1>
            <p class="text-white mt-2 text-xs lg:text-xl font-[Poppins] font-extralight">Langsung aja, cari jajanan favorit
                kamu di kantin SMKN 65!</p>
            <div class="w-full flex mt-5 justify-center">
                <form action="#" method="GET"
                    class="w-11/12 max-w-xl bg-white rounded-full shadow-lg flex items-center px-4 py-2">
                    <!-- Search Icon (decorative) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-zinc-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M16.65 16.65A7 7 0 1010 17a7 7 0 006.65-6.65z" />
                    </svg>

                    <!-- Input -->
                    <input type="text" name="search" placeholder="Cari jajanan favorit kamu..."
                        class="ml-3 w-full focus:outline-none bg-transparent text-zinc-800 placeholder-zinc-400 font-[Poppins]" />

                    <!-- Submit Button -->
                    <button type="submit" class="ml-2 p-2 rounded-full bg-indigo-600 hover:bg-indigo-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M16.65 16.65A7 7 0 1010 17a7 7 0 006.65-6.65z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Default layout for the card1. on the mobile view. it will be a vertical list of cards. but on desktop view, the card list wraps each 2 cards --}}
    <div class="max-w-full mx-auto p-4 font-[Poppins]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <!-- Card 1 -->
            @foreach ($products as $product)
                <x-card1 image="{{ asset('storage/' . $product->image) }}" name="{{ $product->name }}"
                    price="{{ $product->price }}" category="{{ $product->category }}" status="{{ $product->status }}"
                    stock="{{ $product->stock }}" description="{{ $product->description }}" :product="$product"
                    :addToCart="route('cart.add', $product->id)" :addToWishlist="route('wishlist.add', $product->id)" :inCart="auth()->user()
                        ? auth()->user()->cartItems()->where('product_id', $product->id)->exists()
                        : false" :inWishlist="auth()->user()
                        ? auth()->user()->wishlistItems()->where('product_id', $product->id)->exists()
                        : false"></x-card1>
            @endforeach


            <!-- You can copy and modify the block above for each item like Orange Juice, Greek Salad, etc. -->
        </div>



        <script src="scripts/homepage.js"></script>

    @endsection
