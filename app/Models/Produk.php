<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Produk
 * 
 * Model entitas Produk & Layanan Solusi Digital ZICODE.
 * 
 * @package App\Models
 * @property int $id_produk
 * @property int $id_admin
 * @property string $nama_produk
 * @property string $deskripsi
 * @property string|null $gambar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $gambar_url
 */
class Produk extends Model
{
    use HasFactory;

    /**
     * Nama tabel database yang terasosiasi dengan model ini.
     *
     * @var string
     */
    protected $table = 'produks';

    /**
     * Nama primary key tabel.
     *
     * @var string
     */
    protected $primaryKey = 'id_produk';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_admin',
        'nama_produk',
        'deskripsi',
        'gambar',
    ];

    /**
     * Relasi BelongsTo ke entitas Admin pembuat data produk ini.
     *
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }

    /**
     * Accessor untuk mendapatkan URL lengkap gambar produk/layanan secara dinamis.
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

        if (file_exists(public_path('img/produks/' . $this->gambar))) {
            return asset('img/produks/' . $this->gambar);
        }

        if (file_exists(public_path('storage/' . $this->gambar))) {
            return asset('storage/' . $this->gambar);
        }

        return asset('img/' . $this->gambar);
    }
}