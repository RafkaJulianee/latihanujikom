@extends('user.layouts.app')

@section('title', $artikel->judul . ' - ZICODE')

@section('content')
{{-- Page Header / Breadcrumb --}}
<section class="bg-soft-card py-4 border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-primary-blue text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.artikel.index') }}" class="text-primary-blue text-decoration-none">Artikel</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($artikel->judul, 40) }}</li>
            </ol>
        </nav>
        <h1 class="h2 fw-bold text-dark-navy mb-2">{{ $artikel->judul }}</h1>
        <div class="d-flex align-items-center gap-3 text-muted small">
            <span><i class="fa-regular fa-calendar text-primary-blue me-1"></i> {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d F Y') }}</span>
            <span><i class="fa-solid fa-user text-primary-blue me-1"></i> Tim Redaksi ZICODE</span>
        </div>
    </div>
</section>

{{-- Detail Content Section --}}
<section class="py-5 bg-white">
    <div class="container py-2">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="rounded-4 overflow-hidden mb-4 border shadow-sm" style="max-height: 420px;">
                    <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="img-fluid w-100 object-fit-cover">
                </div>

                <div class="fs-6 text-dark leading-relaxed mb-5">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('user.artikel.index') }}" class="btn btn-outline-navy btn-sm">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Artikel
                    </a>
                    <a href="{{ route('home') }}#kontak" class="btn btn-primary-blue btn-sm">
                        Hubungi ZICODE <i class="fa-solid fa-envelope ms-1"></i>
                    </a>
                </div>
            </div>

            {{-- Recent Articles Sidebar --}}
            <div class="col-lg-4">
                <div class="p-4 rounded-4 bg-soft-card border">
                    <h6 class="fw-bold text-dark-navy mb-3">Artikel Terbaru Lainnya</h6>
                    <div class="d-flex flex-column gap-3">
                        @foreach($recentArtikels as $recent)
                            <div class="d-flex align-items-center gap-3 pb-2 border-bottom">
                                <img src="{{ $recent->gambar_url }}" class="rounded-3 object-fit-cover" width="64" height="64" alt="{{ $recent->judul }}">
                                <div>
                                    <h6 class="fw-bold mb-1 small">
                                        <a href="{{ route('user.artikel.show', $recent->id_artikel) }}" class="text-dark-navy text-decoration-none">
                                            {{ Str::limit($recent->judul, 45) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted fs-7"><i class="fa-regular fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($recent->tanggal)->format('d M Y') }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
