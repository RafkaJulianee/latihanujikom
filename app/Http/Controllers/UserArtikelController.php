<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Profil;
use Illuminate\View\View;

/**
 * Class UserArtikelController
 * 
 * Controller untuk menampilkan daftar artikel dan konten bacaan publik.
 * 
 * @package App\Http\Controllers
 */
class UserArtikelController extends Controller
{
    /**
     * Menampilkan daftar artikel terkini dengan paginasi.
     *
     * @return View
     */
    public function index(): View
    {
        $profil   = Profil::first();
        $artikels = Artikel::latest()->paginate(6);

        return view('user.artikel.index', compact('profil', 'artikels'));
    }

    /**
     * Menampilkan halaman baca detail dari artikel terpilih beserta rekomendasi artikel terbaru lainnya.
     *
     * @param int $id ID Artikel yang dicari
     * @return View
     */
    public function show($id): View
    {
        $profil         = Profil::first();
        $artikel        = Artikel::findOrFail($id);
        $recentArtikels = Artikel::where('id_artikel', '!=', $id)->latest()->take(4)->get();

        return view('user.artikel.show', compact('profil', 'artikel', 'recentArtikels'));
    }
}
