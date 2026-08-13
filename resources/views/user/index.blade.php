@extends('user.layouts.app')

@section('title', 'ZICODE - Jasa Pembuatan Website & Aplikasi Mobile Profesional')

@section('content')
<div class="container py-4">

    {{-- ========================================================================
         SECTION 1: HERO SECTION (#home)
         ======================================================================== --}}
    <section id="home" class="hero-section mb-5">
        <div class="row align-items-center g-4 g-lg-5">
            <!-- Left Headline & CTA -->
            <div class="col-lg-7">
                <h1 class="hero-main-title mb-4">
                    Jasa Pembuatan Website &amp; Aplikasi Mobile Profesional
                </h1>
                
                <p class="hero-subparagraph mb-4">
                    {{ $profil->tentang ?? 'ZICODE menyediakan jasa pembuatan website kustom, aplikasi mobile Android & iOS, perancangan desain UI/UX modern, serta integrasi sistem software untuk mempercepat pertumbuhan bisnis Anda.' }}
                </p>

                <div class="d-flex flex-wrap align-items-center gap-3">
                    <a href="#kontak" class="btn btn-primary-blue px-4 py-2">
                        Konsultasi Gratis <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                    <a href="#produk" class="btn btn-outline-navy px-4 py-2">
                        Lihat Layanan
                    </a>
                </div>
            </div>

            <!-- Right Hero Image Illustration -->
            <div class="col-lg-5 text-center text-lg-end">
                <div class="hero-image-wrapper">
                    <img src="{{ asset('img/hero-office.jpg') }}" alt="Gedung Perusahaan ZICODE" class="hero-img-main">
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
                        <div class="showcase-gradient-card">
                            <div class="feature-icon-box bg-white shadow-sm mb-3">
                                <i class="fa-solid fa-shield-halved text-primary-blue"></i>
                            </div>
                            <h6 class="fw-bold text-dark-navy mb-1">Performa &amp; Keamanan</h6>
                            <small class="text-muted">Standar Industri Modern</small>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="showcase-photo-card">
                            <img src="{{ asset('img/team.jpg') }}" alt="Tim Pengembang ZICODE">
                            <div class="position-absolute top-0 end-0 p-3">
                                <div class="feature-dot-badge">
                                    <i class="fa-solid fa-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Text & Interactive Counters -->
            <div class="col-lg-6 d-flex flex-column justify-content-center ps-lg-4">
                <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-2 align-self-start font-weight-bold">PROFIL PERUSAHAAN</span>
                <h2 class="display-6 fw-bold text-dark-navy mb-3">
                    Agensi Pembuatan Website &amp; Aplikasi Mobile Terpercaya
                </h2>
                <p class="text-muted mb-4 fs-6">
                    {{ $profil->tentang ?? 'ZICODE adalah agensi teknologi digital profesional yang mengkhususkan diri dalam jasa pembuatan website, pengembangan aplikasi mobile (Android & iOS), perancangan UI/UX design antarmuka modern, serta solusi software enterprise untuk mempercepat transformasi digital bisnis Anda.' }}
                </p>

                <!-- Dynamic Animated Number Counters -->
                <div class="row g-3 text-center mb-2" id="statsCounterRow">
                    <div class="col-4">
                        <div class="p-3 bg-soft-card rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <h3 class="fw-bold text-primary-blue mb-0">
                                <span class="counter-value" data-target="150" data-suffix="+">0+</span>
                            </h3>
                            <small class="text-muted">Proyek Selesai</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 bg-soft-card rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <h3 class="fw-bold text-primary-blue mb-0">
                                <span class="counter-value" data-target="99" data-suffix="%">0%</span>
                            </h3>
                            <small class="text-muted">Kepuasan Klien</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 bg-soft-card rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <h3 class="fw-bold text-primary-blue mb-0">
                                <span class="counter-value" data-target="10" data-suffix="+">0+</span>
                            </h3>
                            <small class="text-muted">Tahun Pengalaman</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi Cards Row -->
        <div class="row g-4 pt-3">
            <!-- Visi Card -->
            <div class="col-md-6">
                <div class="p-4 p-lg-4 bg-white rounded-4 border shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="bg-light text-primary-blue border border-primary-subtle rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="fa-solid fa-compass fs-5"></i>
                        </div>
                        <div>
                            <span class="badge bg-light text-primary-blue border border-primary-subtle rounded-pill px-3 py-1 small font-weight-bold">TUJUAN UTAMA</span>
                            <h4 class="fw-bold text-dark-navy mb-0 fs-5 mt-1">Visi Perusahaan</h4>
                        </div>
                    </div>
                    <p class="text-secondary mb-0 fs-6 leading-relaxed" style="line-height: 1.7; color: #475569;">
                        {{ $profil->visi ?? 'Menjadi penyedia jasa pembuatan website, aplikasi mobile, dan solusi digital terdepan di Indonesia yang terpercaya dalam menghadirkan inovasi teknologi berkinerja tinggi, aman, dan berestetika modern.' }}
                    </p>
                </div>
            </div>

            <!-- Misi Card -->
            <div class="col-md-6">
                <div class="p-4 p-lg-4 bg-white rounded-4 border shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="bg-light text-dark-navy border rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="fa-solid fa-list-check fs-5"></i>
                        </div>
                        <div>
                            <span class="badge bg-light text-dark-navy border rounded-pill px-3 py-1 small font-weight-bold">LANGKAH STRATEGIS</span>
                            <h4 class="fw-bold text-dark-navy mb-0 fs-5 mt-1">Misi Perusahaan</h4>
                        </div>
                    </div>
                    <div class="text-secondary mb-0 fs-6 leading-relaxed" style="line-height: 1.7; color: #475569;">
                        {!! nl2br(e($profil->misi ?? "1. Menyediakan layanan jasa pembuatan website & aplikasi mobile berstandar profesional dengan performa cepat, responsif, dan aman.\n2. Merancang antarmuka UI/UX yang intuitif untuk meningkatkan pengalaman pengguna serta konversi bisnis.\n3. Memberikan pendampingan teknis, pemeliharaan sistem, dan solusi digital berkelanjutan bagi setiap mitra bisnis.")) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ========================================================================
         SECTION 3: PRODUK / LAYANAN (#produk / Services)
         ======================================================================== --}}
    <section id="produk" class="py-3 mb-5">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-2 font-weight-bold">PRODUK &amp; LAYANAN</span>
            <h2 class="display-6 fw-bold text-dark-navy">Layanan Solusi Profesional</h2>
            <p class="text-muted">Jelajahi berbagai penawaran produk dan layanan berkualitas tinggi yang dirancang untuk mengembangkan bisnis Anda.</p>
        </div>

        <!-- 4 Feature Cards Grid -->
        <div class="row g-3 mb-4">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="feature-icon-box">
                            <i class="fa-solid fa-inbox"></i>
                        </div>
                        <div class="feature-dot-badge">
                            <i class="fa-solid fa-circle"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2 text-dark-navy">
                        {{ $produks[0]->nama_produk ?? 'Pengembangan Produk' }}
                    </h5>
                    <p class="small text-muted mb-4 flex-grow-1">
                        {{ isset($produks[0]) ? Str::limit($produks[0]->deskripsi, 75) : 'Strategi pengembangan produk berdampak tinggi yang dirancang untuk skalabilitas dan kepuasan pengguna.' }}
                    </p>
                    <div>
                        @if(isset($produks[0]))
                            <button type="button" class="btn-card-action border-0" data-bs-toggle="modal" data-bs-target="#produkModal{{ $produks[0]->id_produk }}">
                                Jelajahi
                            </button>
                        @else
                            <a href="#kontak" class="btn-card-action">Jelajahi</a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="feature-icon-box">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                        <div class="feature-dot-badge">
                            <i class="fa-solid fa-circle"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2 text-dark-navy">
                        {{ $produks[1]->nama_produk ?? 'Strategi Terbaik' }}
                    </h5>
                    <p class="small text-muted mb-4 flex-grow-1">
                        {{ isset($produks[1]) ? Str::limit($produks[1]->deskripsi, 75) : 'Pengambilan keputusan berbasis data dan eksekusi terarah sesuai kebutuhan industri Anda.' }}
                    </p>
                    <div>
                        @if(isset($produks[1]))
                            <button type="button" class="btn-card-action border-0" data-bs-toggle="modal" data-bs-target="#produkModal{{ $produks[1]->id_produk }}">
                                Selengkapnya
                            </button>
                        @else
                            <a href="#kontak" class="btn-card-action">Selengkapnya</a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="feature-icon-box">
                            <i class="fa-solid fa-diagram-project"></i>
                        </div>
                        <div class="feature-dot-badge feature-dot-badge-blue">
                            <i class="fa-solid fa-circle"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2 text-dark-navy">
                        {{ $produks[2]->nama_produk ?? 'Branding Unggul' }}
                    </h5>
                    <p class="small text-muted mb-4 flex-grow-1">
                        {{ isset($produks[2]) ? Str::limit($produks[2]->deskripsi, 75) : 'Membangun identitas visual berkarakter kuat yang memikat dan mudah diingat.' }}
                    </p>
                    <div>
                        @if(isset($produks[2]))
                            <button type="button" class="btn-card-action border-0" data-bs-toggle="modal" data-bs-target="#produkModal{{ $produks[2]->id_produk }}">
                                Pelajari Lebih Lanjut
                            </button>
                        @else
                            <a href="#kontak" class="btn-card-action">Pelajari Lebih Lanjut</a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Card 4 (Dark Navy Card) -->
            <div class="col-md-6 col-lg-3">
                <div class="feature-card feature-card-dark">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="feature-icon-box text-white border-secondary">
                            <i class="fa-solid fa-shirt"></i>
                        </div>
                        <div class="feature-dot-badge bg-white text-dark">
                            <i class="fa-solid fa-circle"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2 text-white">
                        Solusi Responsif
                    </h5>
                    <p class="small text-white-50 mb-4 flex-grow-1">
                        Pengalaman lintas platform yang mulus dan dirancang dengan standar web mutakhir.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="#kontak" class="btn btn-light btn-sm rounded-pill font-weight-bold px-3 py-1">
                            Jelajahi
                        </a>
                        <a href="#kontak" class="btn btn-outline-light btn-sm rounded-pill font-weight-bold px-3 py-1">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dynamic Product Catalog Grid -->
        @if(count($produks) > 0)
            <div class="mt-5 p-4 rounded-4 bg-soft-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold text-dark-navy mb-0">Daftar Produk Dinamis</h4>
                    <a href="{{ route('user.produk.index') }}" class="btn btn-outline-navy btn-sm">Semua Produk <i class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>

                <div class="row g-4">
                    @foreach($produks->take(3) as $produk)
                        <div class="col-md-4">
                            <div class="card border-0 rounded-4 shadow-sm overflow-hidden h-100 bg-white">
                                <div style="height: 220px; overflow: hidden; background: #0A1128;">
                                    <img src="{{ $produk->gambar_url }}" alt="{{ $produk->nama_produk }}" class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="card-body p-4 d-flex flex-column">
                                    <h5 class="fw-bold text-dark-navy mb-2">{{ $produk->nama_produk }}</h5>
                                    <p class="small text-muted mb-0 leading-relaxed" style="min-height: 72px;">{{ Str::limit($produk->deskripsi, 140) }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Popup Detail Produk -->
                        <div class="modal fade" id="produkModal{{ $produk->id_produk }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">
                                    <div class="modal-header bg-dark-navy text-white border-0 px-4 py-3">
                                        <h5 class="modal-title fw-bold text-white"><i class="fa-solid fa-cube text-primary-blue me-2"></i> {{ $produk->nama_produk }}</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4 bg-white">
                                        <div class="row g-4 align-items-center">
                                            <div class="col-md-5">
                                                <div class="rounded-4 overflow-hidden border" style="height: 220px; background: #0A1128;">
                                                    <img src="{{ $produk->gambar_url }}" alt="{{ $produk->nama_produk }}" class="w-100 h-100 object-fit-cover">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-2 small font-weight-bold">PRODUK &amp; LAYANAN</span>
                                                <h4 class="fw-bold text-dark-navy mb-3">{{ $produk->nama_produk }}</h4>
                                                <div class="text-muted small leading-relaxed mb-3">
                                                    {!! nl2br(e($produk->deskripsi)) !!}
                                                </div>
                                                <div class="p-3 bg-soft-card rounded-3 border">
                                                    <small class="fw-bold text-dark-navy d-block mb-1"><i class="fa-solid fa-shield-halved text-primary-blue me-1"></i> Standar Layanan ZICODE:</small>
                                                    <small class="text-muted">Kualitas pengerjaan tinggi, integrasi sistem teruji, dan konsultasi berkelanjutan.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-soft-card border-0 px-4 py-3">
                                        <a href="#kontak" class="btn btn-primary-blue btn-sm px-4" data-bs-dismiss="modal">Konsultasi Layanan Ini <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                        <button type="button" class="btn btn-outline-navy btn-sm px-4" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>


    {{-- ========================================================================
         SECTION 4: ARTIKEL TERKINI (#artikel / Articles)
         ======================================================================== --}}
    <section id="artikel" class="py-3 mb-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
            <div>
                <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-2 font-weight-bold">INFORMASI TERKINI</span>
                <h2 class="display-6 fw-bold text-dark-navy mb-0">Artikel &amp; Berita Perusahaan</h2>
            </div>
            @if(count($artikels) > 3)
                <div class="mt-3 mt-md-0">
                    <button type="button" class="btn btn-outline-navy btn-sm" id="btnToggleArticles">
                        <span id="btnToggleArticlesText">Lihat Semua Artikel ({{ count($artikels) }})</span> <i class="fa-solid fa-chevron-down ms-1" id="btnToggleArticlesIcon"></i>
                    </button>
                </div>
            @endif
        </div>

        <!-- Article Card Grid -->
        <div class="row g-4" id="articleGrid">
            @forelse($artikels as $index => $artikel)
                <div class="col-md-4 {{ $index >= 3 ? 'd-none extra-article-item' : '' }}">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100 bg-white">
                        <div style="height: 200px; overflow: hidden; background: #0A1128;">
                            <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge bg-light text-primary-blue border border-primary-subtle rounded-pill px-3 py-1 small">ARTIKEL</span>
                                <small class="text-muted ms-auto fs-7"><i class="fa-regular fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d M Y') }}</small>
                            </div>
                            <h5 class="fw-bold text-dark-navy mb-2 fs-6" style="line-height: 1.4;">{{ Str::limit($artikel->judul, 55) }}</h5>
                            <p class="small text-muted mb-4 flex-grow-1" style="line-height: 1.6;">{{ Str::limit(strip_tags($artikel->isi), 95) }}</p>
                            <button type="button" class="btn btn-outline-navy btn-sm w-100 font-weight-bold" data-bs-toggle="modal" data-bs-target="#artikelModal{{ $artikel->id_artikel }}">
                                Baca Artikel <i class="fa-solid fa-book-open ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Popup Detail Artikel -->
                <div class="modal fade" id="artikelModal{{ $artikel->id_artikel }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg bg-white">
                            <div class="modal-header border-bottom px-4 py-3 bg-soft-card">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 small font-weight-bold">BERITA &amp; ARTIKEL</span>
                                    <span class="text-muted small"><i class="fa-regular fa-calendar text-primary-blue me-1"></i> {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d F Y') }}</span>
                                </div>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4 p-md-5">
                                <h3 class="fw-bold text-dark-navy mb-3 display-7" style="line-height: 1.3;">{{ $artikel->judul }}</h3>
                                
                                <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-primary-blue text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                            <i class="fa-solid fa-user-pen small"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold d-block text-dark-navy small">Tim Redaksi ZICODE</span>
                                            <small class="text-muted fs-7">Publikasi Resmi</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-4 overflow-hidden mb-4 border shadow-sm" style="max-height: 360px; background: #0A1128;">
                                    <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="w-100 h-100 object-fit-cover">
                                </div>

                                <div class="text-secondary leading-relaxed fs-6 mb-4" style="line-height: 1.8; color: #334155; text-align: justify;">
                                    {!! nl2br(e($artikel->isi)) !!}
                                </div>

                                <div class="p-3 rounded-3 bg-soft-card border d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    <small class="text-muted"><i class="fa-solid fa-circle-info text-primary-blue me-1"></i> Tertarik dengan solusi teknologi ZICODE?</small>
                                    <a href="#kontak" class="btn btn-primary-blue btn-sm px-3" data-bs-dismiss="modal">Konsultasi Gratis <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                            <div class="modal-footer bg-soft-card border-0 px-4 py-3">
                                <button type="button" class="btn btn-outline-navy btn-sm px-4" data-bs-dismiss="modal">Tutup Artikel</button>
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
         SECTION 5: GALERI KEGIATAN (#galeri / Gallery)
         ======================================================================== --}}
    <section id="galeri" class="py-3 mb-5">
        <div class="text-center max-w-700 mx-auto mb-4">
            <span class="badge bg-primary-blue text-white rounded-pill px-3 py-1 mb-2 font-weight-bold">GALERI KEGIATAN</span>
            <h2 class="display-6 fw-bold text-dark-navy">Karya &amp; Dokumentasi Kegiatan</h2>
            <p class="text-muted">Dokumentasi portofolio kegiatan dan proyek kreatif yang telah dilaksanakan perusahaan.</p>
        </div>

        <!-- Spotlight Banners Row -->
        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="spotlight-card-overlay">
                    <img src="{{ asset('img/solution.jpg') }}" alt="Solusi Berorientasi Klien">
                    <div class="spotlight-overlay-content">
                        <h4 class="fw-bold text-white mb-3">
                            Solusi Berorientasi Hasil &amp; Kepuasan Klien
                        </h4>
                        <div>
                            <a href="#kontak" class="btn btn-primary-blue btn-sm">
                                Lihat Kegiatan <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="spotlight-card-gradient p-4 text-white d-flex flex-column justify-content-between">
                    <div class="position-relative z-1 max-w-300 pe-md-5">
                        <span class="badge bg-white text-dark rounded-pill px-3 py-1 mb-3 font-weight-bold">KEAHLIAN UTAMA</span>
                        <h4 class="fw-bold mb-3">
                            Layanan Kreatif &amp; Solusi Digital Terintegrasi
                        </h4>
                        <a href="#produk" class="btn btn-outline-light btn-sm rounded-pill px-3">
                            Pelajari <i class="fa-solid fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                    <img src="{{ asset('img/expert.jpg') }}" alt="Profesional Bisnis Berpengalaman">
                </div>
            </div>
        </div>

        <!-- Dynamic Portfolio Gallery Grid -->
        @if(count($galeris) > 0)
            <div class="row g-4">
                @foreach($galeris->take(6) as $galeri)
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
                    <h3 class="fw-bold text-dark-navy mb-3">Mari Bekerja Sama</h3>
                    <p class="text-muted small mb-4">Punya rencana proyek atau ingin berkonsultasi dengan tim kami? Kirimkan pesan dan kami akan merespons dalam waktu 24 jam.</p>

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="feature-icon-box bg-white text-primary-blue">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark-navy mb-0">Lokasi</h6>
                            <small class="text-muted">{{ $profil->alamat ?? 'Jl. Professional Suite No. 88, Jakarta' }}</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="feature-icon-box bg-white text-primary-blue">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark-navy mb-0">Email</h6>
                            <small class="text-muted">{{ $profil->email ?? 'contact@zicode.com' }}</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <div class="feature-icon-box bg-white text-primary-blue">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark-navy mb-0">Telepon</h6>
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
                                <input type="text" name="nama" class="form-control rounded-3" placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark-navy">Alamat Email</label>
                                <input type="email" name="email" class="form-control rounded-3" placeholder="email@contoh.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-dark-navy">Subjek Pesan</label>
                                <input type="text" name="subjek" class="form-control rounded-3" placeholder="Subjek atau jenis konsultasi" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-dark-navy">Pesan Anda</label>
                                <textarea name="pesan" rows="4" class="form-control rounded-3" placeholder="Ceritakan detail proyek atau pertanyaan Anda..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-blue w-100 py-2">
                                    Kirim Pesan Sekarang <i class="fa-solid fa-paper-plane ms-2"></i>
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
