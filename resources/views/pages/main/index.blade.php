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

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
@endsection

@section('page_content')

    {{-- BANNER --}}
    <div class="relative w-full h-[400px] font-[Poppins] banner-container">
        {{-- Background image with brightness overlay --}}
        <div class="absolute w-full h-full brightness-50 z-[1] banner-background">
            <img class="w-full h-full object-fit" src="img/patterns/banner-warmad.png">
        </div>

        
        {{-- Banner content --}}
        <div class="relative z-10 flex flex-col justify-center h-full px-6 mx-auto max-w-7xl">


            {{-- Content grid --}}
            <div class="grid items-center grid-cols-1 gap-6 lg:grid-cols-2">

                {{-- HOOK --}}
                <div class="text-white banner-content">
                    <h2 class="mb-2 text-2xl font-semibold sm:text-3xl lg:text-6xl">
                        Warung Ahmad
                    </h2>
                    <p class="text-base sm:text-base opacity-90">
                        Langsung aja, cari Kebutuhan Sembako-mu di Warung Ahmad!
                    </p>
                </div>

            {{-- Hero Image --}}
            <div class="w-full h-[250px] md:h-[360px] flex items-center justify-center banner-image">
                <img
                    src="{{ asset('img/products/chocolatos_darkchocolate.JPG') }}"
                    alt="Produk Unggulan"
                    class="h-[150px] md:h-[260px] object-contain drop-shadow-xl opacity-90"
                >
            </div>


            </div>
            {{-- Button --}}
            <div class="absolute transform -translate-x-1/2 bottom-8 left-1/2 banner-content">
                <a href="#product-categories"
                    class="inline-block px-6 py-2 text-white bg-red-700 rounded-full hover:bg-red-800">
                    Belanja Sekarang
                </a>
            </div>

        </div>
    </div>

    {{-- BEST ITEM --}}
    <section class="mt-5 px-4 font-[Poppins] best-item-section">
        <div class="mx-auto max-w-7xl">
            <h2 class="mb-4 text-xl font-semibold sm:text-2xl best-item-title">
                Best Item Products
            </h2>

            <div class="flex gap-4 pb-4 overflow-x-auto scrollbar-hide">
                @foreach ($products->take(8) as $product)
                    <div class="min-w-[160px] sm:min-w-[200px] bg-white rounded-xl shadow hover:shadow-lg transition best-item-card">
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            class="w-full h-[140px] object-contain p-3"
                            alt="{{ $product->name }}"
                        >
                        <div class="px-3 pb-3">
                            <p class="text-sm font-semibold truncate">
                                {{ $product->name }}
                            </p>
                            <p class="text-xs text-gray-500">
                                Rp {{ number_format($product->price) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- OUR CATEGORY --}}
    <section class="mt-5 px-2 font-[Poppins] category-section">
        <div class="mx-auto max-w-7xl">
            <div class="category-header">
                <h2 class="mb-2 text-2xl font-semibold">
                    Our Category
                </h2>

                <p class="mb-8 text-sm text-gray-500 max-w-auto">
                    Kami menyediakan produk-produk terbaik di Prumpung, membantu Anda memenuhi kebutuhan sehari-hari dengan mudah.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                {{-- CARD SEMBAKO --}}
                <a href="#category-Sembako" class="flex items-center gap-4 p-4 transition bg-white cursor-pointer rounded-xl hover:bg-gray-100 hover:shadow-md category-card">
                    
                    {{-- IMAGE --}}
                    <img src="{{ asset('img/categories/iconsembako.png') }}" class="object-contain w-12 h-12">

                    {{-- TEXT --}}
                    <div>
                        <h3 class="text-base font-semibold">
                            Sembako
                        </h3>
                        <p class="text-sm leading-snug text-gray-500">
                            Beras, minyak, gula, dan kebutuhan pokok harian
                        </p>
                    </div>

                </a>

                {{-- CARD MAKANAN & MINUMAN --}}
                <a href="#category-Makanan" class="flex items-center gap-4 p-4 transition bg-white cursor-pointer rounded-xl hover:bg-gray-100 hover:shadow-md category-card">
                    <img src="{{ asset('img/categories/makanan&minuman.png') }}" class="object-contain w-12 h-12">
                    <div>
                        <h3 class="text-base font-semibold">Makanan & Minuman</h3>
                        <p class="text-sm text-gray-500">
                            Makanan ringan dan minuman dingin hangat favorit
                        </p>
                    </div>
                </a>

                {{-- CARD ELEKTRONIK --}}
                <a href="#category-Elektronik" class="flex items-center gap-4 p-4 transition bg-white cursor-pointer rounded-xl hover:bg-gray-100 hover:shadow-md category-card">
                    <img src="{{ asset('img/categories/elektronik.png') }}" class="object-contain w-12 h-12">
                    <div>
                        <h3 class="text-base font-semibold">Elektronik</h3>
                        <p class="text-sm text-gray-500">
                            Berbagai kebutuhan elektronik harian
                        </p>
                    </div>
                </a>

                {{-- CARD ROKOK --}}
                <a href="#category-Rokok" class="flex items-center gap-4 p-4 transition bg-white cursor-pointer rounded-xl hover:bg-gray-100 hover:shadow-md category-card">
                    <img src="{{ asset('img/categories/rokok.png') }}" class="object-contain w-12 h-12">
                    <div>
                        <h3 class="text-base font-semibold">Rokok</h3>
                        <p class="text-sm text-gray-500">
                            Berbagai pilihan rokok
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- PRODUCT CATEGORIES SECTION --}}
    <div id="product-categories" class="scroll-mt-20">
        {{-- Group products by category --}}
        @php
            $groupedProducts = $products->groupBy('category');
        @endphp

        @foreach($groupedProducts as $categoryName => $categoryProducts)
            <div id="category-{{ $categoryName }}" class="scroll-mt-20 product-carousel">
                <x-category-carousel 
                    title="{{ $categoryName }}"
                    description="Berikut adalah produk {{ strtolower($categoryName) }} yang kami tawarkan"
                    :products="$categoryProducts"
                    :categoryName="$categoryName"
                />
            </div>
        @endforeach
    </div>

    <script src="scripts/homepage.js"></script>

