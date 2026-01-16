@extends('layouts.default')

@section('page_title', 'Login')

@section('body_style', 'relative')

@section('page_content')
    <div class="w-full h-[500px] translate-y-[-12rem] bg-[#B90B0B] rounded-full"></div>

    <div class="absolute inset-0 top-28 flex flex-col items-center justify-center">
        <img src="{{ asset('img/logo/logowarmad.png') }}" class="h-30 w-auto">
        <div
            class="h-fit w-[85%] lg:w-[60%] rounded-3xl shadow-[0_15px_30px_rgba(234,88,12,0.4)] bg-white p-7 flex flex-col justify-center gap-4">
            <h1 class="text-center text-[#B90B0B] text-3xl font-[Poppins] font-bold">Register</h1>
            <form method="POST" action="{{ route('auth.register') }}">
                @csrf
                <label class="text-orange-800 font-[Poppins]">Email</label><br>
                <input type="text" name="email" class="border border-[#FB9935] rounded-2xl w-full py-1 px-3"
                    placeholder="Your Email Here"><br>
                <label class="text-orange-800 font-[Poppins]">Username</label><br>
                <input type="text" name="name" class="border border-[#FB9935] rounded-2xl w-full py-1 px-3"
                    placeholder="Your Username Here">
                <label class="text-orange-800 font-[Poppins]">Password</label><br>
                <input type="password" name="password" class="border border-[#FB9935] rounded-2xl w-full py-1 px-3"
                    placeholder="Min. 8 Characters">
                <label class="text-orange-800 font-[Poppins]">Confirm Password</label><br>
                <input type="password" name="password_confirmation"
                    class="border border-[#FB9935] rounded-2xl w-full py-1 px-3" placeholder="Re-type your password">

                <input type="submit"
                    class="bg-[#B90B0B] text-white font-[Poppins] font-semibold text-center w-full mt-5 rounded-full py-2"
                    value="Register">

                @if ($errors->any())
                    <ul class="mt-2 px-3 py-1 bg-red-100">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

            </form>
        </div>
        <p class="text-center mx-5 mt-5 text-sm text-orange-800">Sudah Memiliki Akun Kantin SMK 65? <a
                href="{{ route('show.login') }}" class="font-bold">Masuk</a></p>
    </div>
@endsection
