@extends('app')

@section('content')
<div class="row">
    <!-- Sidebar kiri -->
    <div class="col-md-3">
        @include('componens.sidebar')
    </div>

    <!-- Konten kanan -->
    <div class="col-md-9">
        <div id="main-content">
            <h4 class="fw-bold mb-3">{{ $judul ?? 'Semua Produk' }}</h4>

            <div class="row">
                @forelse ($produk ?? [] as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm border-0 h-100">

                            {{-- Tambahan gambar produk --}}
                            @if (!empty($item['gambar']))
                                <div class="d-flex align-items-center justify-content-center bg-white rounded-top" 
                                     style="height: 200px; overflow: hidden;">
                                    <img src="{{ $item['gambar'] }}" 
                                         class="img-fluid"
                                         alt="{{ $item['nama'] ?? 'Produk' }}"
                                         style="max-height: 180px; object-fit: contain;">
                                </div>
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-white rounded-top" 
                                     style="height: 200px; overflow: hidden;">
                                    <img src="{{ asset('images/default.jpg') }}" 
                                         class="img-fluid"
                                         alt="Default"
                                         style="max-height: 180px; object-fit: contain;">
                                </div>
                            @endif

                            <div class="card-body p-3 text-center">
                                <h6 class="card-title mb-1">{{ $item['nama'] ?? '-' }}</h6>
                                <small class="text-muted d-block">{{ $item['kategori'] ?? 'Tanpa kategori' }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-light border text-center py-3" role="alert">
                            Tidak ada produk untuk kategori ini.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
