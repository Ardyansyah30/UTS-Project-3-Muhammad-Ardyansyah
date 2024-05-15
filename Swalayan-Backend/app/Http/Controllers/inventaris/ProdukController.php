<?php

namespace App\Http\Controllers\inventaris;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('content.pages.produks.index', ['produks' => $produks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriProduk::all();
        return view('content.pages.produks.create', ['kategoris' => $kategoris]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_produk' => 'required|max:80',
            'harga_produk' => 'required|numeric|max_digits:11',
            'kategori_id' => 'required',
            'stock' => 'required|numeric|max_digits:11',
            'status' => 'required|filled|max:15',
            'deskripsi' => 'required|max:80',
            'img_url' => 'required|image|mimes:png,jpg'
        ]);

        $namaFile = 'img_produk_' . time() . '_' . $request->img_url->getClientOriginalName();
        $request->img_url->move('assets/img/produk', $namaFile);

        $validateData['img_url'] = "http://127.0.0.1:8000/assets/img/produk/" . $namaFile;

        Produk::create($validateData);

        return redirect('/produk')->with('pesan', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $produk = produk::find($id);
        return view('content.pages.produks.show', ['produk' => $produk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::find($id);
        $kategoris = KategoriProduk::all();
        return view('content.pages.produks.edit', ['produk' => $produk, 'kategoris' => $kategoris]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nama_produk' => 'required|max:80',
            'harga_produk' => 'required|numeric|max_digits:11',
            'kategori_id' => 'required',
            'stock' => 'required|numeric|max_digits:11',
            'status' => 'required|filled|max:15',
            'deskripsi' => 'required|max:80',
        ]);

        $produk = Produk::find($id);

        if ($request->img_url) {
            $validateImage = $request->validate([
                'img_url' => 'required|image|mimes:png,jpg'
            ]);
            $namaFile = 'img_produk_' . time() . '_' . $request->img_url->getClientOriginalName();
            $request->img_url->move('assets/img/produk', $namaFile);

            $validateImage = "http://127.0.0.1:8000/assets/img/produk/" . $namaFile;

            $produk->img_url = $validateImage;
        }

        $produk->nama_produk = $validateData['nama_produk'];
        $produk->kategori_id = $validateData['kategori_id'];
        $produk->harga_produk = $validateData['harga_produk'];
        $produk->stock = $validateData['stock'];
        $produk->status = $validateData['status'];
        $produk->deskripsi = $validateData['deskripsi'];
        $produk->save();

        return redirect('/produk')->with('pesan', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::destroy($id);

        return redirect('/produk')->with('pesan', 'Data deleted successfully');
    }
}
