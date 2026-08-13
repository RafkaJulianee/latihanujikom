/**
 * ==============================================================================
 * ZICODE - Main Frontend & UI Interactive Scripts
 * ==============================================================================
 * 
 * Deskripsi: Berisi seluruh logika interaktif antarmuka pengguna seperti
 *            smooth scroll, scrollspy navigasi aktif, animasi counter angka,
 *            toggle ekspansi artikel, dan toggle visibilitas password.
 * 
 * Versi    : 1.0.0
 * Lisensi  : Proprietary / Hak Cipta Dilindungi
 * ==============================================================================
 */

document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    /**
     * --------------------------------------------------------------------------
     * 1. Inisialisasi Smooth Scrolling & Navigasi Mobile Auto-Close
     * --------------------------------------------------------------------------
     * Menangani klik pada link navigasi berbasis anchor ID (#) agar berpindah
     * secara mulus dengan kompensasi tinggi header navbar (sticky offset).
     */
    function initSmoothScroll() {
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link, a[href*="#"]');
        const navbarCollapse = document.getElementById('cheerfulNav');
        const headerOffset = 85;

        navLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                const href = this.getAttribute('href');
                if (!href || !href.includes('#')) return;

                const targetId = href.substring(href.indexOf('#'));
                if (targetId === '#' || targetId.length <= 1) return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    event.preventDefault();

                    // Tutup menu collapse mobile jika sedang terbuka
                    if (navbarCollapse && navbarCollapse.classList.contains('show') && typeof bootstrap !== 'undefined') {
                        const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                        if (bsCollapse) {
                            bsCollapse.hide();
                        }
                    }

                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * --------------------------------------------------------------------------
     * 2. Inisialisasi Active Navigation Item on Scroll (Scrollspy)
     * --------------------------------------------------------------------------
     * Memberikan kelas 'active' dan 'fw-bold' pada menu navigasi yang sesuai
     * dengan section halaman yang saat ini berada di viewport pengguna.
     */
    function initScrollSpy() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        if (sections.length === 0 || navLinks.length === 0) return;

        window.addEventListener('scroll', function () {
            const scrollY = window.pageYOffset;

            sections.forEach(function (current) {
                const sectionHeight = current.offsetHeight;
                const sectionTop = current.offsetTop - 120;
                const sectionId = current.getAttribute('id');
                const navItem = document.querySelector('.navbar-nav a[href*="#' + sectionId + '"]');

                if (navItem) {
                    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                        navLinks.forEach(function (link) {
                            link.classList.remove('active', 'fw-bold');
                        });
                        navItem.classList.add('active', 'fw-bold');
                    }
                }
            });
        });
    }

    /**
     * --------------------------------------------------------------------------
     * 3. Inisialisasi Animated Number Counter (Statistik Interaktif)
     * --------------------------------------------------------------------------
     * Menghidupkan angka statistik saat section terlihat di layar pengguna
     * menggunakan IntersectionObserver dan animasi easing exponential.
     */
    function initStatsCounter() {
        const statsRow = document.getElementById('statsCounterRow');
        const counterElements = document.querySelectorAll('.counter-value');

        if (!statsRow || counterElements.length === 0) return;

        const easeOutExpo = function (t) {
            return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
        };

        const activeAnimationFrames = new Map();

        const startCountAnimation = function (element) {
            const target = parseInt(element.getAttribute('data-target'), 10) || 0;
            const suffix = element.getAttribute('data-suffix') || '';
            const duration = 1000; // 1 detik durasi animasi
            let startTime = null;

            if (activeAnimationFrames.has(element)) {
                cancelAnimationFrame(activeAnimationFrames.get(element));
            }

            element.textContent = '0' + suffix;

            const updateCounter = function (currentTime) {
                if (!startTime) startTime = currentTime;
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const easedProgress = easeOutExpo(progress);
                const currentNumber = Math.round(easedProgress * target);

                element.textContent = currentNumber + suffix;

                if (progress < 1) {
                    const reqId = requestAnimationFrame(updateCounter);
                    activeAnimationFrames.set(element, reqId);
                } else {
                    element.textContent = target + suffix;
                    activeAnimationFrames.delete(element);
                }
            };

            const reqId = requestAnimationFrame(updateCounter);
            activeAnimationFrames.set(element, reqId);
        };

        const resetCounter = function (element) {
            if (activeAnimationFrames.has(element)) {
                cancelAnimationFrame(activeAnimationFrames.get(element));
                activeAnimationFrames.delete(element);
            }
            const suffix = element.getAttribute('data-suffix') || '';
            element.textContent = '0' + suffix;
        };

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        counterElements.forEach(function (el) {
                            startCountAnimation(el);
                        });
                    } else {
                        counterElements.forEach(function (el) {
                            resetCounter(el);
                        });
                    }
                });
            }, {
                threshold: 0.3,
                rootMargin: '0px 0px -40px 0px'
            });

            observer.observe(statsRow);
        } else {
            // Fallback untuk browser lawas tanpa IntersectionObserver
            counterElements.forEach(function (el) {
                startCountAnimation(el);
            });
        }
    }

    /**
     * --------------------------------------------------------------------------
     * 4. Inisialisasi Toggle Tampilkan / Sembunyikan Artikel Tambahan
     * --------------------------------------------------------------------------
     * Menangani tombol ekspansi daftar artikel jika terdapat lebih dari 3 artikel.
     */
    function initArticleToggle() {
        const btnToggle = document.getElementById('btnToggleArticles');
        if (!btnToggle) return;

        let isExpanded = false;
        btnToggle.addEventListener('click', function () {
            const extraItems = document.querySelectorAll('.extra-article-item');
            const btnText = document.getElementById('btnToggleArticlesText');
            const btnIcon = document.getElementById('btnToggleArticlesIcon');

            isExpanded = !isExpanded;

            extraItems.forEach(function (item) {
                if (isExpanded) {
                    item.classList.remove('d-none');
                } else {
                    item.classList.add('d-none');
                }
            });

            if (isExpanded) {
                if (btnText) btnText.textContent = 'Sembunyikan Artikel';
                if (btnIcon) btnIcon.className = 'fa-solid fa-chevron-up ms-1';
            } else {
                if (btnText) btnText.textContent = 'Lihat Semua Artikel (' + (3 + extraItems.length) + ')';
                if (btnIcon) btnIcon.className = 'fa-solid fa-chevron-down ms-1';
            }
        });
    }

    /**
     * --------------------------------------------------------------------------
     * 5. Inisialisasi Password Visibility Toggle (Admin Login)
     * --------------------------------------------------------------------------
     * Mengubah tipe input password dari 'password' ke 'text' dan sebaliknya.
     */
    function initPasswordToggle() {
        const btnToggle = document.getElementById('btnTogglePassword');
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('togglePasswordIcon');

        if (!btnToggle || !passwordInput || !toggleIcon) return;

        btnToggle.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';

            if (isPassword) {
                toggleIcon.classList.remove('fa-regular', 'fa-eye');
                toggleIcon.classList.add('fa-regular', 'fa-eye-slash');
            } else {
                toggleIcon.classList.remove('fa-regular', 'fa-eye-slash');
                toggleIcon.classList.add('fa-regular', 'fa-eye');
            }
        });
    }

    // Eksekusi seluruh modul interaktif UI
    initSmoothScroll();
    initScrollSpy();
    initStatsCounter();
    initArticleToggle();
    initPasswordToggle();
});
