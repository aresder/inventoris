<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        $json = storage_path('/app/data/home/features.json');
        $data = json_decode(file_get_contents($json), true);

        return view('home', $data);
    })->name('home');

    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('/users', [UserController::class, 'view'])->name('dashboard.users');
    Route::get('/users/{username}', [UserController::class, 'getUser']);

    Route::get('/products', [ProductController::class, 'view'])->name('dashboard.products');

    Route::post('/logout', [AuthController::class, 'logout'])->name('dashboard.logout');
});
