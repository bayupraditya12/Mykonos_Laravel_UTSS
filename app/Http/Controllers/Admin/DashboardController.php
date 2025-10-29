<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahKategori = Kategori::count();
        $jumlahUser = User::count();
        $jumlahProduk = Produk::count();

        return view('admin.dashboard.index', compact('jumlahKategori', 'jumlahUser', 'jumlahProduk'));
    }
}
