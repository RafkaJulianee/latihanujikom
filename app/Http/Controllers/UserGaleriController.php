<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Profil;
use Illuminate\View\View;

/**
 * Class UserGaleriController
 * 
 * Controller untuk menampilkan portofolio dan galeri karya perusahaan di sisi user publik.
 * 
 * @package App\Http\Controllers
 */
class UserGaleriController extends Controller
{
    /**
     * Menampilkan daftar item galeri dan portofolio dengan paginasi.
     *
     * @return View
     */
    public function index(): View
    {
        $profil  = Profil::first();
        $galeris = Galeri::latest()->paginate(9);

        return view('user.galeri.index', compact('profil', 'galeris'));
    }
}
