<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Masuk Admin - {{ $profil->nama_perusahaan ?? 'PT Solusi Koneksi' }}</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}?v={{ time() }}" type="image/png">
    <link rel="icon" href="{{ asset('img/logo.png') }}?v={{ time() }}" type="image/png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        :root {
            --primary-blue: #2563EB;
            --primary-blue-hover: #1D4ED8;
            --dark-navy: #0A1128;
            --text-dark: #0F172A;
            --text-muted: #64748B;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
            height: 100vh;
            height: 100dvh;
            overflow: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FFFFFF;
            color: var(--text-dark);
        }

        .login-split-container {
            height: 100vh;
            height: 100dvh;
            display: flex;
            width: 100%;
            overflow: hidden;
        }

        /* --- Left Side: Hero Image --- */
        .login-hero-side {
            width: 50%;
            height: 100%;
            position: relative;
            background-image: url("{{ asset('img/hero-office.jpg') }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 4rem 4.5rem;
            color: #FFFFFF;
            overflow: hidden;
        }

        .login-hero-side::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(10, 17, 40, 0.25) 0%, rgba(10, 17, 40, 0.4) 45%, rgba(10, 17, 40, 0.88) 100%);
            z-index: 1;
        }

        .login-hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-caption-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 2.75rem;
            line-height: 1.15;
            margin-bottom: 0.85rem;
            color: #FFFFFF;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
        }

        .hero-caption-sub {
            font-size: 1rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.88);
            max-width: 460px;
            text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        }

        /* --- Right Side: Form Panel --- */
        .login-form-side {
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem 4.5rem;
            background-color: #FFFFFF;
            overflow-y: auto;
        }

        .login-form-wrapper {
            width: 100%;
            max-width: 420px;
            margin: auto;
            padding: 1rem 0;
        }

        .form-heading-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 2.25rem;
            color: var(--dark-navy);
            margin-bottom: 0.4rem;
            letter-spacing: -0.6px;
            line-height: 1.2;
        }

        .form-heading-sub {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .custom-form-group {
            margin-bottom: 1.4rem;
        }

        .custom-form-label {
            display: block;
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--dark-navy);
            margin-bottom: 0.5rem;
        }

        .custom-input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .custom-form-control {
            width: 100%;
            padding: 13px 18px;
            font-size: 0.95rem;
            font-family: inherit;
            color: var(--text-dark);
            background-color: #FFFFFF;
            border: 1.5px solid #CBD5E1;
            border-radius: 12px;
            transition: all 0.2s ease;
            outline: none;
        }

        .custom-form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .custom-form-control.has-toggle {
            padding-right: 48px;
        }

        .btn-password-toggle {
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            color: #94A3B8;
            font-size: 1.15rem;
            cursor: pointer;
            padding: 6px 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s ease;
        }

        .btn-password-toggle:hover {
            color: var(--primary-blue);
        }

        .btn-submit-blue {
            width: 100%;
            background-color: var(--primary-blue);
            color: #FFFFFF;
            border: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            padding: 14px 20px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 6px 18px rgba(37, 99, 235, 0.28);
            margin-top: 0.5rem;
        }

        .btn-submit-blue:hover {
            background-color: var(--primary-blue-hover);
            transform: translateY(-1px);
            box-shadow: 0 8px 22px rgba(37, 99, 235, 0.38);
            color: #FFFFFF;
        }

        .btn-submit-blue:active {
            transform: translateY(0);
        }

        .login-footer-text {
            text-align: center;
            font-size: 0.85rem;
            color: var(--text-muted);
            padding-top: 1rem;
        }

        @media (max-width: 991.98px) {
            html, body {
                height: 100%;
                overflow-y: auto;
            }

            .login-split-container {
                flex-direction: column;
                height: auto;
                min-height: 100vh;
                min-height: 100dvh;
            }

            .login-hero-side {
                display: none;
            }

            .login-form-side {
                width: 100%;
                min-height: 100vh;
                min-height: 100dvh;
                padding: 2.5rem 1.75rem;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .login-form-wrapper {
                max-width: 100%;
                margin: auto 0;
            }

            .form-heading-title {
                font-size: 1.85rem;
            }
        }

        @media (max-width: 480px) {
            .login-form-side {
                padding: 2rem 1.25rem;
            }

            .form-heading-title {
                font-size: 1.75rem;
            }

            .custom-form-control {
                padding: 12px 16px;
                font-size: 0.9rem;
            }

            .btn-submit-blue {
                padding: 13px 18px;
            }
        }
    </style>
</head>
<body>

    <div class="login-split-container">
        
        {{-- Left Side: Hero Branding Banner (Desktop Only) --}}
        <div class="login-hero-side">
            <div class="login-hero-content">
                <h1 class="hero-caption-title">
                    Find your digital excellence
                </h1>
                <p class="hero-caption-sub">
                    Pusat kendali dan administrasi terpadu untuk mengelola seluruh informasi, layanan, dan portofolio perusahaan.
                </p>
            </div>
        </div>

        {{-- Right Side: Form Panel --}}
        <div class="login-form-side">
            <div class="login-form-wrapper">
                <div class="mb-3">
                    <img src="{{ $profil->logo_url ?? asset('img/logo.png') }}" alt="{{ $profil->nama_perusahaan ?? 'PT Solusi Koneksi' }}" style="height: 64px; width: auto; max-width: 220px; object-fit: contain;">
                </div>
                <h2 class="form-heading-title">
                    Welcome Back to {{ $profil->nama_perusahaan ?? 'PT Solusi Koneksi' }}!
                </h2>
                <p class="form-heading-sub">
                    Sign in your account
                </p>

                {{-- Alert Feedback --}}
                @if($errors->any())
                    <div class="admin-alert-card alert-danger mb-4">
                        <div class="admin-alert-icon">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </div>
                        <div class="admin-alert-content">
                            <div class="admin-alert-title">Gagal Masuk</div>
                            <p class="admin-alert-desc">{{ $errors->first() }}</p>
                        </div>
                    </div>
                @endif

                @if(session('success'))
                    <div class="admin-alert-card alert-success mb-4">
                        <div class="admin-alert-icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <div class="admin-alert-content">
                            <div class="admin-alert-title">Berhasil</div>
                            <p class="admin-alert-desc">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                {{-- Login Form --}}
                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf

                    <!-- Email / Username Input -->
                    <div class="custom-form-group">
                        <label for="username" class="custom-form-label">Email</label>
                        <div class="custom-input-container">
                            <input 
                                type="text" 
                                name="username" 
                                id="username" 
                                class="custom-form-control @error('username') is-invalid @enderror" 
                                placeholder="" 
                                value="{{ old('username') }}" 
                                required 
                                autofocus
                            >
                        </div>
                    </div>

                    <!-- Password Input with Visibility Toggle -->
                    <div class="custom-form-group">
                        <label for="password" class="custom-form-label">Password</label>
                        <div class="custom-input-container">
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="custom-form-control has-toggle @error('password') is-invalid @enderror" 
                                placeholder="" 
                                required
                            >
                            <button type="button" class="btn-password-toggle" id="btnTogglePassword" title="Lihat / Sembunyikan Sandi" aria-label="Toggle password visibility">
                                <i class="fa-regular fa-eye" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-submit-blue">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Modular Master JavaScript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
