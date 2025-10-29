<form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
      onsubmit="return confirm('Yakin ingin menghapus produk ini?')" class="m-0">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-lg px-4 d-flex align-items-center">
        <i class="fas fa-trash" style="margin-right: 8px;"></i> Hapus
    </button>
</form>
