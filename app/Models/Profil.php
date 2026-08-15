<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profil
 * 
 * Model entitas Profil, Visi, Misi, dan Informasi Kontak Perusahaan ZICODE.
 * 
 * @package App\Models
 * @property int $id_profil
 * @property string $nama_perusahaan
 * @property string $tentang
 * @property string $visi
 * @property string $misi
 * @property string $alamat
 * @property string $telepon
 * @property string $email
 * @property string|null $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $logo_url
 */
class Profil extends Model
{
    use HasFactory;

    /**
     * Nama tabel database yang terasosiasi dengan model ini.
     *
     * @var string
     */
    protected $table = 'profils';

    /**
     * Nama primary key tabel.
     *
     * @var string
     */
    protected $primaryKey = 'id_profil';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_perusahaan',
        'tentang',
        'visi',
        'misi',
        'alamat',
        'telepon',
        'email',
        'stat1_angka',
        'stat1_label',
        'stat2_angka',
        'stat2_label',
        'stat3_angka',
        'stat3_label',
        'logo',
    ];

    /**
     * Accessor untuk mendapatkan URL lengkap file logo perusahaan secara dinamis.
     *
     * @return string
     */
    public function getLogoUrlAttribute(): string
    {
        if (!$this->logo) {
            return asset('img/logo.png');
        }

        if (file_exists(public_path('img/' . $this->logo))) {
            return asset('img/' . $this->logo);
        }

        if (file_exists(public_path('img/profil/' . $this->logo))) {
            return asset('img/profil/' . $this->logo);
        }

        if (file_exists(public_path('images/' . $this->logo))) {
            return asset('images/' . $this->logo);
        }

        if (file_exists(public_path($this->logo))) {
            return asset($this->logo);
        }

        return asset('img/' . $this->logo);
    }
}
