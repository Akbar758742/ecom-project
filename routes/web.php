<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'home'] );
Route::get('/dashboard', [HomeController::class,'login_home'] )->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth','admin']);
Route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth','admin']);
Route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth','admin']);
Route::get('delete_category/{id} ', [AdminController::class, 'delete_category'])->middleware(['auth','admin']);
Route::get('edit_category/{id} ', [AdminController::class, 'edit_category'])->middleware(['auth','admin']);
Route::post('update_category/{id} ', [AdminController::class, 'update_category'])->middleware(['auth','admin']);



Route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth','admin']);
Route::post('insert_product', [AdminController::class, 'insert_product'])->middleware(['auth','admin']);
Route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth','admin']);
Route::get('delete_product/{id} ', [AdminController::class, 'delete_product'])->middleware(['auth','admin']);
Route::get('edit_product/{id} ', [AdminController::class, 'edit_product'])->middleware(['auth','admin']);
Route::post('update_product/{id} ', [AdminController::class, 'update_product'])->middleware(['auth','admin']);
Route::get('search_product', [AdminController::class, 'search_product'])->middleware(['auth','admin']);
Route::get('product_details/{id} ', [HomeController::class, 'product_details']);



Route::get('add_to_cart/{id} ', [HomeController::class, 'add_to_cart'])->middleware(['auth', 'verified']);
Route::get('show_cart', [HomeController::class, 'show_cart']);
Route::get('remove_cart/{id} ', [HomeController::class, 'remove_cart']);
Route::post('place_order', [HomeController::class, 'place_order']);


