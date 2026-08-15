@extends('admin.layouts.app')

@section('title', 'Tambah Layanan Baru - Panel Admin')
@section('page_heading', 'Tambah Layanan Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card p-4 p-md-5">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4 pb-3 border-bottom">
                <div>
                    <h5 class="fw-bold text-dark-navy mb-0 text-uppercase" style="letter-spacing: 0.5px;">Tambah Layanan Baru</h5>
                    <small class="text-muted">Tambahkan penawaran layanan digital atau solusi pengembangan baru</small>
                </div>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-navy btn-sm rounded-3 fw-semibold px-3">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_produk" class="admin-form-label">Nama Produk / Layanan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control admin-form-control @error('nama_produk') is-invalid @enderror" placeholder="Contoh: Pengembangan Website Kustom" value="{{ old('nama_produk') }}" required>
                    @error('nama_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="admin-form-label">Deskripsi Layanan <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control admin-form-control @error('deskripsi') is-invalid @enderror" placeholder="Jelaskan detail mengenai fitur dan nilai layanan ini..." required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="admin-form-label">Gambar Thumbnail (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control admin-form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted mt-1 d-block" style="font-size: 0.78rem;">Format: JPG, PNG, WEBP (Maks. 4MB). Jika dikosongkan, gambar default akan digunakan.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 pt-3 border-top">
                    <button type="submit" class="btn btn-primary-blue px-4 py-2 fw-semibold rounded-3 shadow-sm">
                        <i class="fa-solid fa-save me-1.5"></i> Simpan Layanan
                    </button>
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-light rounded-3 px-4 py-2 fw-semibold text-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
