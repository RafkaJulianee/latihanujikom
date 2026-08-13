@extends('admin.layouts.app')

@section('title', 'Tambah Karya Galeri - Panel Admin')
@section('page_heading', 'Tambah Karya Galeri')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="fw-bold text-dark-navy mb-1 text-uppercase" style="letter-spacing: 0.5px;">Form Tambah Karya</h5>
                    <small class="text-muted">Tambahkan portofolio atau proyek desain dan pengembangan baru</small>
                </div>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-navy btn-sm rounded-pill fw-bold px-3">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="admin-form-label">Judul Karya / Proyek</label>
                    <input type="text" name="judul" id="judul" class="form-control admin-form-control @error('judul') is-invalid @enderror" placeholder="Contoh: Desain Antarmuka Aplikasi Keuangan" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="admin-form-label">Keterangan Karya</label>
                    <textarea name="keterangan" id="keterangan" rows="4" class="form-control admin-form-control @error('keterangan') is-invalid @enderror" placeholder="Penjelasan singkat mengenai proyek ini..." required>{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="admin-form-label">Unggah Gambar Portofolio (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control admin-form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted mt-1 d-block">Format: JPG, PNG, WEBP, GIF (Maks. 4MB)</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 pt-2 border-top">
                    <button type="submit" class="btn btn-primary-blue px-4">
                        <i class="fa-solid fa-save me-1"></i> Simpan Portofolio
                    </button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light rounded-pill px-4 fw-semibold">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
