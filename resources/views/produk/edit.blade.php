@extends('layouts.main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Produk</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- === FORM UPDATE PRODUK === --}}
        <form id="form-edit-produk" action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="old_foto" value="{{ $produk->foto }}">

            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" name="nama" id="nama"
                       value="{{ old('nama', $produk->nama) }}"
                       class="form-control" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ $produk->kategori_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga"
                       value="{{ old('harga', $produk->harga) }}"
                       class="form-control" required>
            </div>

            <div class="form-group">
                <label>Foto Produk Sekarang</label><br>
                @if ($produk->foto)
                    <img src="{{ asset('storage/' . $produk->foto) }}" width="200" class="img-thumbnail mb-2">
                @else
                    <p><em>Belum ada foto</em></p>
                @endif
                <input type="file" name="foto" class="form-control-file" accept="image/*">
            </div>

            <div class="form-group">
                <label for="detail">Detail</label>
                <textarea name="detail" id="detail" class="form-control" rows="5">{{ old('detail', $produk->detail) }}</textarea>
            </div>

            <div class="form-group">
                <label for="ketersediaan_stok">Ketersediaan Stok</label>
                <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                    <option value="tersedia" {{ $produk->ketersediaan_stok === 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="habis" {{ $produk->ketersediaan_stok === 'habis' ? 'selected' : '' }}>Habis</option>
                </select>
            </div>
        </form>

        {{-- === Tombol Simpan & Hapus sejajar kiri === --}}
        <div class="mt-4 d-flex justify-content-start align-items-center" style="gap: 20px;">
            {{-- Tombol Simpan --}}
            <button type="submit" form="form-edit-produk"
                    class="btn btn-primary btn-lg px-4 d-flex align-items-center">
                <i class="fas fa-save" style="margin-right: 8px;"></i> Simpan
            </button>

            {{-- Tombol Hapus (form terpisah) --}}
            <div class="d-flex align-items-center">
                @include('produk.delete', ['produk' => $produk])
            </div>
        </div>

    </div>
</div>
@endsection
