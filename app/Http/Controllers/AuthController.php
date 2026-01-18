<?php

namespace App\Http\Controllers;

use App\Models\User;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('pages.auth.login');
    }

    public function showRegister()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|max:255|confirmed',
        ]);

        $user = User::create($validated);

        Auth::login($user);

        ToastMagic::success('Berhasil Membuat akun baru.');

        return to_route('main.index');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            ToastMagic::success('Berhasil login.');

            return to_route('main.index');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Incorrect Username or Password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        ToastMagic::success('Berhasil logout.');

        return to_route('show.login');
    }
}
