<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'kategori_id',
        'harga',
        'foto',
        'detail',
        'ketersediaan_stok',
    ];

    /**
     * Relasi ke tabel kategori (many to one)
     * Setiap produk memiliki satu kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
