<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public static function getUserName()
    {
        if (Auth::check()) {
            return Auth::user()->username;
        }
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'full_name' => $validated['full_name'],
            'username' => $validated['username'],
            'password' => $validated['password'],
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat.');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // if (!User::where('username', $request->username)->exists()) {
        //     return back()->with('warning', 'Akun belum terdaftar.');
        // }

        $validated = $request->validated();

        $credentials = [
            'username' => $validated['username'],
            'password' => $validated['password']
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', "Hai, " . self::getUserName());
        }

        return back()->with('error', "Username / Password salah.");
    }

    public function logout()
    {
        session()->flash('success', 'Bye 👋 ' . self::getUserName());
        Auth::logout();
        return redirect()->route('login');
    }
}
