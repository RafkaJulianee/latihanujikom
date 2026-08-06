<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'nama',
        'username',
        'password',
        'email',
    ];

    // Relasi HasMany ke Produk, Galeri, dan Artikel
    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_admin', 'id_admin');
    }

    public function galeris()
    {
        return $this->hasMany(Galeri::class, 'id_admin', 'id_admin');
    }

    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'id_admin', 'id_admin');
    }
}