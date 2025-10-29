@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h4>Kelola Produk</h4>

    {{-- Alert sukses / error --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Tombol Tambah Produk --}}
    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    {{-- Form pencarian --}}
    <form method="GET" action="{{ route('produk.index') }}" class="d-flex mb-3" style="max-width: 350px;">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari Produk..." value="{{ $search }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>

    {{-- Tabel produk --}}
    <div class="table-responsive mb-5">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Foto</th> {{-- Kolom foto baru --}}
                    <th>Ketersediaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produk as $index => $p)
                    <tr>
                        <td>{{ $produk->firstItem() + $index }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->kategori->nama ?? '-' }}</td>
                        <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>

                        {{-- Tambahkan tampilan foto --}}
                        <td class="text-center">
                            @if($p->foto && file_exists(public_path('storage/' . $p->foto)))
                                <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto {{ $p->nama }}" width="60" height="60" class="rounded shadow-sm">
                            @else
                                <img src="{{ asset('img/no-image.png') }}" alt="Tidak ada foto" width="60" height="60" class="rounded shadow-sm">
                            @endif
                        </td>

                        <td>
                            @if($p->ketersediaan_stok == 'tersedia')
                                <span class="badge bg-success">Tersedia</span>
                            @else
                                <span class="badge bg-danger">Habis</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('produk.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">Tidak ada data produk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $produk->appends(['search' => $search])->links() }}
    </div>
</div>
@endsection
