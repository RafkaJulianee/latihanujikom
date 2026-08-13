@extends('user.layouts.app')

@section('title', 'Layanan & Solusi Digital - ZICODE')

@section('content')
{{-- Header Banner --}}
<section class="bg-dark-navy text-white py-5">
    <div class="container py-3 text-center">
        <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-3 small font-weight-bold">PRODUK &amp; LAYANAN</span>
        <h1 class="display-5 fw-bold mb-3">Layanan &amp; Solusi Digital ZICODE</h1>
        <p class="text-white-50 max-w-600 mx-auto fs-6">
            Temukan berbagai layanan digital, pengembangan aplikasi, integrasi sistem, dan solusi bisnis berbasis teknologi tinggi dari ZICODE.
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
                            <p class="small text-muted mb-4 flex-grow-1">{{ Str::limit($produk->deskripsi, 100) }}</p>
                            <button type="button" class="btn btn-primary-blue btn-sm w-100" data-bs-toggle="modal" data-bs-target="#produkModal{{ $produk->id_produk }}">
                                Detail Layanan <i class="fa-solid fa-expand ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Modal Popup Detail Produk --}}
                <div class="modal fade" id="produkModal{{ $produk->id_produk }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">
                            <div class="modal-header bg-dark-navy text-white border-0 px-4 py-3">
                                <h5 class="modal-title fw-bold text-white"><i class="fa-solid fa-cube text-primary-blue me-2"></i> {{ $produk->nama_produk }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4 bg-white">
                                <div class="row g-4 align-items-center">
                                    <div class="col-md-5">
                                        <div class="rounded-4 overflow-hidden border" style="height: 220px; background: #0A1128;">
                                            <img src="{{ $produk->gambar_url }}" alt="{{ $produk->nama_produk }}" class="w-100 h-100 object-fit-cover">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-2 small font-weight-bold">PRODUK &amp; LAYANAN</span>
                                        <h4 class="fw-bold text-dark-navy mb-3">{{ $produk->nama_produk }}</h4>
                                        <div class="text-muted small leading-relaxed mb-3">
                                            {!! nl2br(e($produk->deskripsi)) !!}
                                        </div>
                                        <div class="p-3 bg-soft-card rounded-3 border">
                                            <small class="fw-bold text-dark-navy d-block mb-1"><i class="fa-solid fa-shield-halved text-primary-blue me-1"></i> Standar Layanan ZICODE:</small>
                                            <small class="text-muted">Kualitas pengerjaan tinggi, integrasi sistem teruji, dan konsultasi berkelanjutan.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-soft-card border-0 px-4 py-3">
                                <a href="{{ route('home') }}#kontak" class="btn btn-primary-blue btn-sm px-4">Konsultasi Layanan Ini <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                <button type="button" class="btn btn-outline-navy btn-sm px-4" data-bs-dismiss="modal">Tutup</button>
                            </div>
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
