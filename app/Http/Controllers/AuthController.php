<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function registerStore(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'password' => $validated['password'],
        ]);

        session()->flash('success', 'User berhasil dibuat.');

        return redirect()->route('login');
    }

    public function loginView()
    {
        return view('auth.login');
    }
}
