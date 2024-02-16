<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriProdukController;
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


// Routing Product
Route::get('/produk', [ProductController::class, 'index'])->name('product.index');
Route::post('/produk', [ProductController::class, 'store'])->name('product.store');
Route::patch('/produk/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/produk/{id}', [ProductController::class, 'delete'])->name('product.delete');




