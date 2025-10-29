<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

class ProductController extends Controller
{
    private $produk = [
        ['nama' => 'Ocean Breeze', 'kategori' => 'Aquatic & Aromatic'],
        ['nama' => 'Rose Blossom', 'kategori' => 'Fresh Florals'],
        ['nama' => 'Amber Spice', 'kategori' => 'Oriental'],
        ['nama' => 'Berry Dream', 'kategori' => 'Sweet Fruity'],
        ['nama' => 'Powder Mist', 'kategori' => 'Powdery Elegance'],
        ['nama' => 'Vanilla Heaven', 'kategori' => 'Gourmand Galore'],
    ];

    public function index()
    {
        return view('componen.home', [
            'produk' => $this->produk,
            'judul' => 'Semua Produk',
        ]);
    }

    public function kategori($nama)
    {
        $filtered = array_filter($this->produk, fn($p) => $p['kategori'] === $nama);

        return view('componen.home', [
            'produk' => $filtered,
            'judul' => $nama,
        ]);
    }
}
