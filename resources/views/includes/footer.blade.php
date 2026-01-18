<footer id="footer-section" class="w-full bg-gradient-to-b from-white to-[#F4F4F4] py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-4 sm:grid-cols-2 mb-16">
            
            <!-- Kolom 1: Logo dan Deskripsi -->
            <div class="flex flex-col gap-8">
                <div class="flex items-center">
                    <img src="{{ asset('img/logo/logowarmad.png') }}" class="h-14 object-contain" alt="Logo Warmad">
                    <span class="ml-4 text-3xl font-bold font-[Poppins] text-[#B90B0B]">Warmad</span>
                </div>

                <p class="text-gray-600 text-base leading-7">
                    Solusi belanja praktis di Prumpung. Terpercaya untuk seluruh warga Cipinang.
                </p>

                <!-- Sosial Media dengan gambar -->
                <div class="flex items-center gap-4">
                    <a href="https://instagram.com/username" target="_blank" class="text-gray-400 hover:text-[#B90B0B] transition-all transform hover:scale-110">
                        <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" class="w-6 h-6">
                    </a>

                    <a href="https://linkedin.com/in/username" target="_blank" class="text-gray-400 hover:text-[#B90B0B] transition-all transform hover:scale-110">
                        <img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="LinkedIn" class="w-6 h-6">
                    </a>

                    <a href="https://github.com/username" target="_blank" class="text-gray-400 hover:text-[#B90B0B] transition-all transform hover:scale-110">
                        <img src="https://cdn-icons-png.flaticon.com/512/25/25231.png" alt="GitHub" class="w-6 h-6">
                    </a>

                    <a href="https://facebook.com/username" target="_blank" class="text-gray-400 hover:text-[#B90B0B] transition-all transform hover:scale-110">
                        <img src="https://cdn-icons-png.flaticon.com/512/174/174848.png" alt="Facebook" class="w-6 h-6">
                    </a>
                </div>
            </div>
            <!-- Kolom 2: Menu Navigasi -->
            <div>
                <h4 class="text-xl font-bold text-[#8C0909] mb-8 font-[Poppins] border-b-2 border-[#FB9935] pb-2 inline-block">Menu</h4>
                <ul class="space-y-5">
                    <li>
                        <a href="#beranda" class="text-gray-700 hover:text-[#B90B0B] hover:font-medium transition-all duration-300 flex items-center gap-2 group">
                            <span class="w-2 h-2 bg-[#FB9935] rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="#tentang" class="text-gray-700 hover:text-[#B90B0B] hover:font-medium transition-all duration-300 flex items-center gap-2 group">
                            <span class="w-2 h-2 bg-[#FB9935] rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="#menu" class="text-gray-700 hover:text-[#B90B0B] hover:font-medium transition-all duration-300 flex items-center gap-2 group">
                            <span class="w-2 h-2 bg-[#FB9935] rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                            Menu Kantin
                        </a>
                    </li>
                    <li>
                        <a href="#fitur" class="text-gray-700 hover:text-[#B90B0B] hover:font-medium transition-all duration-300 flex items-center gap-2 group">
                            <span class="w-2 h-2 bg-[#FB9935] rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                            Fitur Unggulan
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kolom 3: Kontak -->
            <div>
                <h4 class="text-xl font-bold text-[#8C0909] mb-8 font-[Poppins] border-b-2 border-[#FB9935] pb-2 inline-block">Kontak Kami</h4>
                <ul class="space-y-5">
                    <li class="flex items-start gap-3 text-gray-700 group">
                        <div class="p-2 bg-[#FB9935]/10 rounded-lg group-hover:bg-[#FB9935]/20 transition-all duration-300">
                            <svg class="w-5 h-5 text-[#FB9935]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-medium text-[#8C0909]">Lokasi</span>
                            <p class="text-sm mt-1">Prumpung</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3 text-gray-700 group">
                        <div class="p-2 bg-[#B90B0B]/10 rounded-lg group-hover:bg-[#B90B0B]/20 transition-all duration-300">
                            <svg class="w-5 h-5 text-[#B90B0B]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-medium text-[#8C0909]">Email</span>
                            <a href="mailto:info@warmad.com" class="text-sm mt-1 hover:text-[#B90B0B] transition-colors duration-300 block">hengker@gmail.com</a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3 text-gray-700 group">
                        <div class="p-2 bg-[#8C0909]/10 rounded-lg group-hover:bg-[#8C0909]/20 transition-all duration-300">
                            <svg class="w-5 h-5 text-[#8C0909]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-medium text-[#8C0909]">Telepon</span>
                            <a href="tel:+622112345678" class="text-sm mt-1 hover:text-[#B90B0B] transition-colors duration-300 block"> (021)-21017367</a>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Kolom 4: Tim -->
            <div class="flex flex-col items-center lg:items-start">
                <div class="w-full text-center lg:text-left mb-6">
                    <h4 class="text-xl font-bold text-[#8C0909] font-[Poppins] inline-block border-b-2 border-[#FB9935] pb-2">Team Kami</h4>
                </div>
                
                <div class="relative w-full max-w-xs overflow-hidden rounded-2xl shadow-xl mx-auto lg:mx-0">
                    <div class="aspect-video overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Tim Warmad" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-[#8C0909]/90 via-transparent to-transparent opacity-0 hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                        <div class="text-white">
                            <p class="text-lg font-semibold">Tim Warmad</p>
                            <p class="text-sm mt-1 opacity-90">SMK 65 Jakarta</p>
                        </div>
                    </div>
                </div>
                
                <p class="text-center lg:text-left text-[#8C0909] font-medium mt-4 text-sm">
                    Inovasi Digital untuk Kantin Sekolah
                </p>
            </div>
        </div>
        
        <!-- Garis pemisah dan copyright -->
        <div class="border-t border-[#FB9935]/30 pt-8 mt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="text-center md:text-left">
                    <p class="text-gray-600 text-sm">
                        &copy; 2026 <span class="text-[#B90B0B] font-bold">WARMAD</span>
                        <span class="mx-2">•</span>
                        SMK 65 Jakarta
                    </p>
                    <p class="text-gray-500 text-xs mt-1">
                        Solusi digital untuk kantin sekolah yang lebih baik
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Smooth scroll ke seluruh halaman */
    html {
        scroll-behavior: smooth;
    }
    
    /* Animasi untuk footer */
    #footer-section {
        animation: fadeInUp 0.8s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Hover efek untuk gambar tim */
    .relative:hover .absolute {
        opacity: 1;
    }
    
    /* Efek hover untuk link */
    a {
        transition: all 0.3s ease;
    }
    
    /* Custom scrollbar untuk browser modern */
    ::-webkit-scrollbar {
        width: 10px;
    }
    
    ::-webkit-scrollbar-track {
        background: #F4F4F4;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #FB9935;
        border-radius: 5px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #B90B0B;
    }
</style>