@extends('admin.layouts.app')

@section('title', 'Ringkasan Dashboard - Panel Admin')
@section('page_heading', 'Ringkasan Dashboard')

@section('content')
{{-- Metric Statistic Cards Row --}}
<div class="row g-4 mb-4">
    <!-- Card 1: Total Produk -->
    <div class="col-md-4">
        <div class="admin-card admin-card-stat p-4 h-100 d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px;">Produk & Layanan</span>
                    <h2 class="fw-black text-primary-blue mb-0 mt-2" style="font-family: 'Outfit', sans-serif;">{{ $totalProduk }}</h2>
                </div>
                <div class="stat-icon-wrapper bg-primary bg-opacity-10 text-primary-blue">
                    <i class="fa-solid fa-cubes"></i>
                </div>
            </div>
            <a href="{{ route('admin.produk.index') }}" class="small text-primary-blue fw-bold text-decoration-none d-inline-flex align-items-center gap-1">
                Kelola Layanan <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
            </a>
        </div>
    </div>

    <!-- Card 2: Total Artikel -->
    <div class="col-md-4">
        <div class="admin-card admin-card-stat p-4 h-100 d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px;">Artikel & Blog</span>
                    <h2 class="fw-black text-dark-navy mb-0 mt-2" style="font-family: 'Outfit', sans-serif;">{{ $totalArtikel }}</h2>
                </div>
                <div class="stat-icon-wrapper bg-dark bg-opacity-10 text-dark-navy">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
            </div>
            <a href="{{ route('admin.artikel.index') }}" class="small text-dark-navy fw-bold text-decoration-none d-inline-flex align-items-center gap-1">
                Kelola Artikel <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
            </a>
        </div>
    </div>

    <!-- Card 3: Total Galeri -->
    <div class="col-md-4">
        <div class="admin-card admin-card-stat p-4 h-100 d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px;">Galeri & Portofolio</span>
                    <h2 class="fw-black text-success mb-0 mt-2" style="font-family: 'Outfit', sans-serif;">{{ $totalGaleri }}</h2>
                </div>
                <div class="stat-icon-wrapper bg-success bg-opacity-10 text-success">
                    <i class="fa-solid fa-images"></i>
                </div>
            </div>
            <a href="{{ route('admin.galeri.index') }}" class="small text-success fw-bold text-decoration-none d-inline-flex align-items-center gap-1">
                Kelola Galeri <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
            </a>
        </div>
    </div>
</div>

{{-- Quick Actions Bar & Recent Items --}}
<div class="row g-4">
    <!-- Recent Products Table -->
    <div class="col-lg-8">
        <div class="admin-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h6 class="fw-bold text-dark-navy mb-1 text-uppercase" style="letter-spacing: 0.5px;">Produk / Layanan Terbaru</h6>
                    <small class="text-muted">Daftar paket layanan digital yang aktif ditampilkan</small>
                </div>
                <a href="{{ route('admin.produk.create') }}" class="btn btn-primary-blue btn-sm px-3 fw-bold">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Layanan
                </a>
            </div>

            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Layanan</th>
                            <th>Deskripsi</th>
                            <th width="80" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentProduks as $p)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ $p->gambar_url }}" width="44" height="44" class="rounded-3" style="object-fit: cover;" alt="{{ $p->nama_produk }}">
                                        <span class="fw-bold text-dark">{{ $p->nama_produk }}</span>
                                    </div>
                                </td>
                                <td><span class="small text-muted">{{ Str::limit($p->deskripsi, 55) }}</span></td>
                                <td class="text-center">
                                    <a href="{{ route('admin.produk.edit', $p->id_produk) }}" class="btn-action-edit" title="Ubah Layanan">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted small py-4">Belum ada data layanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Company Summary Card -->
    <div class="col-lg-4">
        <div class="admin-card p-4 h-100 d-flex flex-column justify-content-between">
            <div>
                <h6 class="fw-bold text-dark-navy mb-3 text-uppercase" style="letter-spacing: 0.5px;">Informasi Perusahaan</h6>
                <div class="p-3 bg-light rounded-4 mb-4 border border-light-subtle">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="bg-primary-blue text-white rounded-3 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                            <i class="fa-solid fa-building" style="font-size: 0.9rem;"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark-navy mb-0">{{ $profil->nama_perusahaan ?? 'ZICODE DIGITAL AGENCY' }}</h6>
                            <small class="text-muted">Profil Utama Website</small>
                        </div>
                    </div>
                    
                    <div class="small text-muted mb-2 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-envelope text-primary-blue" style="width: 16px;"></i>
                        <span>{{ $profil->email ?? '-' }}</span>
                    </div>
                    <div class="small text-muted d-flex align-items-center gap-2">
                        <i class="fa-solid fa-phone text-primary-blue" style="width: 16px;"></i>
                        <span>{{ $profil->telepon ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <a href="{{ route('profil.edit') }}" class="btn btn-outline-navy w-100 fw-bold py-2 text-center">
                <i class="fa-solid fa-gear me-1"></i> Edit Profil Perusahaan
            </a>
        </div>
    </div>
</div>
@endsection
