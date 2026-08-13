<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class GaleriController
 * 
 * Controller untuk manajemen CRUD (Create, Read, Update, Delete) Galeri & Portofolio di Panel Admin.
 * 
 * @package App\Http\Controllers\Admin
 */
class GaleriController extends Controller
{
    /**
     * Menampilkan daftar item karya/portofolio dalam tabel dengan paginasi.
     *
     * @return View
     */
    public function index(): View
    {
        $galeris = Galeri::latest()->paginate(10);
        return view('admin.galeri.index', compact('galeris'));
    }

    /**
     * Menampilkan form untuk menambahkan karya/portofolio baru.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.galeri.create');
    }

    /**
     * Menyimpan data portofolio baru ke dalam database beserta upload gambar.
     *
     * @param Request $request Data request form
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul'      => 'required|string|max:150',
            'keterangan' => 'required|string',
            'gambar'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $gambarPath = 'galeri-financial-app.png';

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/galeris'), $filename);
            $gambarPath = 'galeris/' . $filename;
        }

        Galeri::create([
            'id_admin'   => Auth::guard('admin')->id() ?? 1,
            'judul'      => $request->judul,
            'keterangan' => $request->keterangan,
            'gambar'     => $gambarPath,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri/Portofolio berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengubah data portofolio terpilih.
     *
     * @param int $id ID Galeri
     * @return View
     */
    public function edit($id): View
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    /**
     * Memperbarui data karya/portofolio yang telah ada di database.
     *
     * @param Request $request Data request form
     * @param int $id ID Galeri
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul'      => 'required|string|max:150',
            'keterangan' => 'required|string',
            'gambar'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $gambarPath = $galeri->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika merupakan file upload lokal
            if ($galeri->gambar && str_starts_with($galeri->gambar, 'galeris/')) {
                $oldPath = public_path('img/' . $galeri->gambar);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/galeris'), $filename);
            $gambarPath = 'galeris/' . $filename;
        }

        $galeri->update([
            'judul'      => $request->judul,
            'keterangan' => $request->keterangan,
            'gambar'     => $gambarPath,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri/Portofolio berhasil diperbarui!');
    }

    /**
     * Menghapus item portofolio dari database beserta file gambarnya.
     *
     * @param int $id ID Galeri
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->gambar && str_starts_with($galeri->gambar, 'galeris/')) {
            $oldPath = public_path('img/' . $galeri->gambar);
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri/Portofolio berhasil dihapus!');
    }
}
