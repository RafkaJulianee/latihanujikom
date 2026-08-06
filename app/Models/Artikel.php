<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';
    protected $primaryKey = 'id_artikel';

    protected $fillable = [
        'id_admin',
        'judul',
        'isi',
        'gambar',
        'tanggal',
    ];

    // Relasi balik ke Admin (BelongsTo)
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}