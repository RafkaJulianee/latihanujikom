@extends('admin.layouts.app')

@section('title', 'Profil Perusahaan - Panel Admin')
@section('page_heading', 'Pengaturan Profil Perusahaan')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="admin-card p-4 p-md-5">
            <div class="mb-4 pb-3 border-bottom">
                <h5 class="fw-bold text-dark-navy mb-1 text-uppercase" style="letter-spacing: 0.5px;">Form Profil Perusahaan</h5>
                <small class="text-muted">Kelola identitas merek, kontak resmi, serta visi dan misi perusahaan</small>
            </div>

            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="nama_perusahaan" class="admin-form-label">Nama Perusahaan / Agensi</label>
                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control admin-form-control @error('nama_perusahaan') is-invalid @enderror" value="{{ old('nama_perusahaan', $profil->nama_perusahaan ?? '') }}" required>
                        @error('nama_perusahaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="admin-form-label">Email Resmi Perusahaan</label>
                        <input type="email" name="email" id="email" class="form-control admin-form-control @error('email') is-invalid @enderror" value="{{ old('email', $profil->email ?? '') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="telepon" class="admin-form-label">Nomor Telepon / WhatsApp</label>
                        <input type="text" name="telepon" id="telepon" class="form-control admin-form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon', $profil->telepon ?? '') }}" required>
                        @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="logo" class="admin-form-label">Ganti Logo Perusahaan (Opsional)</label>
                        <input type="file" name="logo" id="logo" class="form-control admin-form-control @error('logo') is-invalid @enderror" accept="image/*">
                        <div class="mt-2 d-flex align-items-center gap-3 p-2 bg-light rounded-3 border">
                            <img src="{{ $profil->logo_url }}" alt="Logo Preview" height="40" class="rounded-2 border p-1 bg-white" style="object-fit: contain;">
                            <small class="text-muted">Logo saat ini. Unggah file baru jika ingin mengganti.</small>
                        </div>
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tentang" class="admin-form-label">Deskripsi / Tentang Perusahaan</label>
                    <textarea name="tentang" id="tentang" rows="4" class="form-control admin-form-control @error('tentang') is-invalid @enderror" required>{{ old('tentang', $profil->tentang ?? '') }}</textarea>
                    @error('tentang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="visi" class="admin-form-label">Visi Perusahaan</label>
                        <textarea name="visi" id="visi" rows="4" class="form-control admin-form-control @error('visi') is-invalid @enderror" required>{{ old('visi', $profil->visi ?? '') }}</textarea>
                        @error('visi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="misi" class="admin-form-label">Misi Perusahaan</label>
                        <textarea name="misi" id="misi" rows="4" class="form-control admin-form-control @error('misi') is-invalid @enderror" required>{{ old('misi', $profil->misi ?? '') }}</textarea>
                        @error('misi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="alamat" class="admin-form-label">Alamat Lengkap Perusahaan</label>
                    <textarea name="alamat" id="alamat" rows="2" class="form-control admin-form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="pt-2 border-top">
                    <button type="submit" class="btn btn-primary-blue px-4">
                        <i class="fa-solid fa-save me-1"></i> Simpan Perubahan Profil
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
