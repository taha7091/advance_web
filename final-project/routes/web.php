<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController; // Keep this import only once
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\BannerController; 
use App\Models\Banner;




// In routes/web.php
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');



// Shared dashboard redirect (optional)
Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('client.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
     // Categories
     Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
     Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
     Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
     Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
     Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
     Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
 
     // Brands
     Route::get('/brands', [BrandController::class, 'index'])->name('admin.brands.index');
     Route::get('/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');
     Route::post('/brands', [BrandController::class, 'store'])->name('admin.brands.store');
     Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
     Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('admin.brands.update');
     Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');
 
     // Products
     Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
     Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
     Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
     Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
     Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
     Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
     //User 
   // Manually define admin user routes (no conflicts)
Route::get('admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
Route::post('admin/users', [AdminController::class, 'store'])->name('admin.users.store');
Route::get('admin/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit'); // Added "admin/" prefix
Route::put('admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update'); // Added "admin/" prefix
Route::delete('admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy'); // Added "admin/" prefix

    // Banner management routes
    Route::get('admin/banners/index', [BannerController::class, 'index'])->name('admin.banners.index');
    Route::get('admin/banners/create', [BannerController::class, 'create'])->name('admin.banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('admin.banners.store');

});


// Client Routes (Remove the role middleware if it's not defined or manage it inside controller)
Route::middleware('auth')->group(function () {
    Route::get('/home', [ClientController::class, 'index'])->name('welcome');
    Route::get('/client/dashboard', [ClientController::class, 'showDashboard'])->name('client.dashboard');
    // Add more client routes here...
});


require __DIR__.'/auth.php';
