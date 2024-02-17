<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return Redirect::to('/produk');
});

// Routing Master Kategori Product
Route::get('/master/kategoriproduk', [KategoriProdukController::class, 'index'])->name('masterkategoriproduk.index');
Route::post('/master/kategoriproduk', [KategoriProdukController::class, 'store'])->name('masterkategori.store');
Route::patch('/master/kategoriproduk/{id}', [KategoriProdukController::class, 'update'])->name('masterkategori.update');
Route::delete('/master/kategoriproduk/{id}', [KategoriProdukController::class, 'delete'])->name('masterkategori.delete');

// Routing Master Meja
Route::get('/master/meja', [MejaController::class, 'index'])->name('mastermeja.index');
Route::post('/master/meja', [MejaController::class, 'store'])->name('mastermeja.store');
Route::delete('/master/meja/{id}', [MejaController::class, 'delete'])->name('mastermeja.delete');

// Routing Product
Route::get('/produk', [ProductController::class, 'index'])->name('product.index');
Route::post('/produk', [ProductController::class, 'store'])->name('product.store');
Route::patch('/produk/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/produk/{id}', [ProductController::class, 'delete'])->name('product.delete');

// Routing Product
Route::get('/order', [OrderController::class, 'index'])->name('order.index');




