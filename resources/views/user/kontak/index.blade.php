@extends('user.layouts.app')

@section('title', 'Hubungi Kami - ZICODE')

@section('content')
{{-- Header Banner --}}
<section class="bg-dark-navy text-white py-5">
    <div class="container py-3 text-center">
        <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-3 small font-weight-bold">KONTAK KAMI</span>
        <h1 class="display-5 fw-bold mb-3">Hubungi Tim ZICODE</h1>
        <p class="text-white-50 max-w-600 mx-auto fs-6">
            Siap memulai proyek baru atau ingin berkonsultasi seputar solusi digital bisnis Anda? Hubungi tim ahli ZICODE.
        </p>
    </div>
</section>

{{-- Content --}}
<section class="py-5 bg-soft-card">
    <div class="container py-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4 shadow-sm" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-5">
            {{-- Contact Info Column --}}
            <div class="col-lg-5">
                <div class="p-4 p-md-5 rounded-4 bg-dark-navy text-white h-100 shadow-sm">
                    <h4 class="fw-bold mb-4">Informasi Kontak</h4>
                    
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="p-3 bg-primary-blue rounded-3 text-white fs-5">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-white">Alamat Kantor</h6>
                            <p class="text-white-50 small mb-0">{{ $profil->alamat ?? 'Jl. Professional Suite No. 88, Jakarta' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="p-3 bg-primary-blue rounded-3 text-white fs-5">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-white">Email Resmi</h6>
                            <p class="text-white-50 small mb-0">{{ $profil->email ?? 'contact@zicode.com' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="p-3 bg-primary-blue rounded-3 text-white fs-5">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-white">Telepon / WhatsApp</h6>
                            <p class="text-white-50 small mb-0">{{ $profil->telepon ?? '+62 812-3456-7890' }}</p>
                        </div>
                    </div>

                    <hr class="border-secondary opacity-25 my-4">

                    <h6 class="fw-bold text-white mb-2">Jam Operasional</h6>
                    <p class="text-white-50 small mb-0">Senin - Jumat: 09:00 - 18:00 WIB<br>Sabtu - Minggu: Tutup</p>
                </div>
            </div>

            {{-- Message Form Column --}}
            <div class="col-lg-7">
                <div class="p-4 p-md-5 rounded-4 bg-white shadow-sm border">
                    <h4 class="fw-bold text-dark-navy mb-4">Kirim Pesan Proyek</h4>
                    <form action="{{ route('user.kontak.send') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold small text-dark-navy">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control rounded-3" placeholder="Masukkan nama Anda" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold small text-dark-navy">Alamat Email</label>
                            <input type="email" name="email" id="email" class="form-control rounded-3" placeholder="email@contoh.com" required>
                        </div>

                        <div class="mb-4">
                            <label for="pesan" class="form-label fw-bold small text-dark-navy">Pesan / Detail Konsultasi</label>
                            <textarea name="pesan" id="pesan" rows="5" class="form-control rounded-3" placeholder="Ceritakan kebutuhan proyek atau pertanyaan Anda..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary-blue w-100 py-3">
                            Kirim Pesan Sekarang <i class="fa-solid fa-paper-plane ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
