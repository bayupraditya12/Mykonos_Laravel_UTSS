<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        if (Kategori::where('nama', $request->nama)->exists()) {
            return redirect()->back()->with('msg', 'duplikat');
        }

        $simpan = Kategori::create([
            'nama' => $request->nama
        ]);

        return $simpan
            ? redirect()->route('kategori.index')->with('msg', 'sukses')
            : redirect()->back()->with('msg', 'gagal');
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update(['nama' => $request->nama]);

        return redirect()->route('kategori.index')->with('msg', 'updated');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        try {
            $kategori->delete();
            return redirect()->route('kategori.index')->with('msg', 'deleted');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('msg', 'used');
        }
    }
}
