<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryProductController;
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
    Route::get('/users/{username}', [UserController::class, 'detailView']);

    Route::get('/products', [ProductController::class, 'view'])->name('dashboard.products');
    Route::get('/products/add', [ProductController::class, 'addView'])->name('dashboard.products.add');
    Route::post('/products/add', [ProductController::class, 'add']);
    Route::get('/products/detail/{code}', [ProductController::class, 'detailView'])->name('dashboard.products.detail');
    Route::put('/products/update/{code}', [ProductController::class, 'update'])->name('dashboard.products.update');
    Route::patch('/products/update/status/{code}', [ProductController::class, 'updateStatus'])->name('dashboard.products.update.status');
    Route::delete('/products/delete/{code}', [ProductController::class, 'delete'])->name('dashboard.products.delete');

    Route::get('/categories', [CategoryProductController::class, 'view'])->name('dashboard.categories');
    Route::get('/categories/add', [CategoryProductController::class, 'addView'])->name('dashboard.categories.add');
    Route::post('/categories/add', [CategoryProductController::class, 'add']);
    Route::delete('/categories/delete/{id}', [CategoryProductController::class, 'delete'])->name('dashboard.categories.delete');

    Route::post('/logout', [AuthController::class, 'logout'])->name('dashboard.logout');
});
