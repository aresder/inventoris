<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        return view('dashboard.profile.index', ['user' => $user]);
    }
}
