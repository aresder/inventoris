<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view()
    {
        $users = User::orderBy('full_name')->paginate(15);
        return view('dashboard.users', ['users' => $users]);
    }

    public function getUser($username)
    {
        $user = User::where('username', '=', $username)->first();

        if (is_null($user)) {
            return redirect()->route('dashboard.users')->with('error', 'Data tidak ditemukan');
        }

        return view('dashboard.user', ['user' => $user]);
    }
}
