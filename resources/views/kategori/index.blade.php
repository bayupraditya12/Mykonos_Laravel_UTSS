@extends('layouts.main')

@section('content')
<div class="my-5 col-12 col-md-6">
    <h3>Tambah Kategori</h3>

    {{-- Alert dari session --}}
    @if (session('msg') === 'sukses')
        <div class="alert alert-success mt-3">Kategori berhasil ditambahkan.</div>
    @elseif (session('msg') === 'gagal')
        <div class="alert alert-danger mt-3">Kategori gagal ditambahkan.</div>
    @elseif (session('msg') === 'duplikat')
        <div class="alert alert-warning mt-3">Kategori sudah tersedia.</div>
    @endif

    <form action="{{ route('kategori.store') }}" method="POST" class="shadow p-3 rounded bg-light">
        @csrf
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" id="kategori" name="nama" placeholder="Masukkan nama kategori"
                class="form-control" required>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</div>

<div class="mt-3">
    <h2>List Kategori</h2>

    <div class="table-responsive mt-4 shadow rounded">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th style="width: 5%;">No.</th>
                    <th style="width: 75%;">Nama</th>
                    <th style="width: 20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($kategori->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data kategori.</td>
                    </tr>
                @else
                    @foreach ($kategori as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>
                                <a href="{{ route('kategori.show', $data->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-search"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
