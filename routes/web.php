<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $json = storage_path('/app/data/home/features.json');
    $data = json_decode(file_get_contents($json), true);

    return view('home', $data);
})->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthController::class, 'registerStore']);
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
});
