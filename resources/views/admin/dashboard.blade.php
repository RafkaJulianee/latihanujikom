@extends('admin.layouts.app')

@section('title', 'Dashboard - Panel Admin')
@section('page_heading', 'Ringkasan Dashboard')

@section('content')
{{-- Metric Statistic Cards Row --}}
<div class="row g-4 mb-4">
    <!-- Card 1: Total Produk -->
    <div class="col-md-4">
        <div class="admin-card admin-card-stat h-100 d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 0.75rem;">Layanan Aktif</span>
                    <h2 class="fw-black text-primary-blue mb-0 mt-2" style="font-family: 'Outfit', sans-serif; font-weight: 900;">{{ $totalProduk }}</h2>
                </div>
                <div class="stat-icon-wrapper bg-primary bg-opacity-10 text-primary-blue">
                    <i class="fa-solid fa-cubes"></i>
                </div>
            </div>
            <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                <span class="text-muted" style="font-size: 0.8rem;">Daftar portofolio layanan</span>
                <a href="{{ route('admin.produk.index') }}" class="small text-primary-blue fw-bold text-decoration-none d-inline-flex align-items-center gap-1">
                    Kelola <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Card 2: Total Artikel -->
    <div class="col-md-4">
        <div class="admin-card admin-card-stat h-100 d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 0.75rem;">Artikel &amp; Insight</span>
                    <h2 class="fw-black text-dark-navy mb-0 mt-2" style="font-family: 'Outfit', sans-serif; font-weight: 900;">{{ $totalArtikel }}</h2>
                </div>
                <div class="stat-icon-wrapper bg-dark bg-opacity-10 text-dark-navy">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
            </div>
            <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                <span class="text-muted" style="font-size: 0.8rem;">Publikasi konten edukasi</span>
                <a href="{{ route('admin.artikel.index') }}" class="small text-dark-navy fw-bold text-decoration-none d-inline-flex align-items-center gap-1">
                    Kelola <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Card 3: Total Galeri -->
    <div class="col-md-4">
        <div class="admin-card admin-card-stat h-100 d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 0.75rem;">Karya &amp; Dokumentasi</span>
                    <h2 class="fw-black text-success mb-0 mt-2" style="font-family: 'Outfit', sans-serif; font-weight: 900;">{{ $totalGaleri }}</h2>
                </div>
                <div class="stat-icon-wrapper bg-success bg-opacity-10 text-success">
                    <i class="fa-solid fa-images"></i>
                </div>
            </div>
            <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                <span class="text-muted" style="font-size: 0.8rem;">Dokumentasi kegiatan</span>
                <a href="{{ route('admin.galeri.index') }}" class="small text-success fw-bold text-decoration-none d-inline-flex align-items-center gap-1">
                    Kelola <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Quick Actions Bar & Recent Items --}}
<div class="row g-4">
    <!-- Recent Products Table -->
    <div class="col-lg-8">
        <div class="admin-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                <div>
                    <h6 class="fw-bold text-dark-navy mb-0 text-uppercase" style="letter-spacing: 0.5px;">Layanan Terbaru</h6>
                    <small class="text-muted">Daftar paket layanan yang aktif di halaman website</small>
                </div>
                <a href="{{ route('admin.produk.create') }}" class="btn btn-primary-blue btn-sm px-3 fw-semibold rounded-3">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Layanan
                </a>
            </div>

            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Layanan</th>
                            <th>Deskripsi Singkat</th>
                            <th width="100" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentProduks as $p)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ $p->gambar_url }}" width="42" height="42" class="rounded-3 border" style="object-fit: cover;" alt="{{ $p->nama_produk }}">
                                        <span class="fw-semibold text-dark-navy">{{ $p->nama_produk }}</span>
                                    </div>
                                </td>
                                <td><span class="small text-muted">{{ Str::limit($p->deskripsi, 60) }}</span></td>
                                <td class="text-center">
                                    <a href="{{ route('admin.produk.edit', $p->id_produk) }}" class="btn-action-edit" title="Ubah Layanan">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted small py-4">Belum ada data layanan yang ditambahkan.</td>
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
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <h6 class="fw-bold text-dark-navy mb-0 text-uppercase" style="letter-spacing: 0.5px;">Profil Perusahaan</h6>
                    <span class="badge bg-light text-primary-blue border border-primary-subtle rounded-pill px-2.5 py-1 small">Aktif</span>
                </div>
                
                <div class="p-3 bg-light rounded-3 mb-4 border">
                    <div class="d-flex align-items-center gap-2.5 mb-3">
                        <div class="bg-white p-1 rounded-2 border d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;">
                            <img src="{{ $profil->logo_url ?? asset('img/ptsolusikoneksiremovebg.png') }}" alt="Logo" style="max-height: 32px; max-width: 32px; object-fit: contain;">
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark-navy mb-0" style="font-size: 0.95rem;">{{ $profil->nama_perusahaan ?? 'PT Solusi Koneksi' }}</h6>
                            <small class="text-muted" style="font-size: 0.75rem;">Identitas Resmi</small>
                        </div>
                    </div>
                    
                    <div class="small text-muted mb-2 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-envelope text-primary-blue" style="width: 16px;"></i>
                        <span class="text-truncate">{{ $profil->email ?? 'contact@solusikoneksi.com' }}</span>
                    </div>
                    <div class="small text-muted d-flex align-items-center gap-2">
                        <i class="fa-solid fa-phone text-primary-blue" style="width: 16px;"></i>
                        <span>{{ $profil->telepon ?? '+62 812-3456-7890' }}</span>
                    </div>
                </div>
            </div>

            <a href="{{ route('profil.edit') }}" class="btn btn-outline-navy w-100 fw-semibold py-2 rounded-3 text-center">
                <i class="fa-solid fa-sliders me-1.5"></i> Edit Profil Perusahaan
            </a>
        </div>
    </div>
</div>
@endsection
