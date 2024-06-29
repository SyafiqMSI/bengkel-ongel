<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\SparePartController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','userMiddleware'])->group(function () {
    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('/cart/create/{id}', [UserController::class, 'createCart'])->name('cart.create');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{id_spare_part}', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});

Route::middleware(['auth','adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/spare_parts', [SparePartController::class, 'index'])->name('admin.spare_parts.index');
    Route::get('/admin/spare_parts/create', [SparePartController::class, 'create'])->name('admin.spare_parts.create');
    Route::post('/admin/spare_parts', [SparePartController::class, 'store'])->name('admin.spare_parts.store');
    Route::get('/admin/spare_parts/{sparePart}/edit', [SparePartController::class, 'edit'])->name('admin.spare_parts.edit');
    Route::get('/admin/spare_parts/{id}/view', [SparePartController::class, 'view'])->name('admin.spare_parts.view');
    Route::patch('/admin/spare_parts/{sparePart}', [SparePartController::class, 'update'])->name('admin.spare_parts.update');
    Route::delete('/admin/spare_parts/{sparePart}', [SparePartController::class, 'destroy'])->name('admin.spare_parts.destroy');
});