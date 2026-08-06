<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\ProfilController;


Route::get('/', function () {
    return view('welcome');
});


// Route Admin Resource
Route::prefix('admin')->group(function () {
    Route::resource('produk', ProdukController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('galeri', GaleriController::class);
    
    // Route Single Page Profil
    Route::get('profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('profil', [ProfilController::class, 'update'])->name('profil.update');
});