@endsection

@section('page_scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Check if GSAP is loaded
    if (typeof gsap === 'undefined') {
        console.warn('GSAP not loaded, animations disabled');
        return;
    }
    
    // ========================================
    // BANNER ANIMATION (Fade in dari bawah)
    // ========================================
    gsap.from('.banner-content', {
        opacity: 0,
        y: 50,
        duration: 1.5,
        ease: 'power3.out',
        clearProps: 'all'
    });

    gsap.from('.banner-image', {
        opacity: 0,
        scale: 0.8,
        duration: 1.8,
        delay: 0.4,
        ease: 'back.out(1.4)',
        clearProps: 'all'
    });

    // ========================================
    // BEST ITEM SECTION (Slide in dari kiri)
    // ========================================
    const bestItemSection = document.querySelector('.best-item-section');
    if (bestItemSection) {
        gsap.from('.best-item-title', {
            scrollTrigger: {
                trigger: '.best-item-section',
                start: 'top 80%',
                toggleActions: 'play none none reverse'
            },
            opacity: 0,
            x: -50,
            duration: 1.2,
            ease: 'power2.out',
            clearProps: 'all'
        });

        gsap.from('.best-item-card', {
            scrollTrigger: {
                trigger: '.best-item-section',
                start: 'top 80%',
                toggleActions: 'play none none reverse'
            },
            opacity: 0,
            y: 40,
            stagger: 0.15,
            duration: 1,
            ease: 'power3.out',
            clearProps: 'all'
        });
    }

    // ========================================
    // OUR CATEGORY SECTION (Fade + Scale)
    // ========================================
    const categorySection = document.querySelector('.category-section');
    if (categorySection) {
        gsap.from('.category-header', {
            scrollTrigger: {
                trigger: '.category-section',
                start: 'top 80%',
                toggleActions: 'play none none reverse'
            },
            opacity: 0,
            y: 40,
            duration: 1.2,
            ease: 'power3.out',
            clearProps: 'all'
        });

        gsap.from('.category-card', {
            scrollTrigger: {
                trigger: '.category-section',
                start: 'top 70%',
                toggleActions: 'play none none reverse'
            },
            opacity: 0,
            scale: 0.85,
            y: 30,
            stagger: 0.2,
            duration: 1,
            ease: 'back.out(1.4)',
            clearProps: 'all'
        });
    }

    // ========================================
    // PRODUCT CAROUSEL (Slide in with smoother fade)
    // ========================================
    const carousels = document.querySelectorAll('.product-carousel');
    
    carousels.forEach((carousel) => {
        // Animate carousel header
        const header = carousel.querySelector('.carousel-header');
        if (header) {
            gsap.from(header, {
                scrollTrigger: {
                    trigger: carousel,
                    start: 'top 80%',
                    end: 'top 50%',
                    toggleActions: 'play none none reverse'
                },
                opacity: 0,
                x: -40,
                duration: 1.5,
                ease: 'power4.out',
                clearProps: 'all'
            });
        }

        // Animate product cards with smoother fade
        const cards = carousel.querySelectorAll('.product-card');
        if (cards.length > 0) {
            gsap.from(cards, {
                scrollTrigger: {
                    trigger: carousel,
                    start: 'top 75%',
                    end: 'top 40%',
                    toggleActions: 'play none none reverse'
                },
                opacity: 0,
                y: 60,
                scale: 0.95,
                stagger: {
                    each: 0.2,
                    ease: 'power2.out'
                },
                duration: 1.5,
                ease: 'power4.out',
                clearProps: 'all'
            });
        }
    });

});
</script>
@endsection