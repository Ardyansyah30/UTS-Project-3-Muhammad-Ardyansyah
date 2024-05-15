<?php

namespace App\Http\Controllers\inventaris;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\OnSupply;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class OnSupplyController extends Controller
{
    public function index()
    {
        $onSupplies = OnSupply::all();
        return view('content.pages.on-supplies.index', ['onSupplies' => $onSupplies]);
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $produks = Produk::all();
        return view('content.pages.on-supplies.create', [
            'suppliers' => $suppliers,
            'produks' => $produks,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'supplier_id' => 'required',
            'produk_id' => 'required',
            'tanggal' => 'required|date',
            'quantity' => 'required|numeric|max_digits:11',
            'status' => 'required|filled|max:12',
        ]);

        $inventaris = Inventaris::where('user_id', Auth()->user()->id_user)->first();

        $validateData['inventaris_id'] = $inventaris->id_inventaris;

        if ($validateData['status'] === 'Recipient') {
            $produk = Produk::find($validateData['produk_id']);

            $produk->stock = $produk->stock + $validateData['quantity'];
            $produk->status = 'Tersedia';
            $produk->save();
        }

        OnSupply::create($validateData);

        return redirect('/on-supply')->with('pesan', 'Data created successfully');
    }
}
