<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Panel Admin - ZICODE')</title>
    
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
        <div class="p-4 border-bottom border-white border-opacity-10">
            <a href="{{ route('admin.dashboard') }}" class="brand-logo-text text-decoration-none d-flex align-items-center gap-2">
                <img src="{{ asset('images/zicode-icon.svg') }}" alt="ZICODE" width="34" height="34" class="rounded-3">
                <span class="fw-black text-white letter-spacing-1 fs-4" style="font-family: 'Outfit', sans-serif; font-weight: 900;">ZICODE</span>
            </a>
            <small class="d-block text-white-50 text-uppercase mt-1" style="font-size: 0.68rem; letter-spacing: 1px;">Pusat Kontrol Admin</small>
        </div>

        <!-- Sidebar Navigation Menu Items -->
        <nav class="py-3 flex-grow-1">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-pie"></i> Dashboard
            </a>
            <a href="{{ route('admin.produk.index') }}" class="admin-nav-item {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                <i class="fa-solid fa-cubes"></i> Produk & Layanan
            </a>
            <a href="{{ route('admin.artikel.index') }}" class="admin-nav-item {{ request()->routeIs('admin.artikel.*') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper"></i> Artikel & Blog
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="admin-nav-item {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                <i class="fa-solid fa-images"></i> Galeri & Portofolio
            </a>
            <a href="{{ route('profil.edit') }}" class="admin-nav-item {{ request()->routeIs('profil.edit') ? 'active' : '' }}">
                <i class="fa-solid fa-building"></i> Profil Perusahaan
            </a>
        </nav>

        <!-- Sidebar Footer Action Buttons -->
        <div class="p-3 border-top border-white border-opacity-10 mt-auto">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-light btn-sm w-100 mb-2 rounded-pill fw-semibold py-2">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Lihat Situs Web
            </a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm w-100 rounded-pill fw-semibold py-2">
                    <i class="fa-solid fa-right-from-bracket me-1"></i> Keluar
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
                <h5 class="fw-bold mb-0 text-dark-navy">@yield('page_heading', 'Dashboard Admin')</h5>
                <small class="text-muted">Kelola konten dan informasi website ZICODE</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 fw-semibold px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1.5">
                    <i class="fa-solid fa-circle text-success" style="font-size: 0.5rem;"></i> Admin Aktif
                </span>
                <div class="d-flex align-items-center gap-2 border-start ps-3">
                    <div class="bg-primary-blue text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 34px; height: 34px; font-size: 0.85rem;">
                        {{ strtoupper(substr(Auth::guard('admin')->user()->nama ?? 'A', 0, 1)) }}
                    </div>
                    <span class="fw-bold small text-dark">
                        {{ Auth::guard('admin')->user()->nama ?? 'Administrator' }}
                    </span>
                </div>
            </div>
        </header>

        <!-- Flash Alert Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4 border-0 shadow-sm bg-success bg-opacity-10 text-success fw-semibold" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4 border-0 shadow-sm bg-danger bg-opacity-10 text-danger fw-semibold" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
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
