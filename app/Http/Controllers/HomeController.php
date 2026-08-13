<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Profil;
use Illuminate\View\View;

/**
 * Class HomeController
 * 
 * Controller utama untuk menampilkan halaman beranda (single-page landing page) ZICODE.
 * 
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda publik dengan seluruh data terkait
     * (Profil Perusahaan, Produk/Layanan, Artikel Terkini, dan Galeri Portofolio).
     *
     * @return View
     */
    public function index(): View
    {
        $profil   = Profil::first();
        $produks  = Produk::latest()->get();
        $artikels = Artikel::latest()->get();
        $galeris  = Galeri::latest()->get();

        return view('user.index', compact('profil', 'produks', 'artikels', 'galeris'));
    }
}
