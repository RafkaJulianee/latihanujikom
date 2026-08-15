@extends('admin.layouts.app')

@section('title', 'Ubah Karya Galeri - Panel Admin')
@section('page_heading', 'Ubah Karya Galeri')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card p-4 p-md-5">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4 pb-3 border-bottom">
                <div>
                    <h5 class="fw-bold text-dark-navy mb-0 text-uppercase" style="letter-spacing: 0.5px;">Edit Karya Portofolio</h5>
                    <small class="text-muted">Perbarui keterangan dan file gambar portofolio</small>
                </div>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-navy btn-sm rounded-3 fw-semibold px-3">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.galeri.update', $galeri->id_galeri) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="admin-form-label">Judul Karya / Proyek <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" class="form-control admin-form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $galeri->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="admin-form-label">Keterangan / Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="keterangan" id="keterangan" rows="4" class="form-control admin-form-control @error('keterangan') is-invalid @enderror" required>{{ old('keterangan', $galeri->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="admin-form-label">Ganti Foto / Gambar (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control admin-form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <div class="mt-2 d-flex align-items-center gap-3 p-2.5 bg-light rounded-3 border">
                        <img src="{{ $galeri->gambar_url }}" alt="Preview" width="50" height="50" class="rounded-3 border" style="object-fit: cover;">
                        <small class="text-muted" style="font-size: 0.78rem;">Gambar karya saat ini. Unggah file baru jika ingin mengganti.</small>
                    </div>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 pt-3 border-top">
                    <button type="submit" class="btn btn-primary-blue px-4 py-2 fw-semibold rounded-3 shadow-sm">
                        <i class="fa-solid fa-save me-1.5"></i> Perbarui Karya
                    </button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light rounded-3 px-4 py-2 fw-semibold text-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
