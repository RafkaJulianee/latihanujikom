<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class ProfilController
 * 
 * Controller untuk mengelola identitas profil, visi, misi, dan kontak resmi perusahaan di Panel Admin.
 * 
 * @package App\Http\Controllers\Admin
 */
class ProfilController extends Controller
{
    /**
     * Menampilkan form pengaturan profil perusahaan.
     *
     * @return View
     */
    public function edit(): View
    {
        $profil = Profil::first() ?? new Profil();
        return view('admin.profil.edit', compact('profil'));
    }

    /**
     * Memperbarui data profil, visi, misi, dan logo perusahaan.
     *
     * @param Request $request Data request form
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $profil = Profil::first();

        $request->validate([
            'nama_perusahaan' => 'required|string|max:150',
            'tentang'         => 'required|string',
            'visi'            => 'required|string',
            'misi'            => 'required|string',
            'alamat'          => 'required|string',
            'telepon'         => 'required|string|max:20',
            'email'           => 'required|email|max:100',
            'stat1_angka'     => 'nullable|string|max:50',
            'stat1_label'     => 'nullable|string|max:100',
            'stat2_angka'     => 'nullable|string|max:50',
            'stat2_label'     => 'nullable|string|max:100',
            'stat3_angka'     => 'nullable|string|max:50',
            'stat3_label'     => 'nullable|string|max:100',
            'logo'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $logoPath = $profil ? $profil->logo : 'ptsolusikoneksiremovebg.png';

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika bukan aset default
            if ($profil && $profil->logo) {
                if (file_exists(public_path('img/profil/' . $profil->logo))) {
                    @unlink(public_path('img/profil/' . $profil->logo));
                } elseif (file_exists(public_path('img/' . $profil->logo))) {
                    @unlink(public_path('img/' . $profil->logo));
                }
            }

            $file = $request->file('logo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/profil'), $filename);
            $logoPath = 'profil/' . $filename;
        }

        Profil::updateOrCreate(
            ['id_profil' => $profil ? $profil->id_profil : 1],
            [
                'nama_perusahaan' => $request->nama_perusahaan,
                'tentang'         => $request->tentang,
                'visi'            => $request->visi,
                'misi'            => $request->misi,
                'alamat'          => $request->alamat,
                'telepon'         => $request->telepon,
                'email'           => $request->email,
                'stat1_angka'     => $request->stat1_angka ?? '150+',
                'stat1_label'     => $request->stat1_label ?? 'Proyek Selesai',
                'stat2_angka'     => $request->stat2_angka ?? '99%',
                'stat2_label'     => $request->stat2_label ?? 'Kepuasan Klien',
                'stat3_angka'     => $request->stat3_angka ?? '24/7',
                'stat3_label'     => $request->stat3_label ?? 'Dukungan Teknis',
                'logo'            => $logoPath,
            ]
        );

        return redirect()->route('profil.edit')->with('success', 'Profil dan statistik pencapaian berhasil diperbarui!');
    }
}
