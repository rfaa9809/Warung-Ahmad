@extends('layouts.default')

@section('page_title', 'Login')

@section('body_style', 'relative')

@section('page_content')
  

<div class="relative min-h-screen w-full flex items-center justify-center bg-red-100 p-4">
    <div class="h-fit w-full max-w-md rounded-3xl shadow-[0_15px_30px_rgba(234,88,12,0.4)] bg-white p-8 flex flex-col gap-4">
        
        <div class="flex justify-center mb-2">
            <img src="{{ asset('img/logo/logowarmad.png') }}" class="h-28 object-contain" alt="Logo">
        </div>

        <h1 class="text-center text-[#B90B0B] text-2xl font-[Poppins] font-bold">Login</h1>

        <form method="POST" action="{{ route('auth.login') }}" class="flex flex-col gap-3">
            @csrf
            
            <div>
                <label class="text-orange-800 font-[Poppins] text-sm font-semibold">Email</label>
                <input type="email" name="email" class="border border-[#FB9935] rounded-2xl w-full py-2 px-4 mt-1 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Your Email Here">
            </div>

            <div>
                <label class="text-orange-800 font-[Poppins] text-sm font-semibold">Password</label>
                <input type="password" name="password" class="border border-[#FB9935] rounded-2xl w-full py-2 px-4 mt-1 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Your Password Here">
                <div class="flex justify-end mt-1">
                    <a href="#" class="text-xs font-bold text-orange-800 hover:underline">Lupa Password?</a>
                </div>
            </div>

            <button type="submit" class="bg-[#B90B0B] text-white font-[Poppins] font-semibold text-center w-full mt-4 rounded-full py-2 hover:bg-red-700 transition-colors shadow-md active:scale-95 transition-transform">
                Login
            </button>

            @if ($errors->any())
                <div class="mt-4 p-3 bg-red-100 rounded-xl">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

        <p class="text-center mt-5 text-sm text-orange-800">
            Belum Memiliki Akun warung SMK 65? 
            <a href="{{ route('show.register') }}" class="font-bold">Daftar</a>
        </p>
    </div>
</div>
@endsection