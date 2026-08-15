@extends('admin.layouts.app')

@section('title', 'Ubah Layanan - Panel Admin')
@section('page_heading', 'Ubah Layanan')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card p-4 p-md-5">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4 pb-3 border-bottom">
                <div>
                    <h5 class="fw-bold text-dark-navy mb-0 text-uppercase" style="letter-spacing: 0.5px;">Edit Layanan</h5>
                    <small class="text-muted">Perbarui rincian produk dan paket layanan</small>
                </div>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-navy btn-sm rounded-3 fw-semibold px-3">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_produk" class="admin-form-label">Nama Produk / Layanan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control admin-form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                    @error('nama_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="admin-form-label">Deskripsi Layanan <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control admin-form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="admin-form-label">Ganti Gambar Thumbnail (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control admin-form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <div class="mt-2 d-flex align-items-center gap-3 p-2.5 bg-light rounded-3 border">
                        <img src="{{ $produk->gambar_url }}" alt="Preview" width="50" height="50" class="rounded-3 border" style="object-fit: cover;">
                        <small class="text-muted" style="font-size: 0.78rem;">Gambar saat ini. Unggah file baru jika ingin mengganti.</small>
                    </div>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 pt-3 border-top">
                    <button type="submit" class="btn btn-primary-blue px-4 py-2 fw-semibold rounded-3 shadow-sm">
                        <i class="fa-solid fa-save me-1.5"></i> Perbarui Layanan
                    </button>
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-light rounded-3 px-4 py-2 fw-semibold text-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
