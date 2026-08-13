<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProdukController;
use App\Http\Controllers\UserArtikelController;
use App\Http\Controllers\UserGaleriController;
use App\Http\Controllers\UserKontakController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\ProfilController;

/*
|--------------------------------------------------------------------------
| 1. Frontend / Public User Routes (Single Page Landing Page)
|--------------------------------------------------------------------------
| Menangani seluruh rute untuk pengguna publik / pengunjung situs web.
| Mendukung akses section landing page serta direct redirection.
|--------------------------------------------------------------------------
*/

// Halaman Beranda Utama (Single-Page Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Redirect sub-halaman ke masing-masing section anchor pada landing page
Route::get('/tentang', fn() => redirect('/#profil'))->name('user.profil');
Route::get('/produk', fn() => redirect('/#produk'))->name('user.produk.index');
Route::get('/produk/{id}', fn() => redirect('/#produk'))->name('user.produk.show');

Route::get('/artikel', fn() => redirect('/#artikel'))->name('user.artikel.index');
Route::get('/artikel/{id}', fn() => redirect('/#artikel'))->name('user.artikel.show');

Route::get('/galeri', fn() => redirect('/#galeri'))->name('user.galeri.index');
Route::get('/kontak', fn() => redirect('/#kontak'))->name('user.kontak');
Route::post('/kontak', [UserKontakController::class, 'sendPesan'])->name('user.kontak.send');


/*
|--------------------------------------------------------------------------
| 2. Admin Panel & Authentication Routes
|--------------------------------------------------------------------------
| Menangani autentikasi login/logout administrator serta fitur CRUD data:
| - Dashboard Ringkasan Metrik
| - Manajemen Produk & Layanan
| - Manajemen Artikel & Blog
| - Manajemen Galeri & Portofolio
| - Pengaturan Profil Perusahaan
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    // Autentikasi Admin (Guest)
    Route::get('/', fn() => redirect()->route('admin.login'));
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Panel Kontrol Admin (Protected / Middleware auth:admin)
    Route::middleware(['auth:admin'])->group(function () {
        // Dashboard Metrik
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Resource CRUD: Produk & Layanan
        Route::resource('produk', ProdukController::class, ['as' => 'admin']);

        // Resource CRUD: Artikel & Blog
        Route::resource('artikel', ArtikelController::class, ['as' => 'admin']);

        // Resource CRUD: Galeri & Portofolio
        Route::resource('galeri', GaleriController::class, ['as' => 'admin']);

        // Pengaturan Profil Perusahaan
        Route::get('profil', [ProfilController::class, 'edit'])->name('profil.edit');
        Route::put('profil', [ProfilController::class, 'update'])->name('profil.update');
    });
});
