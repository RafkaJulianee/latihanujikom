@extends('user.layouts.app')

@section('title', 'Layanan & Solusi Digital - PT Solusi Koneksi')

@section('content')
{{-- Header Banner --}}
<section class="bg-dark-navy text-white py-5">
    <div class="container py-3 text-center">
        <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-3 small font-weight-bold">LAYANAN KAMI</span>
        <h1 class="display-5 fw-bold mb-3">Layanan &amp; Solusi Digital PT Solusi Koneksi</h1>
        <p class="text-white-50 max-w-600 mx-auto fs-6">
            Solusi pengembangan website, aplikasi mobile, desain UI/UX, dan sistem informasi bisnis terintegrasi untuk kebutuhan Anda.
        </p>
    </div>
</section>

{{-- Content Grid --}}
<section class="py-5 bg-soft-card">
    <div class="container py-3">
        <div class="row g-4">
            @forelse($produks as $produk)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 rounded-4 shadow-sm overflow-hidden h-100 bg-white">
                        <div style="height: 200px; overflow: hidden; background-color: #0A1128;">
                            <img src="{{ $produk->gambar_url }}" alt="{{ $produk->nama_produk }}" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="fw-bold text-dark-navy mb-2">{{ $produk->nama_produk }}</h5>
                            <p class="small text-muted mb-0 flex-grow-1 leading-relaxed">{{ $produk->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Belum ada layanan yang tersedia.</p>
                </div>
            @endforelse
        </div>

        @if($produks->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $produks->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</section>
@endsection
