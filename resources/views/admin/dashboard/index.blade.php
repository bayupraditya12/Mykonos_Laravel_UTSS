@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h4 class="fw-bold mb-4">Selamat Datang, Admin Mykonos!</h4>

    <div class="row g-4">
        {{-- Card Kategori --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-white" style="background-color: #28a745; border-radius: 15px;">
                <div class="card-body position-relative">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title">Kategori Produk</h5>
                            <h2 class="fw-bold">{{ $jumlahKategori }}</h2>
                            <a href="{{ route('kategori.index') }}" class="text-white fw-semibold">Lihat Detail</a>
                        </div>
                        <i class="fas fa-list fa-4x opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card User --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-white" style="background-color: #007bff; border-radius: 15px;">
                <div class="card-body position-relative">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title">Total User</h5>
                            <h2 class="fw-bold">{{ $jumlahUser }}</h2>
                            <a href="{{ route('admin.users.index') }}" class="text-white fw-semibold">Lihat Detail</a>
                        </div>
                        <i class="fas fa-users fa-4x opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Produk (Warna Oranye) --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-white" style="background-color: #ff9800; border-radius: 15px;">
                <div class="card-body position-relative">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title">Total Produk</h5>
                            <h2 class="fw-bold">{{ $jumlahProduk }}</h2>
                            <a href="{{ route('produk.index') }}" class="text-white fw-semibold">Lihat Detail</a>
                        </div>
                        <i class="fas fa-box fa-4x opacity-25"></i> {{-- Ikon produk mirip seperti logo biru putih --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
