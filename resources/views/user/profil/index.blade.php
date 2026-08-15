@extends('user.layouts.app')

@section('title', 'Profil Perusahaan - PT Solusi Koneksi')

@section('content')
{{-- Header Banner --}}
<section class="bg-dark-navy text-white py-5">
    <div class="container py-3 text-center">
        <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-3 small font-weight-bold">PROFIL PERUSAHAAN</span>
        <h1 class="display-5 fw-bold mb-3">Tentang Perusahaan PT Solusi Koneksi</h1>
        <p class="text-white-50 max-w-600 mx-auto fs-6">
            Mengenal lebih dekat profil, visi, misi, dan komitmen profesional di balik layanan PT Solusi Koneksi.
        </p>
    </div>
</section>

{{-- Profil Content --}}
<section class="py-5 bg-white">
    <div class="container py-3">
        <div class="row g-5 align-items-center mb-5">
            <div class="col-lg-6">
                <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-3 small font-weight-bold">KISAH KAMI</span>
                <h2 class="display-6 fw-bold text-dark-navy mb-4">{{ $profil->nama_perusahaan ?? 'PT Solusi Koneksi' }}</h2>
                <div class="fs-6 text-muted leading-relaxed mb-4">
                    {{ $profil->tentang ?? 'PT Solusi Koneksi adalah penyedia layanan teknologi dan transformasi digital yang berfokus pada pengembangan produk berkualitas tinggi, desain intuitif, serta performa maksimal bagi perkembangan bisnis Anda.' }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="{{ asset('img/team.jpg') }}" class="img-fluid rounded-4 shadow-sm border" alt="Tim PT Solusi Koneksi">
                </div>
            </div>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-md-6">
                <div class="p-4 rounded-4 bg-primary-blue text-white h-100 shadow-sm">
                    <div class="d-inline-flex p-3 bg-white text-primary-blue rounded-circle mb-3 fs-4 shadow-sm">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Visi Perusahaan</h4>
                    <p class="fs-6 leading-relaxed text-white-50 mb-0">
                        {{ $profil->visi ?? 'Menjadi mitra solusi teknologi digital terdepan yang terpercaya dalam menghadirkan inovasi efisien dan berdampak positif bagi pertumbuhan klien.' }}
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 rounded-4 bg-dark-navy text-white h-100 shadow-sm">
                    <div class="d-inline-flex p-3 bg-white text-dark-navy rounded-circle mb-3 fs-4 shadow-sm">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Misi Perusahaan</h4>
                    <div class="fs-6 leading-relaxed text-white-50">
                        {!! nl2br(e($profil->misi)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
