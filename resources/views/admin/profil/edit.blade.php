@extends('admin.layouts.app')

@section('title', 'Profil Perusahaan - Panel Admin')
@section('page_heading', 'Pengaturan Profil Perusahaan')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="admin-card p-4 p-md-5">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4 pb-3 border-bottom">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <h5 class="fw-bold text-dark-navy mb-0 text-uppercase" style="letter-spacing: 0.5px;">Profil Perusahaan</h5>
                        <span class="badge bg-light text-primary-blue border border-primary-subtle rounded-pill px-2.5 py-1 small">Statis / Pengaturan</span>
                    </div>
                    <small class="text-muted">Kelola identitas merek, kontak resmi, alamat, serta visi dan misi perusahaan</small>
                </div>
            </div>

            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                {{-- Bagian 1: Identitas & Kontak --}}
                <div class="mb-4">
                    <h6 class="fw-bold text-dark-navy mb-3 d-flex align-items-center gap-2" style="font-size: 0.95rem;">
                        <span class="bg-primary-blue text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px; font-size: 0.75rem;">1</span>
                        Identitas &amp; Kontak Resmi
                    </h6>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="nama_perusahaan" class="admin-form-label">Nama Perusahaan / Agensi <span class="text-danger">*</span></label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control admin-form-control @error('nama_perusahaan') is-invalid @enderror" value="{{ old('nama_perusahaan', $profil->nama_perusahaan ?? '') }}" required>
                            @error('nama_perusahaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="admin-form-label">Email Resmi Perusahaan <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control admin-form-control @error('email') is-invalid @enderror" value="{{ old('email', $profil->email ?? '') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="telepon" class="admin-form-label">Nomor Telepon / WhatsApp <span class="text-danger">*</span></label>
                            <input type="text" name="telepon" id="telepon" class="form-control admin-form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon', $profil->telepon ?? '') }}" required>
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="logo" class="admin-form-label">Logo Perusahaan (Opsional)</label>
                            <input type="file" name="logo" id="logo" class="form-control admin-form-control @error('logo') is-invalid @enderror" accept="image/*">
                            <div class="mt-2 d-flex align-items-center gap-3 p-2 bg-light rounded-3 border">
                                <img src="{{ $profil->logo_url }}" alt="Logo Preview" height="36" class="rounded-2 border p-1 bg-white" style="object-fit: contain;">
                                <small class="text-muted" style="font-size: 0.78rem;">Logo saat ini. Unggah file baru untuk mengganti.</small>
                            </div>
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr class="my-4 border-secondary border-opacity-25">

                {{-- Bagian 2: Deskripsi & Nilai Strategis --}}
                <div class="mb-4">
                    <h6 class="fw-bold text-dark-navy mb-3 d-flex align-items-center gap-2" style="font-size: 0.95rem;">
                        <span class="bg-primary-blue text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px; font-size: 0.75rem;">2</span>
                        Tentang Perusahaan, Visi &amp; Misi
                    </h6>

                    <div class="mb-3">
                        <label for="tentang" class="admin-form-label">Deskripsi / Tentang Perusahaan <span class="text-danger">*</span></label>
                        <textarea name="tentang" id="tentang" rows="3" class="form-control admin-form-control @error('tentang') is-invalid @enderror" required>{{ old('tentang', $profil->tentang ?? '') }}</textarea>
                        @error('tentang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="visi" class="admin-form-label">Visi Perusahaan <span class="text-danger">*</span></label>
                            <textarea name="visi" id="visi" rows="4" class="form-control admin-form-control @error('visi') is-invalid @enderror" required>{{ old('visi', $profil->visi ?? '') }}</textarea>
                            @error('visi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="misi" class="admin-form-label">Misi Perusahaan <span class="text-danger">*</span></label>
                            <textarea name="misi" id="misi" rows="4" class="form-control admin-form-control @error('misi') is-invalid @enderror" required>{{ old('misi', $profil->misi ?? '') }}</textarea>
                            @error('misi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr class="my-4 border-secondary border-opacity-25">

                {{-- Bagian 3: Statistik Pencapaian (Counter) --}}
                <div class="mb-4">
                    <h6 class="fw-bold text-dark-navy mb-1 d-flex align-items-center gap-2" style="font-size: 0.95rem;">
                        <span class="bg-primary-blue text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px; font-size: 0.75rem;">3</span>
                        Statistik Pencapaian (Counter Halaman Depan)
                    </h6>
                    <p class="text-muted small mb-3">Sesuaikan 3 kartu statistik angka pencapaian perusahaan yang tampil di bawah deskripsi tentang kami.</p>

                    <div class="row g-3">
                        <!-- Stat 1 -->
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3 border h-100">
                                <span class="badge bg-primary-blue text-white mb-2">Kartu Statistik 1</span>
                                <div class="mb-2">
                                    <label for="stat1_angka" class="admin-form-label small">Angka / Nilai</label>
                                    <input type="text" name="stat1_angka" id="stat1_angka" class="form-control admin-form-control form-control-sm @error('stat1_angka') is-invalid @enderror" value="{{ old('stat1_angka', $profil->stat1_angka ?? '150+') }}" placeholder="Contoh: 150+">
                                    @error('stat1_angka')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="stat1_label" class="admin-form-label small">Label / Keterangan</label>
                                    <input type="text" name="stat1_label" id="stat1_label" class="form-control admin-form-control form-control-sm @error('stat1_label') is-invalid @enderror" value="{{ old('stat1_label', $profil->stat1_label ?? 'Proyek Selesai') }}" placeholder="Contoh: Proyek Selesai">
                                    @error('stat1_label')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Stat 2 -->
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3 border h-100">
                                <span class="badge bg-primary-blue text-white mb-2">Kartu Statistik 2</span>
                                <div class="mb-2">
                                    <label for="stat2_angka" class="admin-form-label small">Angka / Nilai</label>
                                    <input type="text" name="stat2_angka" id="stat2_angka" class="form-control admin-form-control form-control-sm @error('stat2_angka') is-invalid @enderror" value="{{ old('stat2_angka', $profil->stat2_angka ?? '99%') }}" placeholder="Contoh: 99%">
                                    @error('stat2_angka')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="stat2_label" class="admin-form-label small">Label / Keterangan</label>
                                    <input type="text" name="stat2_label" id="stat2_label" class="form-control admin-form-control form-control-sm @error('stat2_label') is-invalid @enderror" value="{{ old('stat2_label', $profil->stat2_label ?? 'Kepuasan Klien') }}" placeholder="Contoh: Kepuasan Klien">
                                    @error('stat2_label')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Stat 3 -->
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3 border h-100">
                                <span class="badge bg-primary-blue text-white mb-2">Kartu Statistik 3</span>
                                <div class="mb-2">
                                    <label for="stat3_angka" class="admin-form-label small">Angka / Nilai</label>
                                    <input type="text" name="stat3_angka" id="stat3_angka" class="form-control admin-form-control form-control-sm @error('stat3_angka') is-invalid @enderror" value="{{ old('stat3_angka', $profil->stat3_angka ?? '24/7') }}" placeholder="Contoh: 24/7">
                                    @error('stat3_angka')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="stat3_label" class="admin-form-label small">Label / Keterangan</label>
                                    <input type="text" name="stat3_label" id="stat3_label" class="form-control admin-form-control form-control-sm @error('stat3_label') is-invalid @enderror" value="{{ old('stat3_label', $profil->stat3_label ?? 'Dukungan Teknis') }}" placeholder="Contoh: Dukungan Teknis">
                                    @error('stat3_label')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4 border-secondary border-opacity-25">

                {{-- Bagian 4: Lokasi Kantor --}}
                <div class="mb-4">
                    <h6 class="fw-bold text-dark-navy mb-3 d-flex align-items-center gap-2" style="font-size: 0.95rem;">
                        <span class="bg-primary-blue text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px; font-size: 0.75rem;">4</span>
                        Lokasi Kantor / Alamat Resmi
                    </h6>

                    <div class="mb-2">
                        <label for="alamat" class="admin-form-label">Alamat Lengkap Perusahaan <span class="text-danger">*</span></label>
                        <textarea name="alamat" id="alamat" rows="2" class="form-control admin-form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="pt-3 border-top d-flex gap-2">
                    <button type="submit" class="btn btn-primary-blue px-4 py-2 fw-semibold rounded-3 shadow-sm">
                        <i class="fa-solid fa-save me-1.5"></i> Simpan Perubahan Profil
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
