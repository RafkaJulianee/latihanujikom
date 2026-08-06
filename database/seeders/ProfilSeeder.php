<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        Profil::create([
            'nama_perusahaan' => 'PT Solusi Koneksi Anda',
            'tentang'         => 'Perusahaan penyedia layanan infrastruktur jaringan dan solusi IT terintegrasi.',
            'visi'            => 'Menjadi penyedia solusi IT terdepan dan terpercaya.',
            'misi'            => ' memberikan layanan jaringan terbaik dan berorientasi pada kepuasan pelanggan.',
            'alamat'          => 'Jl. Raya Utama No. 123, Jakarta',
            'telepon'         => '021-5551234',
            'email'           => 'info@solusikoneksi.com',
            'logo'            => 'logo.png',
        ]);
    }
}