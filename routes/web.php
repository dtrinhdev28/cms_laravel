<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\UserController;
use App\Http\Controllers\client\PageController;
use App\Http\Controllers\client\ProductController;



// pagehome
Route::get('/', [PageController::class, 'index'])->name('pagehome');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');


// Auth
Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'store'])->name('loginAuth');

Route::get('/register', [UserController::class, 'register'])->name('register');

// product
Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
