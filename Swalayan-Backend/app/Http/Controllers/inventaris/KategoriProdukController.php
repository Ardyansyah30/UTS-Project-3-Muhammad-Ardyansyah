<?php

namespace App\Http\Controllers\inventaris;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = KategoriProduk::all();
        return view('content.pages.produks.kateogori.index', ['kategoris' => $kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.pages.produks.kateogori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_kategori' => 'required|max:15',
            'keterangan' => 'required|max:50'
        ]);

        KategoriProduk::create($validateData);

        return redirect('/produk/kategori')->with('pesan', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = KategoriProduk::find($id);
        return view('content.pages.produks.kateogori.show', ['kategori' => $kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = KategoriProduk::find($id);
        return view('content.pages.produks.kateogori.edit', ['kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nama_kategori' => 'required|max:15',
            'keterangan' => 'required|max:50'
        ]);

        KategoriProduk::where('id_kategori', $id)->update($validateData);

        return redirect('/produk/kategori')->with('pesan', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::where('kategori_id', $id)->get();

        $count = count($produk);

        for ($i = 1; $i <= $count; $i++) {
            Produk::where('kategori_id', $id)
                ->update(['kategori_id' => null]);
        }

        KategoriProduk::destroy($id);

        return redirect('/produk/kategori')->with('pesan', 'Data deleted successfully');
    }
}
