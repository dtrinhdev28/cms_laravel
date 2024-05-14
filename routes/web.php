<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\UserController;
use App\Http\Controllers\client\PageController;
use App\Http\Controllers\client\ProductController;

// admin controller
use App\Http\Controllers\admin\UserController as AdminUserController;



// pagehome
Route::get('/', [PageController::class, 'index'])->name('pagehome');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/blog/{id}', [PageController::class, 'blogDetail'])->name('blog');

// Auth
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'store'])->name('loginAuth');
Route::get('/forgot-password', [UserController::class, 'forgotpassword'])->name('forgot-pasword')->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
// logout
Route::get('/logout', function(Request $request) {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/register', [UserController::class, 'register'])->name('register');
// product
Route::get('/detail/{slug}', [ProductController::class, 'detail'])->name('detail');


// page admin
Route::prefix('admin')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('getAllUsers')->middleware('auth');
    Route::get('/user/create', [AdminUserController::class, 'create'])->name('createUser')->middleware('auth');
    Route::post('/user/create', [AdminUserController::class, 'store'])->name('userStore')->middleware('auth');
    // Route::post('/delete', [AdminUserController::class, 'index'])->name('get_all_users');
    // Route::delete('/destroy', [AdminUserController::class, 'index'])->name('get_all_users');
});