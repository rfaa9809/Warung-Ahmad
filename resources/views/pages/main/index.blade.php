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
    <div class="relative w-full h-[300px] sm:h-[350px] lg:h-[400px] xl:h-[450px] 2xl:h-[500px] font-[Poppins] banner-container">
        {{-- Background image with brightness overlay --}}
        <div class="absolute w-full h-full z-[1] banner-background">
            <img class="w-full h-full object-fit" src="img/patterns/banner-warmad.png" alt="Banner Background">
        </div>

        {{-- Banner content --}}
        <div class="relative z-10 flex flex-col justify-center h-full px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl">

            {{-- Content grid - Responsive columns --}}
            <div class="grid items-center grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">

                {{-- HOOK - Text content --}}
                {{-- <div class="text-white text-left lg:text-left banner-content">
                    <h2 class="mb-2 text-xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl font-semibold leading-tight">
                        Warung Ahmad
                    </h2>
                    <p class="text-sm sm:text-base lg:text-lg xl:text-xl opacity-90">
                        Langsung aja, cari Kebutuhan Sembako-mu di Warung Ahmad!
                    </p>
                </div> --}}

        </div>
    </div>

                {{-- Button - Responsive positioning --}}
    <div class="w-full flex justify-center -mt-6 sm:-mt-8 lg:-mt-10 relative z-20 banner-content">
        <a href="#product-categories"
            class="inline-flex flex-col items-center px-8 py-2.5 text-sm sm:text-base text-white bg-red-700 rounded-full hover:bg-red-800 transition shadow-lg">
            Belanja Sekarang
            <svg class="w-5 h-5 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 1v12m0 0 4-4m-4 4L1 9"/>
            </svg>
        </a>
    </div>

    {{-- BEST ITEM --}}
    <section class="mt-5 sm:mt-6 lg:mt-8 xl:mt-10 px-4 sm:px-6 lg:px-8 font-[Poppins] best-item-section">
        <div class="mx-auto max-w-7xl">
            <h2 class="mb-3 sm:mb-4 text-lg sm:text-xl lg:text-2xl xl:text-3xl font-semibold best-item-title">
                Best Item Products
            </h2>

            <div class="flex gap-3 sm:gap-4 lg:gap-5 xl:gap-6 pb-4 overflow-x-auto scrollbar-hide">
                @foreach ($products->take(8) as $product)
                    <div class="min-w-[140px] sm:min-w-[160px] md:min-w-[180px] lg:min-w-[200px] xl:min-w-[220px] 2xl:min-w-[240px] bg-white rounded-xl shadow hover:shadow-lg transition best-item-card flex-shrink-0">
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            class="w-full h-[120px] sm:h-[140px] lg:h-[160px] xl:h-[180px] object-contain p-2 sm:p-3"
                            alt="{{ $product->name }}"
                        >
                        <div class="px-2 sm:px-3 pb-2 sm:pb-3">
                            <p class="text-xs sm:text-sm font-semibold truncate">
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
    <section class="mt-6 sm:mt-8 lg:mt-10 xl:mt-12 px-4 sm:px-6 lg:px-8 font-[Poppins] category-section">
        <div class="mx-auto max-w-7xl">
            <div class="category-header">
                <h2 class="mb-2 text-lg sm:text-xl lg:text-2xl xl:text-3xl font-semibold">
                    Our Category
                </h2>

                <p class="mb-6 sm:mb-8 text-xs sm:text-sm lg:text-base text-gray-500">
                    Kami menyediakan produk-produk terbaik di Prumpung, membantu Anda memenuhi kebutuhan sehari-hari dengan mudah.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 lg:gap-6 xl:gap-8">
                {{-- CARD SEMBAKO --}}
                <a href="#category-Sembako" class="flex items-center gap-3 sm:gap-4 p-3 sm:p-4 lg:p-5 xl:p-6 transition bg-white rounded-xl hover:bg-gray-100 hover:shadow-md cursor-pointer category-card">
                    <img src="{{ asset('img/categories/iconsembako.png') }}" class="object-contain w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 xl:w-16 xl:h-16 flex-shrink-0">
                    <div class="flex-1 min-w-0">
                        <h3 class="text-sm sm:text-base lg:text-lg xl:text-xl font-semibold">
                            Sembako
                        </h3>
                        <p class="text-xs sm:text-sm lg:text-base leading-snug text-gray-500">
                            Beras, minyak, gula, dan kebutuhan pokok harian
                        </p>
                    </div>
                </a>

                {{-- CARD MAKANAN & MINUMAN --}}
                <a href="#category-Makanan" class="flex items-center gap-3 sm:gap-4 p-3 sm:p-4 lg:p-5 xl:p-6 transition bg-white rounded-xl hover:bg-gray-100 hover:shadow-md cursor-pointer category-card">
                    <img src="{{ asset('img/categories/makanan&minuman.png') }}" class="object-contain w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 xl:w-16 xl:h-16 flex-shrink-0">
                    <div class="flex-1 min-w-0">
                        <h3 class="text-sm sm:text-base lg:text-lg xl:text-xl font-semibold">Makanan & Minuman</h3>
                        <p class="text-xs sm:text-sm lg:text-base text-gray-500">
                            Makanan ringan dan minuman dingin hangat favorit
                        </p>
                    </div>
                </a>

                {{-- CARD ELEKTRONIK --}}
                <a href="#category-Elektronik" class="flex items-center gap-3 sm:gap-4 p-3 sm:p-4 lg:p-5 xl:p-6 transition bg-white rounded-xl hover:bg-gray-100 hover:shadow-md cursor-pointer category-card">
                    <img src="{{ asset('img/categories/elektronik.png') }}" class="object-contain w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 xl:w-16 xl:h-16 flex-shrink-0">
                    <div class="flex-1 min-w-0">
                        <h3 class="text-sm sm:text-base lg:text-lg xl:text-xl font-semibold">Elektronik</h3>
                        <p class="text-xs sm:text-sm lg:text-base text-gray-500">
                            Berbagai kebutuhan elektronik harian
                        </p>
                    </div>
                </a>

                {{-- CARD ROKOK --}}
                <a href="#category-Rokok" class="flex items-center gap-3 sm:gap-4 p-3 sm:p-4 lg:p-5 xl:p-6 transition bg-white rounded-xl hover:bg-gray-100 hover:shadow-md cursor-pointer category-card">
                    <img src="{{ asset('img/categories/rokok.png') }}" class="object-contain w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 xl:w-16 xl:h-16 flex-shrink-0">
                    <div class="flex-1 min-w-0">
                        <h3 class="text-sm sm:text-base lg:text-lg xl:text-xl font-semibold">Rokok</h3>
                        <p class="text-xs sm:text-sm lg:text-base text-gray-500">
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
    // RESPONSIVE CONFIGURATION
    // ========================================
    const isMobile = window.innerWidth < 768;
    const isTablet = window.innerWidth >= 768 && window.innerWidth < 1024;
    const isDesktop = window.innerWidth >= 1024 && window.innerWidth < 1920;
    const is4K = window.innerWidth >= 1920;

    // Animation config based on screen size
    const animConfig = {
        mobile: {
            duration: 0.4,
            stagger: 0.05,
            distance: 25,
            scale: 0.93
        },
        tablet: {
            duration: 0.5,
            stagger: 0.06,
            distance: 30,
            scale: 0.94
        },
        desktop: {
            duration: 0.6,
            stagger: 0.08,
            distance: 35,
            scale: 0.95
        },
        fourK: {
            duration: 0.7,
            stagger: 0.1,
            distance: 40,
            scale: 0.95
        }
    };

    // Get current config
    let config = animConfig.desktop;
    if (isMobile) config = animConfig.mobile;
    else if (isTablet) config = animConfig.tablet;
    else if (is4K) config = animConfig.fourK;

    // ========================================
    // BANNER ANIMATION
    // ========================================
    gsap.from('.banner-content', {
        opacity: 0,
        y: isMobile ? 20 : 30,
        duration: 0.5,
        ease: 'power2.out',
        clearProps: 'all'
    });

    if (!isMobile) {
        gsap.from('.banner-image', {
            opacity: 0,
            scale: 0.92,
            duration: 0.6,
            delay: 0.15,
            ease: 'back.out(1.1)',
            clearProps: 'all'
        });
    }

    // ========================================
    // BEST ITEM SECTION
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
            x: isMobile ? -20 : -30,
            duration: 0.5,
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
            y: 25,
            stagger: 0.06,
            duration: 0.5,
            ease: 'power2.out',
            clearProps: 'all'
        });
    }

    // ========================================
    // OUR CATEGORY SECTION
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
            y: 25,
            duration: 0.5,
            ease: 'power2.out',
            clearProps: 'all'
        });

        gsap.from('.category-card', {
            scrollTrigger: {
                trigger: '.category-section',
                start: 'top 70%',
                toggleActions: 'play none none reverse'
            },
            opacity: 0,
            scale: 0.94,
            y: 20,
            stagger: 0.08,
            duration: 0.5,
            ease: 'back.out(1.2)',
            clearProps: 'all'
        });
    }

    // ========================================
    // PRODUCT CAROUSEL
    // ========================================
    const carousels = document.querySelectorAll('.product-carousel');
    
    carousels.forEach((carousel) => {
        const header = carousel.querySelector('.carousel-header');
        if (header) {
            gsap.from(header, {
                scrollTrigger: {
                    trigger: carousel,
                    start: 'top 80%',
                    toggleActions: 'play none none reverse'
                },
                opacity: 0,
                x: isMobile ? -15 : -25,
                duration: 0.5,
                ease: 'power2.out',
                clearProps: 'all'
            });
        }

        const cards = carousel.querySelectorAll('.product-card');
        if (cards.length > 0) {
            gsap.from(cards, {
                scrollTrigger: {
                    trigger: carousel,
                    start: 'top 75%',
                    toggleActions: 'play none none reverse'
                },
                opacity: 0,
                y: 30,
                scale: 0.95,
                stagger: 0.07,
                duration: 0.5,
                ease: 'power2.out',
                clearProps: 'all'
            });
        }
    });


});
</script>
@endsection