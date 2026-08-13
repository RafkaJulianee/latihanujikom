<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Profil;
use Illuminate\View\View;

/**
 * Class DashboardController
 * 
 * Controller untuk menampilkan ringkasan metrik dashboard dan statistik konten di panel admin.
 * 
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama panel admin dengan kalkulasi statistik data.
     *
     * @return View
     */
    public function index(): View
    {
        $totalProduk  = Produk::count();
        $totalArtikel = Artikel::count();
        $totalGaleri  = Galeri::count();
        $profil       = Profil::first();

        $recentProduks  = Produk::latest()->take(3)->get();
        $recentArtikels = Artikel::latest()->take(3)->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalArtikel',
            'totalGaleri',
            'profil',
            'recentProduks',
            'recentArtikels'
        ));
    }
}
