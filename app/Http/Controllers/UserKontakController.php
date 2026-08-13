<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class UserKontakController
 * 
 * Controller untuk menampilkan informasi kontak, profil perusahaan,
 * dan memproses pengiriman pesan formulir konsultasi dari pengunjung.
 * 
 * @package App\Http\Controllers
 */
class UserKontakController extends Controller
{
    /**
     * Menampilkan halaman profil & tentang perusahaan.
     *
     * @return View
     */
    public function profil(): View
    {
        $profil = Profil::first();
        return view('user.profil.index', compact('profil'));
    }

    /**
     * Menampilkan halaman formulir dan informasi kontak perusahaan.
     *
     * @return View
     */
    public function kontak(): View
    {
        $profil = Profil::first();
        return view('user.kontak.index', compact('profil'));
    }

    /**
     * Memvalidasi dan menerima pesan konsultasi yang dikirim pengunjung melalui formulir kontak.
     *
     * @param Request $request Data request yang dikirim
     * @return RedirectResponse
     */
    public function sendPesan(Request $request): RedirectResponse
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'pesan' => 'required|string',
        ]);

        return back()->with('success', 'Terima kasih! Pesan Anda telah terkirim. Tim kami akan segera menghubungi Anda.');
    }
}
