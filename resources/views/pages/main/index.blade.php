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

    <div class="relative w-full h-[400px] font-[Poppins]">
        {{-- Background image with brightness overlay --}}
        <div class="absolute w-full h-full brightness-50 z-[1]">
            <img class="w-full h-full object-fit" src="img/patterns/banner-warmad.png">
        </div>
        {{-- Search bar (overlap navbar) --}}
        <div class="absolute top-[-24px] left-1/2 -translate-x-1/2 z-20 w-11/12 max-w-xl">
            {{-- <form action="#" method="GET" class="w-11/12 max-w-xl bg-white rounded-full shadow-lg flex items-center px-4 py-2">
                 <!-- Search Icon (decorative) --> 
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"> 
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7 7 0 1010 17a7 7 0 006.65-6.65z" /> 
                </svg> 
                <!-- Input --> 
                <input type="text" name="search" placeholder="Cari jajanan favorit kamu..." class="ml-3 w-full focus:outline-none bg-transparent text-zinc-800 placeholder-zinc-400 font-[Poppins]" /> 
                <!-- Submit Button --> 
                <button type="submit" class="ml-2 p-2 rounded-full bg-indigo-600 hover:bg-indigo-700 transition"> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"> 
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7 7 0 1010 17a7 7 0 006.65-6.65z" /> 
                    </svg> 
                </button>
            </form> --}}
        </div>
        
        {{-- Banner content --}}
        <div class="relative z-10 h-full max-w-7xl mx-auto px-6 flex flex-col justify-center">


            {{-- Content grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">

                {{-- HOOK --}}
                <div class="text-white">
                    <h2 class="text-xl font-semibold mb-2">
                        Warung Ahmad
                    </h2>
                    <p class="text-sm opacity-90">
                        Langsung aja, cari Kebutuhan Sembako-mu di Warung Ahmad!
                    </p>
                </div>

            {{-- Hero Image --}}
            <div class="w-full h-[250px] md:h-[360px] flex items-center justify-center">
                <img
                    src="{{ asset('img/products/chocolatos_darkchocolate.JPG') }}"
                    alt="Produk Unggulan"
                    class="h-[150px] md:h-[260px] object-contain drop-shadow-xl"
                >
            </div>


            </div>
            {{-- Button --}}
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
                <a href="#"
                    class="inline-block bg-red-700 hover:bg-red-800 text-white px-6 py-2 rounded-full">
                    Belanja Sekarang
                </a>
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
