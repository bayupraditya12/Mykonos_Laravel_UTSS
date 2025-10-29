<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $limit = 5;

        $produk = Produk::with('kategori')
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->orderBy('id', 'desc')
            ->paginate($limit);

        $kategori = Kategori::orderBy('nama', 'asc')->get();

        return view('produk.index', compact('produk', 'kategori', 'search'));
    }

    // 🔹 Tambahkan fungsi ini untuk menampilkan form tambah produk
    public function create()
    {
        $kategori = Kategori::orderBy('nama', 'asc')->get();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|exists:kategori,id',
            'harga' => 'required|numeric|min:0',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'detail' => 'nullable|string',
            'ketersediaan_stok' => 'required|in:tersedia,habis',
        ]);

        $foto = $request->file('foto')->store('produk', 'public');

        Produk::create([
            'nama' => $validated['nama'],
            'kategori_id' => $validated['kategori'],
            'harga' => $validated['harga'],
            'foto' => $foto,
            'detail' => $validated['detail'] ?? null,
            'ketersediaan_stok' => $validated['ketersediaan_stok'],
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::orderBy('nama', 'asc')->get();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|exists:kategori,id',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'detail' => 'nullable|string',
            'ketersediaan_stok' => 'required|in:tersedia,habis',
        ]);

        if ($request->hasFile('foto')) {
            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }
            $foto = $request->file('foto')->store('produk', 'public');
            $produk->foto = $foto;
        }

        $produk->update([
            'nama' => $validated['nama'],
            'kategori_id' => $validated['kategori'],
            'harga' => $validated['harga'],
            'detail' => $validated['detail'] ?? null,
            'ketersediaan_stok' => $validated['ketersediaan_stok'],
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
