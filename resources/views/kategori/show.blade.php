@extends('layouts.main')

@section('content')
<div class="my-5 col-12 col-md-6">
    <h3>Detail Kategori</h3>

    <div class="card shadow p-3">
        <p><strong>Nama:</strong> {{ $kategori->nama }}</p>
    </div>

    <div class="mt-3">
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">
                Hapus
            </button>
        </form>
    </div>
</div>
@endsection
