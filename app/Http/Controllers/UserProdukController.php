<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Profil;
use Illuminate\View\View;

/**
 * Class UserProdukController
 * 
 * Controller untuk menampilkan katalog dan detail produk/layanan di sisi user publik.
 * 
 * @package App\Http\Controllers
 */
class UserProdukController extends Controller
{
    /**
     * Menampilkan daftar seluruh produk/layanan dengan paginasi.
     *
     * @return View
     */
    public function index(): View
    {
        $profil  = Profil::first();
        $produks = Produk::latest()->paginate(9);

        return view('user.produk.index', compact('profil', 'produks'));
    }

    /**
     * Menampilkan halaman rincian detail dari satu produk/layanan tertentu.
     *
     * @param int $id ID Produk yang dicari
     * @return View
     */
    public function show($id): View
    {
        $profil       = Profil::first();
        $produk       = Produk::findOrFail($id);
        $otherProduks = Produk::where('id_produk', '!=', $id)->take(3)->get();

        return view('user.produk.show', compact('profil', 'produk', 'otherProduks'));
    }
}
