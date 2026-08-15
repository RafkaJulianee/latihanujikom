@extends('user.layouts.app')

@section('title', $produk->nama_produk . ' - PT Solusi Koneksi')

@section('content')
{{-- Page Header / Breadcrumb --}}
<section class="bg-soft-card py-4 border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-primary-blue text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.produk.index') }}" class="text-primary-blue text-decoration-none">Layanan</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $produk->nama_produk }}</li>
            </ol>
        </nav>
        <h1 class="h2 fw-bold text-dark-navy mb-0">{{ $produk->nama_produk }}</h1>
    </div>
</section>

{{-- Detail Content Section --}}
<section class="py-5 bg-white">
    <div class="container py-3">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="rounded-4 overflow-hidden border shadow-sm" style="background-color: #0A1128;">
                    <img src="{{ $produk->gambar_url }}" alt="{{ $produk->nama_produk }}" class="img-fluid w-100 object-fit-cover">
                </div>
            </div>

            <div class="col-lg-6">
                <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-3 small font-weight-bold">PRODUK &amp; LAYANAN</span>
                <h2 class="display-6 fw-bold text-dark-navy mb-4">{{ $produk->nama_produk }}</h2>
                <div class="fs-6 text-muted mb-4 leading-relaxed">
                    {!! nl2br(e($produk->deskripsi)) !!}
                </div>

                <div class="p-4 rounded-4 bg-soft-card border mb-4">
                    <h6 class="fw-bold text-dark-navy mb-3"><i class="fa-solid fa-circle-check text-primary-blue me-2"></i> Keunggulan Layanan Ini:</h6>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2 text-dark small">
                        <li><i class="fa-solid fa-check text-primary-blue me-2"></i> Solusi disesuaikan secara khusus dengan skala bisnis Anda</li>
                        <li><i class="fa-solid fa-check text-primary-blue me-2"></i> Standar performa tinggi &amp; jaminan keamanan terintegrasi</li>
                        <li><i class="fa-solid fa-check text-primary-blue me-2"></i> Dukungan konsultasi &amp; respon cepat dari tim PT Solusi Koneksi</li>
                    </ul>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('home') }}#kontak" class="btn btn-primary-blue py-2 px-4">
                        Konsultasi Sekarang <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                    <a href="{{ route('user.produk.index') }}" class="btn btn-outline-navy py-2 px-4">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
