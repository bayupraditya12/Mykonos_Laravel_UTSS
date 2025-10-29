@extends('layouts.main')

@section('content')
<div class="my-5 col-12 col-md-6">
    <h3>Edit Kategori</h3>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="shadow p-3 rounded bg-light">
        @csrf
        @method('PUT') {{-- Karena update pakai PUT --}}

        <div class="mb-3">
            <label for="kategori" class="form-label">Nama Kategori</label>
            <input type="text" id="kategori" name="nama"
                   value="{{ old('nama', $kategori->nama) }}"
                   class="form-control" required>
        </div>

        <div class="mt-3">
            <button class="btn btn-primary" type="submit">Update</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
