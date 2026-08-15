@extends('user.layouts.app')

@section('title', 'Artikel & Insights - PT Solusi Koneksi')

@section('content')
{{-- Header Banner --}}
<section class="bg-dark-navy text-white py-5">
    <div class="container py-3 text-center">
        <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-3 small font-weight-bold">ARTIKEL &amp; INSIGHT</span>
        <h1 class="display-5 fw-bold mb-3">Artikel &amp; Insight PT Solusi Koneksi</h1>
        <p class="text-white-50 max-w-600 mx-auto fs-6">
            Edukasi, tren teknologi, dan tips seputar pengembangan produk digital untuk mendukung transformasi bisnis Anda.
        </p>
    </div>
</section>

{{-- Content Grid --}}
<section class="py-5 bg-soft-card">
    <div class="container py-3">
        <div class="row g-4">
            @forelse($artikels as $artikel)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100 bg-white">
                        <div class="position-relative" style="height: 200px; overflow: hidden; background-color: #0A1128;">
                            <img src="{{ $artikel->gambar_url }}" class="w-100 h-100 object-fit-cover" alt="{{ $artikel->judul }}">
                            <span class="badge bg-dark-navy position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill small border border-secondary border-opacity-25">
                                <i class="fa-regular fa-calendar text-primary-blue me-1"></i> {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d M Y') }}
                            </span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark-navy mb-3">{{ $artikel->judul }}</h5>
                            <p class="card-text text-muted small mb-4 flex-grow-1">
                                {{ Str::limit(strip_tags($artikel->isi), 110) }}
                            </p>
                            <button type="button" class="btn btn-outline-navy btn-sm w-100 font-weight-bold" data-bs-toggle="modal" data-bs-target="#artikelModal{{ $artikel->id_artikel }}">
                                Baca Selengkapnya <i class="fa-solid fa-newspaper ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Modal Popup Detail Artikel (Simple & Compact) --}}
                <div class="modal fade" id="artikelModal{{ $artikel->id_artikel }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content border-0 rounded-4 shadow">
                            <div class="modal-header border-0 pb-0 pt-3 px-4">
                                <div class="d-flex align-items-center gap-2 text-muted small">
                                    <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold px-2.5 py-1 rounded-pill">Artikel</span>
                                    <small><i class="fa-regular fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d M Y') }}</small>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-4 pt-3 pb-3">
                                <h5 class="fw-bold text-dark-navy mb-3" style="line-height: 1.4;">{{ $artikel->judul }}</h5>
                                
                                <div class="rounded-3 overflow-hidden mb-3 border" style="height: 180px; background: #0F172A;">
                                    <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="w-100 h-100 object-fit-cover">
                                </div>

                                <div class="text-secondary leading-relaxed small" style="line-height: 1.7; text-align: justify; color: #475569;">
                                    {!! nl2br(e($artikel->isi)) !!}
                                </div>
                            </div>
                            <div class="modal-footer border-0 pt-0 pb-3 px-4">
                                <button type="button" class="btn btn-outline-navy btn-sm px-3 rounded-pill" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Belum ada artikel dipublikasikan.</p>
                </div>
            @endforelse
        </div>

        @if($artikels->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $artikels->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</section>
@endsection
