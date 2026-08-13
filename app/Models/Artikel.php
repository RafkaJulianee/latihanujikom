<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Artikel
 * 
 * Model entitas Artikel & Berita publikasi resmi ZICODE.
 * 
 * @package App\Models
 * @property int $id_artikel
 * @property int $id_admin
 * @property string $judul
 * @property string $isi
 * @property string|null $gambar
 * @property string $tanggal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $gambar_url
 */
class Artikel extends Model
{
    use HasFactory;

    /**
     * Nama tabel database yang terasosiasi dengan model ini.
     *
     * @var string
     */
    protected $table = 'artikels';

    /**
     * Nama primary key tabel.
     *
     * @var string
     */
    protected $primaryKey = 'id_artikel';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_admin',
        'judul',
        'isi',
        'gambar',
        'tanggal',
    ];

    /**
     * Relasi BelongsTo ke entitas Admin yang mempublikasikan artikel ini.
     *
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }

    /**
     * Accessor untuk mendapatkan URL lengkap gambar sampul artikel secara dinamis.
     *
     * @return string
     */
    public function getGambarUrlAttribute(): string
    {
        if (!$this->gambar) {
            return asset('img/default.png');
        }

        if (file_exists(public_path('images/' . $this->gambar))) {
            return asset('images/' . $this->gambar);
        }

        if (file_exists(public_path('img/' . $this->gambar))) {
            return asset('img/' . $this->gambar);
        }

        if (file_exists(public_path('img/artikels/' . $this->gambar))) {
            return asset('img/artikels/' . $this->gambar);
        }

        if (file_exists(public_path('storage/' . $this->gambar))) {
            return asset('storage/' . $this->gambar);
        }

        return asset('img/' . $this->gambar);
    }
}