@extends('user.layouts.app')

@section('title', 'Artikel & Insights - ZICODE')

@section('content')
{{-- Header Banner --}}
<section class="bg-dark-navy text-white py-5">
    <div class="container py-3 text-center">
        <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-3 small font-weight-bold">INFORMASI TERKINI</span>
        <h1 class="display-5 fw-bold mb-3">Artikel &amp; Berita ZICODE</h1>
        <p class="text-white-50 max-w-600 mx-auto fs-6">
            Wawasan seputar pengembangan software, teknologi digital, tren UI/UX, dan kabar terbaru seputar industri ZICODE.
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

                {{-- Modal Popup Detail Artikel --}}
                <div class="modal fade" id="artikelModal{{ $artikel->id_artikel }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">
                            <div class="modal-header bg-dark-navy text-white border-0 px-4 py-3">
                                <h5 class="modal-title fw-bold text-white"><i class="fa-solid fa-newspaper text-primary-blue me-2"></i> Detail Artikel</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4 bg-white">
                                <div class="rounded-4 overflow-hidden mb-3 border" style="max-height: 280px; background: #0A1128;">
                                    <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="d-flex align-items-center gap-3 text-muted small mb-3">
                                    <span><i class="fa-regular fa-calendar text-primary-blue me-1"></i> {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d F Y') }}</span>
                                    <span><i class="fa-solid fa-user text-primary-blue me-1"></i> Tim Redaksi ZICODE</span>
                                </div>
                                <h4 class="fw-bold text-dark-navy mb-3">{{ $artikel->judul }}</h4>
                                <div class="text-muted leading-relaxed small">
                                    {!! nl2br(e($artikel->isi)) !!}
                                </div>
                            </div>
                            <div class="modal-footer bg-soft-card border-0 px-4 py-3">
                                <a href="{{ route('home') }}#kontak" class="btn btn-primary-blue btn-sm px-4">Konsultasi Dengan ZICODE <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                <button type="button" class="btn btn-outline-navy btn-sm px-4" data-bs-dismiss="modal">Tutup</button>
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
