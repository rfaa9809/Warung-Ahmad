@extends('layouts.default')

@section('page_title', 'Login')

@section('body_style', 'relative')

@section('page_content')
    <div class="w-full h-[500px] translate-y-[-12rem] bg-orange-600 rounded-full"></div>

    <div class="absolute inset-0 top-5 flex flex-col items-center justify-center">
        <img src="img/logo/logo_transparent.png" class="brightness-0 invert-[1]">
        <div class="h-fit w-[85%] lg:w-[60%] rounded-3xl shadow-[0_15px_30px_rgba(234,88,12,0.4)] bg-white p-7 flex flex-col justify-center gap-4">
            <h1 class="text-center text-orange-700 text-3xl font-[Poppins] font-bold">Login</h1>
            <form method="POST" action="{{ route('auth.login') }}">
                @csrf
                <label class="text-orange-800 font-[Poppins]">Email</label><br>
                <input type="text" name="email" class="border border-orange-600 rounded-2xl w-full py-1 px-3" placeholder="Your Email Here"><br>
                <label class="text-orange-800 font-[Poppins]">Password</label><br>
                <input type="password" name="password" class="border border-orange-600 rounded-2xl w-full py-1 px-3" placeholder="Your Password Here">

                <a href="/" class="block text-xs font-bold font-[Poppins] text-orange-800 mt-3">Forgot Password?</a>

                <input type="submit" class="bg-orange-600 text-white font-semibold text-center w-full mt-3 rounded-full py-2" value="Login">

                @if ($errors->any())
                    <ul class="mt-2 px-3 py-1 bg-red-100">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </div>
        <p class="text-center mx-5 mt-5 text-sm text-orange-800">Belum memiliki akun kantin SMK 65? <a href="{{ route('show.register') }}" class="font-bold">Daftar</a></p>
    </div>
@endsection