@extends('admin.layouts.app')

@section('title', 'Kelola Artikel - Panel Admin')
@section('page_heading', 'Manajemen Artikel & Blog')

@section('content')
<div class="admin-card p-4">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4 pb-3 border-bottom">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <h6 class="fw-bold text-dark-navy mb-0 text-uppercase" style="letter-spacing: 0.5px;">Daftar Artikel &amp; Insight</h6>
                <span class="badge bg-light text-dark-navy border border-secondary-subtle rounded-pill px-2.5 py-1 small">{{ $artikels->total() }} Total</span>
            </div>
            <small class="text-muted">Kelola publikasi artikel, edukasi, dan wawasan industri</small>
        </div>
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary-blue btn-sm px-3.5 py-2 fw-semibold rounded-3 d-inline-flex align-items-center gap-1.5 shadow-sm">
            <i class="fa-solid fa-pen-nib"></i> Tulis Artikel Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th width="60" class="text-center">No</th>
                    <th width="90">Sampul</th>
                    <th>Judul Artikel</th>
                    <th width="160">Tanggal Terbit</th>
                    <th width="160" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($artikels as $index => $artikel)
                    <tr>
                        <td class="text-center fw-semibold text-muted small">{{ $artikels->firstItem() + $index }}</td>
                        <td>
                            <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="rounded-3 border" width="50" height="50" style="object-fit: cover;">
                        </td>
                        <td>
                            <span class="fw-semibold text-dark-navy d-block">{{ $artikel->judul }}</span>
                        </td>
                        <td>
                            <span class="badge bg-light text-secondary border px-2.5 py-1.5 rounded-pill small">
                                <i class="fa-regular fa-calendar me-1 text-primary-blue"></i> {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d M Y') }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.artikel.edit', $artikel->id_artikel) }}" class="btn-action-edit" title="Ubah Artikel">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                                <form action="{{ route('admin.artikel.destroy', $artikel->id_artikel) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-delete" title="Hapus Artikel">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-newspaper fs-2 mb-2 d-block text-muted opacity-40"></i>
                            Belum ada artikel dipublikasikan. Silakan klik tombol <strong>Tulis Artikel Baru</strong>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($artikels->hasPages())
        <div class="mt-4 pt-3 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
            <small class="text-muted">Menampilkan {{ $artikels->firstItem() }} - {{ $artikels->lastItem() }} dari {{ $artikels->total() }} data</small>
            {{ $artikels->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
