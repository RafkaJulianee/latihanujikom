@extends('admin.layouts.app')

@section('title', 'Ubah Layanan - Panel Admin')
@section('page_heading', 'Ubah Layanan')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="fw-bold text-dark-navy mb-1 text-uppercase" style="letter-spacing: 0.5px;">Form Ubah Layanan</h5>
                    <small class="text-muted">Perbarui rincian produk dan paket layanan</small>
                </div>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-navy btn-sm rounded-pill fw-bold px-3">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_produk" class="admin-form-label">Nama Produk / Layanan</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control admin-form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                    @error('nama_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="admin-form-label">Deskripsi Layanan</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control admin-form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="admin-form-label">Ganti Gambar Thumbnail (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control admin-form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <div class="mt-2 d-flex align-items-center gap-3 p-2 bg-light rounded-3 border">
                        <img src="{{ $produk->gambar_url }}" alt="Preview" width="56" height="56" class="rounded-3 border" style="object-fit: cover;">
                        <small class="text-muted">Gambar saat ini. Unggah file baru jika ingin mengganti.</small>
                    </div>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 pt-2 border-top">
                    <button type="submit" class="btn btn-primary-blue px-4">
                        <i class="fa-solid fa-save me-1"></i> Perbarui Layanan
                    </button>
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-light rounded-pill px-4 fw-semibold">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
