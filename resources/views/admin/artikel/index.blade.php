@extends('admin.layouts.app')

@section('title', 'Kelola Artikel - Panel Admin')
@section('page_heading', 'Manajemen Artikel & Blog')

@section('content')
<div class="admin-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h6 class="fw-bold text-dark-navy mb-1 text-uppercase" style="letter-spacing: 0.5px;">Daftar Artikel & Blog</h6>
            <small class="text-muted">Total: {{ $artikels->total() }} artikel dipublikasikan</small>
        </div>
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary-blue btn-sm px-3 fw-bold">
            <i class="fa-solid fa-plus me-1"></i> Tulis Artikel Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th width="70">No</th>
                    <th width="90">Gambar</th>
                    <th>Judul Artikel</th>
                    <th>Tanggal Publikasi</th>
                    <th width="160" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($artikels as $index => $artikel)
                    <tr>
                        <td class="fw-bold text-muted">{{ $artikels->firstItem() + $index }}</td>
                        <td>
                            <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="rounded-3 border" width="56" height="56" style="object-fit: cover;">
                        </td>
                        <td>
                            <span class="fw-bold text-dark-navy">{{ $artikel->judul }}</span>
                        </td>
                        <td>
                            <span class="badge bg-light text-muted border px-2.5 py-2 rounded-pill font-monospace small">
                                <i class="fa-regular fa-calendar me-1 text-primary-blue"></i> {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d M Y') }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.artikel.edit', $artikel->id_artikel) }}" class="btn-action-edit" title="Ubah">
                                    <i class="fa-solid fa-pen"></i> Ubah
                                </a>
                                <form action="{{ route('admin.artikel.destroy', $artikel->id_artikel) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
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
                            <i class="fa-solid fa-newspaper fs-2 mb-2 d-block text-muted opacity-50"></i>
                            Belum ada artikel dipublikasikan. Silakan klik tombol <strong>Tulis Artikel Baru</strong>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($artikels->hasPages())
        <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">
            <small class="text-muted">Menampilkan {{ $artikels->firstItem() }} - {{ $artikels->lastItem() }} dari {{ $artikels->total() }} data</small>
            {{ $artikels->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
