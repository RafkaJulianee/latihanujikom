<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class ArtikelController
 * 
 * Controller untuk manajemen CRUD (Create, Read, Update, Delete) Artikel & Berita di Panel Admin.
 * 
 * @package App\Http\Controllers\Admin
 */
class ArtikelController extends Controller
{
    /**
     * Menampilkan daftar seluruh artikel dalam tabel dengan paginasi.
     *
     * @return View
     */
    public function index(): View
    {
        $artikels = Artikel::latest()->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    /**
     * Menampilkan form untuk menulis artikel baru.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.artikel.create');
    }

    /**
     * Menyimpan publikasi artikel baru ke dalam database beserta upload thumbnail.
     *
     * @param Request $request Data request form
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul'   => 'required|string|max:100',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $gambarPath = 'artikel-3d-trends.png';

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/artikels'), $filename);
            $gambarPath = 'artikels/' . $filename;
        }

        Artikel::create([
            'id_admin' => Auth::guard('admin')->id() ?? 1,
            'judul'    => $request->judul,
            'isi'      => $request->isi,
            'tanggal'  => $request->tanggal,
            'gambar'   => $gambarPath,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengubah artikel terpilih.
     *
     * @param int $id ID Artikel
     * @return View
     */
    public function edit($id): View
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Memperbarui isi konten dan data artikel yang telah ada di database.
     *
     * @param Request $request Data request form
     * @param int $id ID Artikel
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul'   => 'required|string|max:100',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $gambarPath = $artikel->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika merupakan file upload lokal
            if ($artikel->gambar && str_starts_with($artikel->gambar, 'artikels/')) {
                $oldPath = public_path('img/' . $artikel->gambar);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/artikels'), $filename);
            $gambarPath = 'artikels/' . $filename;
        }

        $artikel->update([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar'  => $gambarPath,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Menghapus artikel terpilih dari database beserta file gambarnya.
     *
     * @param int $id ID Artikel
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->gambar && str_starts_with($artikel->gambar, 'artikels/')) {
            $oldPath = public_path('img/' . $artikel->gambar);
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
