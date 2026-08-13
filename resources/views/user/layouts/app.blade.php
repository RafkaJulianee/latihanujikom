<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'ZICODE - Jasa Pembuatan Website & Aplikasi Mobile Profesional')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom Design System Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    @stack('styles')
</head>
<body data-bs-spy="scroll" data-bs-target="#cheerfulNav" data-bs-offset="100" tabindex="0">

    {{-- ========================================================================
         HEADER & NAVIGATION BAR
         ======================================================================== --}}
    <header class="header-navbar-wrapper">
        <div class="container">
            <nav class="navbar navbar-expand-lg py-0">
                <!-- Brand Logo Link -->
                <a class="brand-logo-link text-decoration-none" href="{{ route('home') }}#home">
                    <img src="{{ asset('images/zicode-icon.svg') }}" alt="ZICODE" width="36" height="36" class="rounded-3 me-1">
                    <span class="fw-black text-dark-navy letter-spacing-1 fs-4" style="font-family: 'Outfit', sans-serif; font-weight: 900;">ZICODE</span>
                </a>
                
                <!-- Mobile Navbar Toggler -->
                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#cheerfulNav" aria-controls="cheerfulNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars fs-4 text-dark"></i>
                </button>

                <!-- Navigation Menu Links -->
                <div class="collapse navbar-collapse justify-content-center" id="cheerfulNav">
                    <ul class="navbar-nav gap-1 my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}#home">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#profil">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#produk">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#artikel">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#galeri">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#kontak">Kontak</a>
                        </li>
                    </ul>
                </div>

                <!-- CTA Action Button -->
                <div class="d-none d-lg-flex align-items-center gap-2">
                    <a href="{{ route('home') }}#kontak" class="btn btn-primary-blue">Mulai Sekarang</a>
                </div>
            </nav>
        </div>
    </header>

    {{-- ========================================================================
         MAIN DYNAMIC CONTENT
         ======================================================================== --}}
    <main>
        @yield('content')
    </main>

    {{-- ========================================================================
         FOOTER SECTION
         ======================================================================== --}}
    <footer class="pt-5 pb-4 mt-5">
        <div class="container">
            <div class="row g-4 mb-5">
                <!-- Company Branding & Summary -->
                <div class="col-lg-4">
                    <a class="brand-logo-link text-white mb-3 d-inline-flex align-items-center gap-2 text-decoration-none" href="{{ route('home') }}#home">
                        <img src="{{ asset('images/zicode-icon.svg') }}" alt="ZICODE" width="36" height="36" class="rounded-3">
                        <span class="fw-black text-white letter-spacing-1 fs-4" style="font-family: 'Outfit', sans-serif; font-weight: 900;">ZICODE</span>
                    </a>
                    <p class="text-white-50 small pe-lg-4">
                        {{ $profil->tentang ?? 'Mentransformasi bisnis Anda dengan solusi profesional, desain modern, dan strategi pengembangan berkinerja tinggi.' }}
                    </p>
                    <div class="d-flex gap-2 mt-4">
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle p-2 px-3" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle p-2 px-3" aria-label="Dribbble"><i class="fa-brands fa-dribbble"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle p-2 px-3" aria-label="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Navigation Quick Links -->
                <div class="col-6 col-lg-2 ms-auto">
                    <h6 class="text-white fw-bold mb-3">Navigasi</h6>
                    <ul class="list-unstyled text-white-50 small d-flex flex-column gap-2">
                        <li><a href="{{ route('home') }}#home">Beranda</a></li>
                        <li><a href="{{ route('home') }}#produk">Layanan</a></li>
                        <li><a href="{{ route('home') }}#galeri">Portofolio</a></li>
                        <li><a href="{{ route('home') }}#artikel">Artikel &amp; Blog</a></li>
                    </ul>
                </div>

                <!-- Company Info Links -->
                <div class="col-6 col-lg-2">
                    <h6 class="text-white fw-bold mb-3">Perusahaan</h6>
                    <ul class="list-unstyled text-white-50 small d-flex flex-column gap-2">
                        <li><a href="{{ route('home') }}#profil">Tentang Kami</a></li>
                        <li><a href="{{ route('home') }}#kontak">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Official Contact Details -->
                <div class="col-lg-3">
                    <h6 class="text-white fw-bold mb-3">Hubungi Kami</h6>
                    <p class="text-white-50 small mb-1"><i class="fa-solid fa-location-dot me-2 text-primary-blue"></i> {{ $profil->alamat ?? 'Jl. Professional Suite No. 88, Jakarta' }}</p>
                    <p class="text-white-50 small mb-1"><i class="fa-solid fa-envelope me-2 text-primary-blue"></i> {{ $profil->email ?? 'contact@zicode.com' }}</p>
                    <p class="text-white-50 small mb-0"><i class="fa-solid fa-phone me-2 text-primary-blue"></i> {{ $profil->telepon ?? '+62 812-3456-7890' }}</p>
                </div>
            </div>

            <hr class="border-secondary opacity-25">

            <!-- Copyright & Credits -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small text-white-50 pt-2">
                <p class="mb-0">&copy; {{ date('Y') }} ZICODE Digital Agency. Hak Cipta Dilindungi.</p>
                <p class="mb-0">Didukung oleh Laravel &amp; Bootstrap 5</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Modular Master JavaScript -->
    <script src="{{ asset('js/main.js') }}"></script>
    
    @stack('scripts')
</body>
</html>
