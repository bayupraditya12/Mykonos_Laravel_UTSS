@extends('layouts.main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Detail Kategori</h1>

{{-- Alert dari session --}}
@if(session('msg') === 'updated')
    <div class="alert alert-success">Kategori berhasil diupdate.</div>
@elseif(session('msg') === 'deleted')
    <div class="alert alert-primary">Kategori berhasil dihapus.</div>
@elseif(session('msg') === 'used')
    <div class="alert alert-warning">Kategori tidak bisa dihapus karena dipakai produk.</div>
@elseif(session('msg') === 'error')
    <div class="alert alert-danger">Terjadi kesalahan.</div>
@endif

<form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="kategori">Kategori</label>
        <input type="text" class="form-control" id="kategori" name="nama" value="{{ old('nama', $kategori->nama) }}">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>

    <a href="{{ route('kategori.destroy', $kategori->id) }}"
       class="btn btn-danger"
       onclick="event.preventDefault(); if(confirm('Yakin hapus kategori ini?')) document.getElementById('delete-form').submit();">
       Delete
    </a>
</form>

<form id="delete-form" action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection
