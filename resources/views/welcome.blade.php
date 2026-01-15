@extends('layouts.default')

@section('page_title', 'Welcome')

@section('body_style', 'bg-orange-700')

@section('page_content')

    <div class="h-screen flex flex-col justify-center">
        <div class="font-[Poppins] mx-8">
            <h1 class="text-center font-semibold text-white text-2xl"><span class="text-orange-200">Jajan di Kantin?</span> Tak perlu susah lagi</h1>
            <p class="text-center text-white text-sm mt-3">Kantin Online SMK 65 akan memudahkan kamu untuk beli jajanan favoritmu di kantin!</p>
        </div>
        <img src="img/logo/logo_transparent.png" class="mx-auto w-[400px] h-[400px] brightness-0 invert-[1]">
        <a href="{{ route('show.login') }}" class="block bg-orange-100 text-orange-800 font-semibold rounded-2xl text-center mx-8 py-2 font-[Poppins] lg:w-[50%] lg:mx-auto">Masuk Sekarang!</a>
    </div>

@endsection