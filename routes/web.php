<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\client\PageController;
use App\Http\Controllers\client\UserController;
use App\Http\Controllers\client\ProductController;
use App\Http\Controllers\client\CategoryControler;
use App\Http\Controllers\client\BlogController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\SendemailController;

use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\AdminProductController as AdminProductController;

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication
require __DIR__.'/auth.php';

// Public Pages
Route::get('/', [PageController::class, 'index'])->name('pagehome');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout')->middleware('auth');

Route::get('/blog/{id}', [PageController::class, 'blogDetail'])->name('blog');
// Blog Routes
Route::prefix('blog')->middleware(['auth', CheckAdminMiddleware::class])->group(function () {
    Route::get('/themtin/tin', [BlogController::class, 'themtin'])->name('themtin');
    Route::post('/taotin', [BlogController::class, 'storeTin'])->name('taotin');
    Route::get('/delete/{id}', [BlogController::class, 'deleteBlog'])->name('deleteBlog');
    Route::get('/deletefroce/{id}', [BlogController::class, 'deleteforce'])->name('deleteBlog.force');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
    Route::post('/edit', [BlogController::class, 'updateBlog'])->name('update.Blog');
    Route::get('/trash/all', [BlogController::class, 'trash'])->name('trash.Blog');
    Route::get('/khoiphuc/{id}', [BlogController::class, 'restoreBlog'])->name('khoiphuc');
});

// Category Routes
Route::get('danhmuc/{id}', [CategoryControler::class, 'index'])->name('danhmuc');

// Authentication Routes
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'store'])->name('loginAuth');
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/updatedPassword', [UserController::class, 'updatePassword'])->name('change.password')->middleware('auth');
Route::get('/logout', function(Request $request) {
    Auth::logout();
    return redirect('/');
})->name('logout');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/signup', [UserController::class, 'signup'])->name('signup');

// Product Routes
Route::get('/detail/{slug}', [ProductController::class, 'detail'])->name('detail');

// Cart Routes
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart', [ProductController::class, 'addToCart'])->name('add.to.cart');
    Route::post('/cart/delete', [CartController::class, 'destroy'])->name('delete.cart');
});

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard.admin');

    // User Routes
    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('getAllUsers');
        Route::get('/create', [AdminUserController::class, 'create'])->name('createUser');
        Route::post('/create', [AdminUserController::class, 'store'])->name('userStore');
        Route::post('/delete', [AdminUserController::class, 'deleteAt'])->name('delete.user');
        Route::get('/trash', [AdminUserController::class, 'trash'])->name('trash.user');
        Route::post('/restore', [AdminUserController::class, 'restoreUser'])->name('restore.user');
        Route::post('/forceDelete', [AdminUserController::class, 'forceDeleteUser'])->name('forceDelete.user');
    });

    // Category Routes
    Route::prefix('categorys')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('getAllcategory');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('create.Category');
        Route::post('/create', [AdminCategoryController::class, 'store'])->name('Store.Category');
        Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])->name('edit.Category');
        Route::post('/delete', [AdminCategoryController::class, 'deleteAt'])->name('delete.Category');
        Route::get('/trash', [AdminCategoryController::class, 'trash'])->name('trash.Category');
        Route::post('/restore', [AdminCategoryController::class, 'restore'])->name('restore.Category');
        Route::post('/forceDelete', [AdminCategoryController::class, 'forceDelete'])->name('forceDelete.Category');
    });

    // Product Routes
    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('getAllProduct');
        Route::get('/create', [AdminProductController::class, 'create'])->name('create.Product');
        Route::post('/create', [AdminProductController::class, 'store'])->name('Store.Product');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('edit.Product');
        Route::post('/delete', [AdminProductController::class, 'deleteAt'])->name('delete.Product');
        Route::get('/trash', [AdminProductController::class, 'trash'])->name('trash.Product');
        // Route::post('/restore', [AdminProductController::class, 'restore'])->name('restore.Product');
        // Route::post('/forceDelete', [AdminProductController::class, 'forceDelete'])->name('forceDelete.Product');
    });
});

// Test Email Route
Route::get('test-email', [SendemailController::class, 'index']);


// test api giao hàng
use App\Http\Controllers\ShippingController;
Route::post('/calculate-shipping-fee', [ShippingController::class, 'calculateShippingFee'])->name('calculateShippingFee');
