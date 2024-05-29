<?php

use App\Http\Controllers\client\BlogController;
use App\Http\Controllers\client\CategoryControler;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\SendemailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\UserController;
use App\Http\Controllers\client\PageController;
use App\Http\Controllers\client\ProductController;

// admin controller
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;



// pagehome
Route::get('/', [PageController::class, 'index'])->name('pagehome');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');

// blogs start
Route::get('/blog/{id}', [PageController::class, 'blogDetail'])->name('blog');
Route::get('/blog/themtin/tin', [BlogController::class, 'themtin'])->name('themtin');

Route::post('/blogtaotin', [BlogController::class, 'storeTin'])->name('taotin');
Route::get('/blog/delete/{id}', [BlogController::class, 'deleteBlog'])->name('deleteBlog');
Route::get('/blog/deletefroce/{id}', [BlogController::class, 'deleteforce'])->name('deleteBlog');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('edit');
Route::post('/blog/edit', [BlogController::class, 'updateBlog'])->name('update.Blog');
Route::get('/blog/trash/all', [BlogController::class, 'trash'])->name('trash.Blog');

// blogs end

// sản phẩm theo danh mục
Route::get('danhmuc/{id}', [CategoryControler::class, 'index'])->name('danhmuc');

// Auth
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'store'])->name('loginAuth');
Route::get('/forgot-password', [UserController::class, 'forgotpassword'])->name('forgot-pasword')->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/updatedPassword', [UserController::class, 'updatePassword'])->name('change.password')->middleware('auth');

// logout
Route::get('/logout', function(Request $request) {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/signup', [UserController::class, 'signup'])->name('signup');
// product

Route::get('/detail/{slug}', [ProductController::class, 'detail'])->name('detail');



// cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [ProductController::class, 'addToCart'])->name('add.to.cart')->middleware('auth');
Route::post('/cart/delete', [CartController::class, 'destroy'])->name('delete.cart')->middleware('auth');

// ADMIN
Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

    // user
    Route::get('/users', [AdminUserController::class, 'index'])->name('getAllUsers')->middleware('auth');
    Route::get('/user/create', [AdminUserController::class, 'create'])->name('createUser');
    Route::post('/user/create', [AdminUserController::class, 'store'])->name('userStore');
    Route::post('/user/delete', [AdminUserController::class, 'deleteAt'])->name('delete.user');

    Route::get('/user/trash', [AdminUserController::class, 'trash'])->name('trash.user');
    Route::post('/user/restore', [AdminUserController::class, 'restoreUser'])->name('restore.user');
    // delete forceDelete
    Route::post('/user/forceDelete', [AdminUserController::class, 'forceDeleteUser'])->name('forceDelete.user');
    // Route::delete('/destroy', [AdminUserController::class, 'index'])->name('get_all_users');
});

// test email
Route::get('test-email', [SendemailController::class, 'index']);
