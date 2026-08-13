@extends('admin.layouts.app')

@section('title', 'Tulis Artikel Baru - Panel Admin')
@section('page_heading', 'Tulis Artikel Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="admin-card p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="fw-bold text-dark-navy mb-1 text-uppercase" style="letter-spacing: 0.5px;">Form Tulis Artikel</h5>
                    <small class="text-muted">Tulis publikasi blog atau berita seputar teknologi dan portofolio</small>
                </div>
                <a href="{{ route('admin.artikel.index') }}" class="btn btn-outline-navy btn-sm rounded-pill fw-bold px-3">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label for="judul" class="admin-form-label">Judul Artikel</label>
                        <input type="text" name="judul" id="judul" class="form-control admin-form-control @error('judul') is-invalid @enderror" placeholder="Contoh: Tren Pengembangan Website Modern Tahun 2026" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal" class="admin-form-label">Tanggal Publikasi</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control admin-form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="isi" class="admin-form-label">Isi Artikel / Konten</label>
                    <textarea name="isi" id="isi" rows="8" class="form-control admin-form-control @error('isi') is-invalid @enderror" placeholder="Tulis artikel lengkap di sini..." required>{{ old('isi') }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="admin-form-label">Gambar Sampul Artikel (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control admin-form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted mt-1 d-block">Format: JPG, PNG, WEBP, GIF (Maks. 4MB)</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 pt-2 border-top">
                    <button type="submit" class="btn btn-primary-blue px-4">
                        <i class="fa-solid fa-paper-plane me-1"></i> Publikasikan Artikel
                    </button>
                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-light rounded-pill px-4 fw-semibold">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
