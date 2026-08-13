@extends('admin.layouts.app')

@section('title', 'Kelola Produk & Layanan - Panel Admin')
@section('page_heading', 'Manajemen Produk & Layanan')

@section('content')
<div class="admin-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h6 class="fw-bold text-dark-navy mb-1 text-uppercase" style="letter-spacing: 0.5px;">Daftar Produk & Layanan</h6>
            <small class="text-muted">Total: {{ $produks->total() }} layanan terdaftar</small>
        </div>
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary-blue btn-sm px-3 fw-bold">
            <i class="fa-solid fa-plus me-1"></i> Tambah Layanan Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th width="70">No</th>
                    <th width="100">Gambar</th>
                    <th>Nama Layanan</th>
                    <th>Deskripsi</th>
                    <th width="160" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produks as $index => $produk)
                    <tr>
                        <td class="fw-bold text-muted">{{ $produks->firstItem() + $index }}</td>
                        <td>
                            <img src="{{ $produk->gambar_url }}" alt="{{ $produk->nama_produk }}" class="rounded-3 border" width="56" height="56" style="object-fit: cover;">
                        </td>
                        <td>
                            <span class="fw-bold text-dark-navy">{{ $produk->nama_produk }}</span>
                        </td>
                        <td><span class="small text-muted">{{ Str::limit($produk->deskripsi, 80) }}</span></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.produk.edit', $produk->id_produk) }}" class="btn-action-edit" title="Ubah">
                                    <i class="fa-solid fa-pen"></i> Ubah
                                </a>
                                <form action="{{ route('admin.produk.destroy', $produk->id_produk) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-delete" title="Hapus">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-box-open fs-2 mb-2 d-block text-muted opacity-50"></i>
                            Belum ada layanan terdaftar. Silakan klik tombol <strong>Tambah Layanan Baru</strong>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($produks->hasPages())
        <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">
            <small class="text-muted">Menampilkan {{ $produks->firstItem() }} - {{ $produks->lastItem() }} dari {{ $produks->total() }} data</small>
            {{ $produks->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
