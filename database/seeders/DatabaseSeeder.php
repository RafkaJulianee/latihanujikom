<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Profil;
use App\Models\Produk;
use App\Models\Artikel;
use App\Models\Galeri;

/**
 * Class DatabaseSeeder
 * 
 * Seeder utama untuk mengisi data awal (initial master data) sistem:
 * Akun Administrator, Profil Perusahaan, Layanan Digital, Artikel Blog, dan Galeri Portofolio.
 * 
 * @package Database\Seeders
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Menjalankan seluruh proses seeding database.
     *
     * @return void
     */
    public function run(): void
    {
        // 1. Akun Administrator Default
        $admin = Admin::firstOrCreate(
            ['username' => 'admin'],
            [
                'nama'     => 'Chief Creative Admin',
                'password' => Hash::make('admin123'),
                'email'    => 'admin@solusikoneksi.com',
            ]
        );

        // 2. Profil & Identitas Perusahaan PT Solusi Koneksi
        Profil::updateOrCreate(
            ['id_profil' => 1],
            [
                'nama_perusahaan' => 'PT Solusi Koneksi',
                'tentang'         => 'PT Solusi Koneksi adalah agensi teknologi digital profesional yang mengkhususkan diri dalam jasa pembuatan website, pengembangan aplikasi mobile (Android & iOS), perancangan UI/UX design antarmuka modern, serta solusi software enterprise untuk mempercepat transformasi digital bisnis Anda.',
                'visi'            => 'Menjadi penyedia jasa pembuatan website, aplikasi mobile, dan solusi digital terdepan di Indonesia yang terpercaya dalam menghadirkan inovasi teknologi berkinerja tinggi, aman, dan berestetika modern.',
                'misi'            => "1. Menyediakan layanan jasa pembuatan website & aplikasi mobile berstandar profesional dengan performa cepat, responsif, dan aman.\n2. Merancang antarmuka UI/UX yang intuitif untuk meningkatkan pengalaman pengguna serta konversi bisnis.\n3. Memberikan pendampingan teknis, pemeliharaan sistem, dan solusi digital berkelanjutan bagi setiap mitra bisnis.",
                'alamat'          => 'Jl. Jendral Sudirman No. 88, Central Business District, Jakarta',
                'telepon'         => '+62 812-3456-7890',
                'email'           => 'contact@solusikoneksi.com',
                'logo'            => 'ptsolusikoneksiremovebg.png',
            ]
        );

        // 3. Data Awal Produk & Layanan Solusi Digital
        $produks = [
            [
                'nama_produk' => 'DESAIN UI/UX & PROTOTIPE',
                'deskripsi'   => 'Tingkatkan kualitas produk digital Anda dengan layanan desain antarmuka (UI) dan pengalaman pengguna (UX) profesional. Kami merancang alur pengguna yang intuitif, wireframe terstruktur, serta prototipe interaktif modern.',
                'gambar'      => 'ui-ux-design.png',
            ],
            [
                'nama_produk' => 'PEMBUATAN WEBSITE KUSTOM',
                'deskripsi'   => 'Pengembangan website responsif, cepat, dan aman dengan arsitektur teknologi terkini. Cocok untuk website profil perusahaan, portal berita, toko online e-commerce, hingga sistem informasi manajemen.',
                'gambar'      => '3d-illustration.png',
            ],
            [
                'nama_produk' => 'PENGEMBANGAN APLIKASI MOBILE',
                'deskripsi'   => 'Membangun aplikasi mobile Android & iOS berkinerja tinggi dengan antarmuka yang ramah pengguna, navigasi mulus, dan integrasi backend API yang andal.',
                'gambar'      => 'mobile-app.png',
            ],
            [
                'nama_produk' => 'BRANDING & IDENTITAS VISUAL',
                'deskripsi'   => 'Membangun karakter visual merek yang kuat, mulai dari pembuatan logo profesional, pedoman warna dan tipografi, hingga identitas visual yang siap bersaing di pasar.',
                'gambar'      => 'logo-branding.png',
            ],
            [
                'nama_produk' => 'ANIMASI & MOTION GRAPHICS',
                'deskripsi'   => 'Menghadirkan konten visual bergerak yang dinamis, video penjelasan produk (explainer video), dan materi promosi kreatif untuk meningkatkan daya tarik pelanggan.',
                'gambar'      => 'motion-graphics.png',
            ],
            [
                'nama_produk' => 'INTEGRASI SISTEM & API',
                'deskripsi'   => 'Solusi penghubung antar platform, otomatisasi alur kerja digital, integrasi payment gateway, dan sinkronisasi data secara aman dan efisien.',
                'gambar'      => 'design-system.png',
            ],
        ];

        foreach ($produks as $p) {
            Produk::updateOrCreate(
                ['nama_produk' => $p['nama_produk']],
                [
                    'id_admin'  => $admin->id_admin,
                    'deskripsi' => $p['deskripsi'],
                    'gambar'    => $p['gambar'],
                ]
            );
        }

        // 4. Data Awal Artikel & Publikasi Berita
        $artikels = [
            [
                'judul'   => 'Tren Desain Website Modern Tahun 2026',
                'isi'     => 'Pelajari bagaimana tipografi tebal, palet warna berkarakter kuat, dan interaktivitas modern mentransformasi pengalaman pengguna digital. Di tahun 2026, situs web tidak hanya berfungsi sebagai media informasi statis, melainkan platform interaktif yang mengutamakan kecepatan akses, responsivitas di seluruh perangkat, dan kenyamanan visual maksimal.',
                'gambar'  => 'artikel-3d-trends.png',
                'tanggal' => '2026-08-01',
            ],
            [
                'judul'   => 'Pentingnya Identitas Brand yang Kuat di Era Digital',
                'isi'     => 'Membangun citra bisnis yang kredibel membutuhkan konsistensi visual, pesan yang tepat, dan strategi branding yang matang. Identitas visual yang profesional membantu perusahaan memenangkan kepercayaan calon pelanggan serta memperkuat posisi di tengah persaingan pasar yang ketat.',
                'gambar'  => 'artikel-brand-identity.png',
                'tanggal' => '2026-08-03',
            ],
            [
                'judul'   => 'Masa Depan Pengalaman Pengguna pada Aplikasi Mobile',
                'isi'     => 'Menjelajahi peran micro-interactions, navigasi berbasis gestur, dan arsitektur kode berkinerja tinggi. Kami merangkum prinsip-prinsip utama UI/UX yang membedakan aplikasi mobile sukses dan disukai oleh ribuan pengguna aktif harian.',
                'gambar'  => 'artikel-mobile-ux.png',
                'tanggal' => '2026-08-05',
            ],
        ];

        foreach ($artikels as $a) {
            Artikel::updateOrCreate(
                ['judul' => $a['judul']],
                [
                    'id_admin' => $admin->id_admin,
                    'isi'      => $a['isi'],
                    'gambar'   => $a['gambar'],
                    'tanggal'  => $a['tanggal'],
                ]
            );
        }

        // 5. Data Awal Galeri Karya & Portofolio
        $galeris = [
            [
                'judul'      => 'Aplikasi Mobile Keuangan Digital',
                'keterangan' => 'Desain antarmuka aplikasi fintech modern dengan grafik analitik keuangan waktu nyata dan navigasi yang sangat intuitif.',
                'gambar'     => 'galeri-financial-app.png',
            ],
            [
                'judul'      => 'Platform E-Commerce Busana Premium',
                'keterangan' => 'Pengembangan situs web toko online responsif dengan katalog produk dinamis, keranjang belanja interaktif, dan integrasi pembayaran.',
                'gambar'     => 'galeri-ecommerce-app.png',
            ],
            [
                'judul'      => 'Identitas Visual & Branding Korporat',
                'keterangan' => 'Paket identitas visual lengkap mencakup logo, pedoman merek korporat, dan aset digital untuk perusahaan teknologi.',
                'gambar'     => 'galeri-cyberpunk-brand.png',
            ],
            [
                'judul'      => 'Dashboard Kontrol Sistem IoT',
                'keterangan' => 'Tampilan antarmuka pemantauan perangkat pintar dan otomatisasi kontrol berbasis website dengan visual futuristik.',
                'gambar'     => 'galeri-smart-home.png',
            ],
            [
                'judul'      => 'Platform Visualisasi Data SaaS',
                'keterangan' => 'Suite analitik berbasis web dengan tema gelap, widget data real-time, dan manajemen laporan komprehensif.',
                'gambar'     => 'galeri-saas-platform.png',
            ],
            [
                'judul'      => 'Portal Layanan Publik Digital',
                'keterangan' => 'Perancangan sistem informasi terintegrasi untuk mempermudah akses layanan dan komunikasi publik secara daring.',
                'gambar'     => 'galeri-3d-mascot.png',
            ],
        ];

        foreach ($galeris as $g) {
            Galeri::updateOrCreate(
                ['judul' => $g['judul']],
                [
                    'id_admin'   => $admin->id_admin,
                    'keterangan' => $g['keterangan'],
                    'gambar'     => $g['gambar'],
                ]
            );
        }
    }
}
