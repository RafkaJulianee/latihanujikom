@extends('admin.layouts.app')

@section('title', 'Kelola Galeri Portofolio - Panel Admin')
@section('page_heading', 'Manajemen Galeri & Portofolio')

@section('content')
<div class="admin-card p-4">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4 pb-3 border-bottom">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <h6 class="fw-bold text-dark-navy mb-0 text-uppercase" style="letter-spacing: 0.5px;">Daftar Galeri &amp; Portofolio</h6>
                <span class="badge bg-light text-success border border-success-subtle rounded-pill px-2.5 py-1 small">{{ $galeris->total() }} Total</span>
            </div>
            <small class="text-muted">Kelola dokumentasi karya dan aktivitas proyek perusahaan</small>
        </div>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary-blue btn-sm px-3.5 py-2 fw-semibold rounded-3 d-inline-flex align-items-center gap-1.5 shadow-sm">
            <i class="fa-solid fa-plus"></i> Tambah Karya Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th width="60" class="text-center">No</th>
                    <th width="90">Foto</th>
                    <th>Judul Karya</th>
                    <th>Keterangan / Deskripsi</th>
                    <th width="160" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeris as $index => $galeri)
                    <tr>
                        <td class="text-center fw-semibold text-muted small">{{ $galeris->firstItem() + $index }}</td>
                        <td>
                            <img src="{{ $galeri->gambar_url }}" alt="{{ $galeri->judul }}" class="rounded-3 border" width="50" height="50" style="object-fit: cover;">
                        </td>
                        <td>
                            <span class="fw-semibold text-dark-navy d-block">{{ $galeri->judul }}</span>
                        </td>
                        <td><span class="small text-muted">{{ Str::limit($galeri->keterangan, 85) }}</span></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.galeri.edit', $galeri->id_galeri) }}" class="btn-action-edit" title="Ubah Karya">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                                <form action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus galeri ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-delete" title="Hapus Karya">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-images fs-2 mb-2 d-block text-muted opacity-40"></i>
                            Belum ada foto karya diunggah. Silakan klik tombol <strong>Tambah Karya Baru</strong>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($galeris->hasPages())
        <div class="mt-4 pt-3 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
            <small class="text-muted">Menampilkan {{ $galeris->firstItem() }} - {{ $galeris->lastItem() }} dari {{ $galeris->total() }} data</small>
            {{ $galeris->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
