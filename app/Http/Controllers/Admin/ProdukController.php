<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class ProdukController
 * 
 * Controller untuk manajemen CRUD (Create, Read, Update, Delete) Produk & Layanan di Panel Admin.
 * 
 * @package App\Http\Controllers\Admin
 */
class ProdukController extends Controller
{
    /**
     * Menampilkan daftar semua produk/layanan dalam tabel dengan paginasi.
     *
     * @return View
     */
    public function index(): View
    {
        $produks = Produk::latest()->paginate(10);
        return view('admin.produk.index', compact('produks'));
    }

    /**
     * Menampilkan form untuk membuat produk/layanan baru.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.produk.create');
    }

    /**
     * Menyimpan data produk/layanan baru ke dalam database beserta upload thumbnail.
     *
     * @param Request $request Data request form
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'deskripsi'   => 'required|string',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $gambarPath = 'ui-ux-design.png';

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/produks'), $filename);
            $gambarPath = 'produks/' . $filename;
        }

        Produk::create([
            'id_admin'    => Auth::guard('admin')->id() ?? 1,
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'gambar'      => $gambarPath,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk/Layanan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit produk/layanan terpilih.
     *
     * @param int $id ID Produk
     * @return View
     */
    public function edit($id): View
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Memperbarui data produk/layanan yang telah ada di database.
     *
     * @param Request $request Data request form
     * @param int $id ID Produk
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'deskripsi'   => 'required|string',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $gambarPath = $produk->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika merupakan file upload lokal
            if ($produk->gambar && str_starts_with($produk->gambar, 'produks/')) {
                $oldPath = public_path('img/' . $produk->gambar);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/produks'), $filename);
            $gambarPath = 'produks/' . $filename;
        }

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'gambar'      => $gambarPath,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk/Layanan berhasil diperbarui!');
    }

    /**
     * Menghapus data produk/layanan terpilih dari database beserta file gambarnya.
     *
     * @param int $id ID Produk
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && str_starts_with($produk->gambar, 'produks/')) {
            $oldPath = public_path('img/' . $produk->gambar);
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk/Layanan berhasil dihapus!');
    }
}