@extends('admin.layouts.app')

@section('title', 'Ubah Karya Galeri - Panel Admin')
@section('page_heading', 'Ubah Karya Galeri')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="fw-bold text-dark-navy mb-1 text-uppercase" style="letter-spacing: 0.5px;">Form Ubah Karya</h5>
                    <small class="text-muted">Perbarui keterangan dan file gambar portofolio</small>
                </div>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-navy btn-sm rounded-pill fw-bold px-3">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.galeri.update', $galeri->id_galeri) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="admin-form-label">Judul Karya / Proyek</label>
                    <input type="text" name="judul" id="judul" class="form-control admin-form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $galeri->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="admin-form-label">Keterangan Karya</label>
                    <textarea name="keterangan" id="keterangan" rows="4" class="form-control admin-form-control @error('keterangan') is-invalid @enderror" required>{{ old('keterangan', $galeri->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="admin-form-label">Ganti Gambar Portofolio (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control admin-form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <div class="mt-2 d-flex align-items-center gap-3 p-2 bg-light rounded-3 border">
                        <img src="{{ $galeri->gambar_url }}" alt="Preview" width="56" height="56" class="rounded-3 border" style="object-fit: cover;">
                        <small class="text-muted">Gambar karya saat ini. Unggah file baru jika ingin mengganti.</small>
                    </div>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 pt-2 border-top">
                    <button type="submit" class="btn btn-primary-blue px-4">
                        <i class="fa-solid fa-save me-1"></i> Perbarui Karya
                    </button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light rounded-pill px-4 fw-semibold">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
