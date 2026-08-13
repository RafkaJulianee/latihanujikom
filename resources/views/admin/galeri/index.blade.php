@extends('admin.layouts.app')

@section('title', 'Kelola Galeri Portofolio - Panel Admin')
@section('page_heading', 'Manajemen Galeri & Portofolio')

@section('content')
<div class="admin-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h6 class="fw-bold text-dark-navy mb-1 text-uppercase" style="letter-spacing: 0.5px;">Daftar Galeri & Portofolio</h6>
            <small class="text-muted">Total: {{ $galeris->total() }} item karya</small>
        </div>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary-blue btn-sm px-3 fw-bold">
            <i class="fa-solid fa-plus me-1"></i> Tambah Karya Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th width="70">No</th>
                    <th width="100">Pratinjau</th>
                    <th>Judul Karya</th>
                    <th>Keterangan / Deskripsi</th>
                    <th width="160" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeris as $index => $galeri)
                    <tr>
                        <td class="fw-bold text-muted">{{ $galeris->firstItem() + $index }}</td>
                        <td>
                            <img src="{{ $galeri->gambar_url }}" alt="{{ $galeri->judul }}" class="rounded-3 border" width="56" height="56" style="object-fit: cover;">
                        </td>
                        <td>
                            <span class="fw-bold text-dark-navy">{{ $galeri->judul }}</span>
                        </td>
                        <td><span class="small text-muted">{{ Str::limit($galeri->keterangan, 80) }}</span></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.galeri.edit', $galeri->id_galeri) }}" class="btn-action-edit" title="Ubah">
                                    <i class="fa-solid fa-pen"></i> Ubah
                                </a>
                                <form action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus galeri ini?');">
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
                            <i class="fa-solid fa-images fs-2 mb-2 d-block text-muted opacity-50"></i>
                            Belum ada item karya diunggah. Silakan klik tombol <strong>Tambah Karya Baru</strong>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($galeris->hasPages())
        <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">
            <small class="text-muted">Menampilkan {{ $galeris->firstItem() }} - {{ $galeris->lastItem() }} dari {{ $galeris->total() }} data</small>
            {{ $galeris->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
