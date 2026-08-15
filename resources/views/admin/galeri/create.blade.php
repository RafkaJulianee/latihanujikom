@extends('admin.layouts.app')

@section('title', 'Tambah Karya Galeri - Panel Admin')
@section('page_heading', 'Tambah Karya Galeri')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card p-4 p-md-5">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4 pb-3 border-bottom">
                <div>
                    <h5 class="fw-bold text-dark-navy mb-0 text-uppercase" style="letter-spacing: 0.5px;">Tambah Karya Portofolio</h5>
                    <small class="text-muted">Tambahkan dokumentasi hasil karya atau kegiatan pengembangan proyek</small>
                </div>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-navy btn-sm rounded-3 fw-semibold px-3">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="admin-form-label">Judul Karya / Proyek <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" class="form-control admin-form-control @error('judul') is-invalid @enderror" placeholder="Contoh: Desain Antarmuka Aplikasi Mobile Banking" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="admin-form-label">Keterangan / Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="keterangan" id="keterangan" rows="4" class="form-control admin-form-control @error('keterangan') is-invalid @enderror" placeholder="Penjelasan singkat mengenai karya atau dokumentasi ini..." required>{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="admin-form-label">Unggah Foto / Gambar (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control admin-form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted mt-1 d-block" style="font-size: 0.78rem;">Format: JPG, PNG, WEBP (Maks. 4MB)</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 pt-3 border-top">
                    <button type="submit" class="btn btn-primary-blue px-4 py-2 fw-semibold rounded-3 shadow-sm">
                        <i class="fa-solid fa-save me-1.5"></i> Simpan Karya
                    </button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light rounded-3 px-4 py-2 fw-semibold text-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
