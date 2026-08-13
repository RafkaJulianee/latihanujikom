<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Admin
 * 
 * Model entitas data Administrator yang memiliki akses ke Panel Kontrol Admin.
 * 
 * @package App\Models
 * @property int $id_admin
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Nama tabel database yang terasosiasi dengan model ini.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * Nama primary key tabel.
     *
     * @var string
     */
    protected $primaryKey = 'id_admin';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'username',
        'password',
        'email',
    ];

    /**
     * Atribut yang harus disembunyikan saat serialisasi model.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Relasi HasMany ke entitas Produk / Layanan yang dibuat admin ini.
     *
     * @return HasMany
     */
    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class, 'id_admin', 'id_admin');
    }

    /**
     * Relasi HasMany ke entitas Galeri / Portofolio yang dibuat admin ini.
     *
     * @return HasMany
     */
    public function galeris(): HasMany
    {
        return $this->hasMany(Galeri::class, 'id_admin', 'id_admin');
    }

    /**
     * Relasi HasMany ke entitas Artikel / Blog yang dibuat admin ini.
     *
     * @return HasMany
     */
    public function artikels(): HasMany
    {
        return $this->hasMany(Artikel::class, 'id_admin', 'id_admin');
    }
}