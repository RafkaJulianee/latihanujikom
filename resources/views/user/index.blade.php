@extends('user.layouts.app')

@section('title', 'PT Solusi Koneksi')

@section('content')
<div class="container py-4">

    {{-- ========================================================================
         SECTION 1: HERO SECTION (#home) - Sesuai Layout Foto
         ======================================================================== --}}
    <section id="home" class="hero-section mb-5">
        <div class="row align-items-center g-4">
            <!-- Left Headline & CTA -->
            <div class="col-lg-5">
                <h1 class="hero-main-title mb-4">
                    Jasa Pembuatan<br>Website &amp; Aplikasi<br>Mobile Profesional
                </h1>
                
                <p class="hero-subparagraph mb-4">
                    {{ $profil->tentang ?? 'PT Solusi Koneksi adalah agensi teknologi digital yang berfokus pada pengembangan website, aplikasi mobile, desain UI/UX, dan sistem informasi bisnis untuk membantu perusahaan bertransformasi secara digital.' }}
                </p>

                <div class="d-flex flex-wrap align-items-center gap-3">
                    <a href="https://wa.me/6285871444639?text=Halo%20PT%20Solusi%20Koneksi,%20saya%20ingin%20konsultasi%20mengenai%20pembuatan%20website%20dan%20aplikasi." target="_blank" class="btn btn-primary-blue px-4 py-2">
                        Konsultasi Gratis <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <a href="#produk" class="btn btn-outline-navy px-4 py-2">
                        Lihat Layanan
                    </a>
                </div>
            </div>

            <!-- Right Hero Image (perusahaann.png) -->
            <div class="col-lg-7 text-center text-lg-end position-relative pe-0">
                <div class="hero-image-wrapper">
                    <img src="{{ asset('img/perusahaann.png') }}" alt="Gedung Perusahaan PT Solusi Koneksi" class="hero-img-building">
                </div>
            </div>
        </div>
    </section>


    {{-- ========================================================================
         SECTION 2: PROFIL PERUSAHAAN (#profil / About)
         ======================================================================== --}}
    <section id="profil" class="py-3 mb-5">
        <div class="row g-4 align-items-stretch mb-4">
            <!-- Visual Showcase Grid -->
            <div class="col-lg-6">
                <div class="row g-3 h-100">
                    <div class="col-6">
                        <div class="showcase-photo-card">
                            <img src="{{ asset('img/ptsolusikoneksi.jpg') }}" alt="Kantor PT Solusi Koneksi">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="showcase-photo-card">
                            <img src="{{ asset('img/team.jpg') }}" alt="Tim Pengembang PT Solusi Koneksi">
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Text & Interactive Counters -->
            <div class="col-lg-6 d-flex flex-column justify-content-center ps-lg-4">
                <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-2 align-self-start font-weight-bold">TENTANG KAMI</span>
                <h2 class="display-6 fw-bold text-dark-navy mb-3">
                    Partner Digital untuk Website &amp; Aplikasi Bisnis
                </h2>
                <p class="text-muted mb-4 fs-6">
                    {{ $profil->tentang ?? 'PT Solusi Koneksi adalah agensi teknologi digital yang berfokus pada pengembangan website, aplikasi mobile, desain UI/UX, dan sistem informasi bisnis untuk membantu perusahaan bertransformasi secara digital.' }}
                </p>

                @php
                    $stat1_val = $profil->stat1_angka ?? '150+';
                    $stat1_lbl = $profil->stat1_label ?? 'Proyek Selesai';
                    preg_match('/^(\d+)(.*)$/', $stat1_val, $m1);
                    $num1 = $m1[1] ?? $stat1_val;
                    $suf1 = $m1[2] ?? '';

                    $stat2_val = $profil->stat2_angka ?? '99%';
                    $stat2_lbl = $profil->stat2_label ?? 'Kepuasan Klien';
                    preg_match('/^(\d+)(.*)$/', $stat2_val, $m2);
                    $num2 = $m2[1] ?? $stat2_val;
                    $suf2 = $m2[2] ?? '';

                    $stat3_val = $profil->stat3_angka ?? '24/7';
                    $stat3_lbl = $profil->stat3_label ?? 'Dukungan Teknis';
                    preg_match('/^(\d+)(.*)$/', $stat3_val, $m3);
                    $num3 = $m3[1] ?? $stat3_val;
                    $suf3 = $m3[2] ?? '';
                @endphp

                <!-- Dynamic Animated Number Counters -->
                <div class="row g-3 text-center mb-2" id="statsCounterRow">
                    <div class="col-4">
                        <div class="p-3 bg-soft-card rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <h3 class="fw-bold text-primary-blue mb-0">
                                <span class="counter-value" data-target="{{ is_numeric($num1) ? $num1 : 0 }}" data-suffix="{{ $suf1 }}">{{ $stat1_val }}</span>
                            </h3>
                            <small class="text-muted">{{ $stat1_lbl }}</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 bg-soft-card rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <h3 class="fw-bold text-primary-blue mb-0">
                                <span class="counter-value" data-target="{{ is_numeric($num2) ? $num2 : 0 }}" data-suffix="{{ $suf2 }}">{{ $stat2_val }}</span>
                            </h3>
                            <small class="text-muted">{{ $stat2_lbl }}</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 bg-soft-card rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <h3 class="fw-bold text-primary-blue mb-0">
                                <span class="counter-value" data-target="{{ is_numeric($num3) ? $num3 : 0 }}" data-suffix="{{ $suf3 }}">{{ $stat3_val }}</span>
                            </h3>
                            <small class="text-muted">{{ $stat3_lbl }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi Cards Row -->
        <div class="row g-4 mt-2">
            <!-- Visi Card -->
            <div class="col-md-6">
                <div class="card border-0 rounded-4 p-4 h-100 bg-soft-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="feature-icon-box bg-white shadow-sm">
                            <i class="fa-solid fa-compass text-primary-blue"></i>
                        </div>
                        <div>
                            <span class="badge bg-light text-primary-blue border border-primary-subtle rounded-pill px-3 py-1 small font-weight-bold">VISI UTAMA</span>
                            <h4 class="fw-bold text-dark-navy mb-0 fs-5 mt-1">Visi Perusahaan</h4>
                        </div>
                    </div>
                    <p class="text-muted mb-0 leading-relaxed">
                        {{ $profil->visi ?? 'Menjadi partner teknologi terpercaya yang menghasilkan solusi web dan aplikasi berstandar profesional, teruji, dan berdampak nyata bagi pertumbuhan bisnis klien.' }}
                    </p>
                </div>
            </div>

            <!-- Misi Card -->
            <div class="col-md-6">
                <div class="card border-0 rounded-4 p-4 h-100 bg-soft-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="feature-icon-box bg-white shadow-sm">
                            <i class="fa-solid fa-bullseye text-primary-blue"></i>
                        </div>
                        <div>
                            <span class="badge bg-light text-primary-blue border border-primary-subtle rounded-pill px-3 py-1 small font-weight-bold">MISI STRATEGIS</span>
                            <h4 class="fw-bold text-dark-navy mb-0 fs-5 mt-1">Misi Perusahaan</h4>
                        </div>
                    </div>
                    <div class="text-muted mb-0 leading-relaxed small" style="line-height: 1.7;">
                        {!! nl2br(e($profil->misi ?? "1. Mengembangkan website dan aplikasi mobile dengan performa cepat, aman, dan mudah digunakan.\n2. Merancang desain antarmuka (UI/UX) modern yang berorientasi pada kepuasan pengguna.\n3. Menyediakan pendampingan teknis dan pemeliharaan sistem berkelanjutan.")) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ========================================================================
         SECTION 3: PRODUK & LAYANAN (#produk / Services)
         ======================================================================== --}}
    <section id="produk" class="py-3 mb-5">
        <div class="text-center max-w-700 mx-auto mb-4">
            <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-2 font-weight-bold">LAYANAN KAMI</span>
            <h2 class="display-6 fw-bold text-dark-navy">Layanan Kami</h2>
            <p class="text-muted">Solusi pengembangan digital menyeluruh untuk kebutuhan transformasi bisnis Anda.</p>
        </div>

        <!-- Dynamic Services Grid -->
        <div class="row g-4">
            @forelse($produks as $produk)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 rounded-4 shadow-sm overflow-hidden h-100 bg-white">
                        <div style="height: 220px; overflow: hidden; background: #0A1128;">
                            <img src="{{ $produk->gambar_url }}" alt="{{ $produk->nama_produk }}" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="fw-bold text-dark-navy mb-2">{{ $produk->nama_produk }}</h5>
                            <p class="small text-muted mb-0 leading-relaxed">{{ $produk->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4">
                    <p class="text-muted">Belum ada layanan yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </section>


    {{-- ========================================================================
         SECTION 4: ARTIKEL & INSIGHT (#artikel / Articles)
         ======================================================================== --}}
    <section id="artikel" class="py-3 mb-5">
        <div class="mb-4">
            <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-2 font-weight-bold">ARTIKEL &amp; INSIGHT</span>
            <h2 class="display-6 fw-bold text-dark-navy mb-0">Artikel &amp; Insight</h2>
            <p class="text-muted small mb-0 mt-1">Edukasi, tren teknologi, dan tips pengembangan produk digital untuk bisnis.</p>
        </div>

        <!-- Article Card Grid -->
        <div class="row g-4" id="articleGrid">
            @forelse($artikels as $artikel)
                <div class="col-md-4">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100 bg-white">
                        <div style="height: 200px; overflow: hidden; background: #0A1128;">
                            <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge bg-light text-primary-blue border border-primary-subtle rounded-pill px-3 py-1 small">Insight</span>
                                <small class="text-muted ms-auto fs-7"><i class="fa-regular fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d M Y') }}</small>
                            </div>
                            <h5 class="fw-bold text-dark-navy mb-2 fs-6" style="line-height: 1.4;">{{ Str::limit($artikel->judul, 55) }}</h5>
                            <p class="small text-muted mb-4 flex-grow-1" style="line-height: 1.6;">{{ Str::limit(strip_tags($artikel->isi), 95) }}</p>
                            <button type="button" class="btn btn-outline-navy btn-sm w-100 font-weight-bold" data-bs-toggle="modal" data-bs-target="#artikelModal{{ $artikel->id_artikel }}">
                                Baca Selengkapnya <i class="fa-solid fa-book-open ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Popup Detail Artikel (Simple & Compact) -->
                <div class="modal fade" id="artikelModal{{ $artikel->id_artikel }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content border-0 rounded-4 shadow">
                            <div class="modal-header border-0 pb-0 pt-3 px-4">
                                <div class="d-flex align-items-center gap-2 text-muted small">
                                    <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold px-2.5 py-1 rounded-pill">Insight</span>
                                    <small><i class="fa-regular fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d M Y') }}</small>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-4 pt-3 pb-3">
                                <h5 class="fw-bold text-dark-navy mb-3" style="line-height: 1.4;">{{ $artikel->judul }}</h5>
                                
                                <div class="rounded-3 overflow-hidden mb-3 border" style="height: 180px; background: #0F172A;">
                                     <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="w-100 h-100 object-fit-cover">
                                </div>

                                <div class="text-secondary leading-relaxed small" style="line-height: 1.7; text-align: justify; color: #475569;">
                                    {!! nl2br(e($artikel->isi)) !!}
                                </div>
                            </div>
                            <div class="modal-footer border-0 pt-0 pb-3 px-4">
                                <button type="button" class="btn btn-outline-navy btn-sm px-3 rounded-pill" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4">
                    <p class="text-muted">Belum ada artikel terbaru.</p>
                </div>
            @endforelse
        </div>
    </section>


    {{-- ========================================================================
         SECTION 5: KARYA & DOKUMENTASI (#galeri / Gallery)
         ======================================================================== --}}
    <section id="galeri" class="py-3 mb-5">
        <div class="text-center max-w-700 mx-auto mb-4">
            <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-2 font-weight-bold">DOKUMENTASI KARYA</span>
            <h2 class="display-6 fw-bold text-dark-navy">Karya &amp; Dokumentasi</h2>
            <p class="text-muted">Dokumentasi portofolio dan aktivitas pengembangan proyek digital bersama klien kami.</p>
        </div>

        <!-- Dynamic Portfolio Gallery Grid -->
        @if(count($galeris) > 0)
            <div class="row g-4">
                @foreach($galeris as $galeri)
                    <div class="col-md-4">
                        <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100">
                            <div style="height: 220px; overflow: hidden; background: #0F172A;">
                                <img src="{{ $galeri->gambar_url }}" alt="{{ $galeri->judul }}" class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="card-body p-3">
                                <h6 class="fw-bold text-dark-navy mb-1">{{ $galeri->judul }}</h6>
                                <p class="small text-muted mb-0">{{ Str::limit($galeri->keterangan, 70) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>


    {{-- ========================================================================
         SECTION 6: KONTAK KAMI (#kontak)
         ======================================================================== --}}
    <section id="kontak" class="py-3 mb-4">
        <!-- Interactive Contact Form & Info Card -->
        <div class="p-4 p-md-5 rounded-4 bg-soft-card border">
            <div class="row g-4">
                <!-- Contact Information Column -->
                <div class="col-lg-5 pe-lg-4">
                    <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-2 font-weight-bold">HUBUNGI KAMI</span>
                    <h3 class="fw-bold text-dark-navy mb-3">Punya Ide atau Proyek? Mari Diskusikan.</h3>
                    <p class="text-muted small mb-4">Konsultasikan kebutuhan website, aplikasi, atau sistem digital bisnis Anda. Tim kami siap membantu memberikan solusi yang tepat.</p>

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="feature-icon-box bg-white text-primary-blue">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark-navy mb-0">Lokasi Kantor</h6>
                            <small class="text-muted">{{ $profil->alamat ?? 'Jl. Professional Suite No. 88, Jakarta' }}</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="feature-icon-box bg-white text-primary-blue">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark-navy mb-0">Email Resmi</h6>
                            <small class="text-muted">{{ $profil->email ?? 'contact@solusikoneksi.com' }}</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <div class="feature-icon-box bg-white text-primary-blue">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark-navy mb-0">Telepon / WhatsApp</h6>
                            <small class="text-muted">{{ $profil->telepon ?? '+62 812-3456-7890' }}</small>
                        </div>
                    </div>
                </div>

                <!-- Interactive Message Form -->
                <div class="col-lg-7">
                    <form action="{{ route('user.kontak.send') }}" method="POST" class="p-4 bg-white rounded-4 shadow-sm">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark-navy">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control rounded-3" placeholder="Nama Anda" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark-navy">Alamat Email</label>
                                <input type="email" name="email" class="form-control rounded-3" placeholder="email@contoh.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-dark-navy">Subjek Diskusi</label>
                                <input type="text" name="subjek" class="form-control rounded-3" placeholder="Misal: Pembuatan Website Perusahaan" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-dark-navy">Pesan / Rencana Proyek</label>
                                <textarea name="pesan" rows="4" class="form-control rounded-3" placeholder="Ceritakan kebutuhan atau pertanyaan Anda..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-blue w-100 py-2">
                                    Konsultasi Gratis <i class="fa-solid fa-paper-plane ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
