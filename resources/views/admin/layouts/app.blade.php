<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Panel Admin - PT Solusi Koneksi')</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}?v={{ time() }}" type="image/png">
    <link rel="icon" href="{{ asset('img/logo.png') }}?v={{ time() }}" type="image/png">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom Theme Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    @stack('styles')
</head>
<body class="admin-body">

    {{-- ========================================================================
         ADMIN SIDEBAR NAVIGATION
         ======================================================================== --}}
    <aside class="admin-sidebar">
        <!-- Sidebar Brand Header -->
        <div class="p-3 px-4 border-bottom border-white border-opacity-10 d-flex align-items-center gap-3">
            <div class="bg-white p-1 rounded-3 d-inline-flex align-items-center justify-content-center shadow-sm" style="height: 42px; width: 42px; min-width: 42px;">
                <img src="{{ $profil->logo_url ?? asset('img/logo.png') }}" alt="{{ $profil->nama_perusahaan ?? 'PT Solusi Koneksi' }}" style="max-height: 34px; max-width: 34px; object-fit: contain;">
            </div>
            <div>
                <span class="fw-black text-white letter-spacing-1 d-block text-truncate" style="font-family: 'Outfit', sans-serif; font-size: 1.05rem; font-weight: 800; line-height: 1.2; max-width: 155px;">{{ $profil->nama_perusahaan ?? 'PT Solusi Koneksi' }}</span>
                <small class="text-white-50 text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.8px;">Panel Administrator</small>
            </div>
        </div>

        <!-- Sidebar Navigation Menu Items (Urut sesuai alur Landing Page) -->
        <nav class="py-3 flex-grow-1 overflow-y-auto">
            <p class="admin-sidebar-label">Menu Utama</p>
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('profil.edit') }}" class="admin-nav-item {{ request()->routeIs('profil.edit') ? 'active' : '' }}">
                <i class="fa-solid fa-building"></i>
                <span>Profil Perusahaan</span>
            </a>
            <a href="{{ route('admin.produk.index') }}" class="admin-nav-item {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                <i class="fa-solid fa-cubes"></i>
                <span>Layanan &amp; Produk</span>
            </a>
            <a href="{{ route('admin.artikel.index') }}" class="admin-nav-item {{ request()->routeIs('admin.artikel.*') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper"></i>
                <span>Artikel &amp; Insight</span>
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="admin-nav-item {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                <i class="fa-solid fa-images"></i>
                <span>Galeri &amp; Karya</span>
            </a>
        </nav>

        <!-- Sidebar Footer Action Buttons -->
        <div class="p-3 border-top border-white border-opacity-10 mt-auto">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-light btn-sm w-100 mb-2 rounded-3 fw-semibold py-2">
                <i class="fa-solid fa-arrow-up-right-from-square me-1.5"></i> Lihat Website
            </a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm w-100 rounded-3 fw-semibold py-2">
                    <i class="fa-solid fa-right-from-bracket me-1.5"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    {{-- ========================================================================
         ADMIN MAIN CONTENT AREA
         ======================================================================== --}}
    <div class="admin-main">
        <!-- Top Header Bar -->
        <header class="admin-header">
            <div>
                <h5 class="fw-bold mb-0 text-dark-navy" style="font-family: 'Outfit', sans-serif;">@yield('page_heading', 'Dashboard Admin')</h5>
                <small class="text-muted">Pusat kendali dan administrasi website PT Solusi Koneksi</small>
            </div>
        </header>

        <!-- Flash Alert Messages -->
        @if(session('success'))
            <div class="admin-alert-card alert-success alert-dismissible fade show" role="alert">
                <div class="admin-alert-icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div class="admin-alert-content">
                    <div class="admin-alert-title">Berhasil</div>
                    <p class="admin-alert-desc">{{ session('success') }}</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="admin-alert-card alert-danger alert-dismissible fade show" role="alert">
                <div class="admin-alert-icon">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>
                <div class="admin-alert-content">
                    <div class="admin-alert-title">Terjadi Kesalahan</div>
                    <p class="admin-alert-desc">{{ session('error') }}</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="admin-alert-card alert-danger alert-dismissible fade show" role="alert">
                <div class="admin-alert-icon">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="admin-alert-content">
                    <div class="admin-alert-title">Periksa Kembali Data Input</div>
                    <p class="admin-alert-desc">{{ $errors->first() }}</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Dynamic Content Yield -->
        @yield('content')
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
