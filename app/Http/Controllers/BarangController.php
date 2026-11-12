<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'nullable',
            'satuan' => 'nullable',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $nomor = (Barang::max('id_barang') ?? 0) + 1;
        $kode = 'BRG-' . str_pad($nomor, 4, '0', STR_PAD_LEFT);

        Barang::create([
            'kode_barang' => $kode,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil ditambahkan!');
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'nullable',
            'satuan' => 'nullable',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $barang->update($request->only([
            'nama_barang',
            'kategori',
            'satuan',
            'harga',
            'stok'
        ]));

        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil diperbarui!');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil dihapus!');
    }
}
