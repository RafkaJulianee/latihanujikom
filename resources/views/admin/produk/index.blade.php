@extends('admin.layouts.app')

@section('title', 'Kelola Produk & Layanan - Panel Admin')
@section('page_heading', 'Manajemen Produk & Layanan')

@section('content')
<div class="admin-card p-4">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4 pb-3 border-bottom">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <h6 class="fw-bold text-dark-navy mb-0 text-uppercase" style="letter-spacing: 0.5px;">Daftar Produk &amp; Layanan</h6>
                <span class="badge bg-light text-primary-blue border border-primary-subtle rounded-pill px-2.5 py-1 small">{{ $produks->total() }} Total</span>
            </div>
            <small class="text-muted">Kelola seluruh penawaran layanan digital yang tampil di website</small>
        </div>
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary-blue btn-sm px-3.5 py-2 fw-semibold rounded-3 d-inline-flex align-items-center gap-1.5 shadow-sm">
            <i class="fa-solid fa-plus"></i> Tambah Layanan Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th width="60" class="text-center">No</th>
                    <th width="90">Gambar</th>
                    <th>Nama Layanan</th>
                    <th>Deskripsi Layanan</th>
                    <th width="160" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produks as $index => $produk)
                    <tr>
                        <td class="text-center fw-semibold text-muted small">{{ $produks->firstItem() + $index }}</td>
                        <td>
                            <img src="{{ $produk->gambar_url }}" alt="{{ $produk->nama_produk }}" class="rounded-3 border shadow-2xs" width="50" height="50" style="object-fit: cover;">
                        </td>
                        <td>
                            <span class="fw-semibold text-dark-navy d-block">{{ $produk->nama_produk }}</span>
                        </td>
                        <td><span class="small text-muted">{{ Str::limit($produk->deskripsi, 85) }}</span></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.produk.edit', $produk->id_produk) }}" class="btn-action-edit" title="Ubah Data">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                                <form action="{{ route('admin.produk.destroy', $produk->id_produk) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-delete" title="Hapus Data">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-box-open fs-2 mb-2 d-block text-muted opacity-40"></i>
                            Belum ada layanan yang ditambahkan. Silakan klik tombol <strong>Tambah Layanan Baru</strong>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($produks->hasPages())
        <div class="mt-4 pt-3 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
            <small class="text-muted">Menampilkan {{ $produks->firstItem() }} - {{ $produks->lastItem() }} dari {{ $produks->total() }} data</small>
            {{ $produks->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
