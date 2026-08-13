@extends('user.layouts.app')

@section('title', 'Galeri Kegiatan & Portofolio - ZICODE')

@section('content')
{{-- Header Banner --}}
<section class="bg-dark-navy text-white py-5">
    <div class="container py-3 text-center">
        <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-3 small font-weight-bold">GALERI KEGIATAN</span>
        <h1 class="display-5 fw-bold mb-3">Galeri &amp; Dokumentasi ZICODE</h1>
        <p class="text-white-50 max-w-600 mx-auto fs-6">
            Kumpulan dokumentasi kegiatan, hasil karya portofolio, dan aktivitas pengembangan teknologi terbaru dari ZICODE.
        </p>
    </div>
</section>

{{-- Content Grid --}}
<section class="py-5 bg-soft-card">
    <div class="container py-3">
        <div class="row g-4">
            @forelse($galeris as $galeri)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100 bg-white">
                        <div style="height: 220px; overflow: hidden; background-color: #0A1128;">
                            <img src="{{ $galeri->gambar_url }}" alt="{{ $galeri->judul }}" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="fw-bold text-dark-navy mb-2">{{ $galeri->judul }}</h5>
                                <p class="small text-muted mb-4">{{ $galeri->keterangan }}</p>
                            </div>
                            <button type="button" class="btn btn-outline-navy btn-sm w-100 font-weight-bold" data-bs-toggle="modal" data-bs-target="#galeriModal{{ $galeri->id_galeri }}">
                                <i class="fa-solid fa-expand me-1"></i> Lihat Foto Penuh
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Lightbox Modal --}}
                <div class="modal fade" id="galeriModal{{ $galeri->id_galeri }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0 rounded-4 overflow-hidden">
                            <div class="modal-header bg-dark-navy text-white border-0">
                                <h5 class="modal-title fw-bold">{{ $galeri->judul }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0 bg-dark text-center">
                                <img src="{{ $galeri->gambar_url }}" alt="{{ $galeri->judul }}" class="img-fluid w-100">
                            </div>
                            <div class="modal-footer bg-white border-0">
                                <p class="small text-muted mb-0 me-auto">{{ $galeri->keterangan }}</p>
                                <button type="button" class="btn btn-primary-blue btn-sm px-4" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Belum ada foto galeri yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>

        @if($galeris->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $galeris->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</section>
@endsection
