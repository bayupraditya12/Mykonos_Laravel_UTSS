<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    /**
     * Relasi ke tabel produk (one to many)
     * Satu kategori bisa memiliki banyak produk
     */
    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}
