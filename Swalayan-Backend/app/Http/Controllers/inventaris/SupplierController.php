<?php

namespace App\Http\Controllers\inventaris;

use App\Http\Controllers\Controller;
use App\Models\OnSupply;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('content.pages.suppliers.index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.pages.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_supplier' => 'required|max:30',
            'no_hp' => 'required|numeric|max_digits:20|unique:supplier,no_hp',
            'alamat' => 'required|max:50'
        ]);

        Supplier::create($validateData);

        return redirect('/supplier')->with('pesan', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::find($id);
        return view('content.pages.suppliers.show', ['supplier' => $supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);
        return view('content.pages.suppliers.edit', ['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nama_supplier' => 'required|max:30',
            'no_hp' => 'required|numeric|max_digits:20|unique:supplier,no_hp,' . $id . ',id_supplier',
            'alamat' => 'required|max:50'
        ]);

        Supplier::where('id_supplier', $id)->update($validateData);

        return redirect('/supplier')->with('pesan', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $onSupply = OnSupply::where('supplier_id', $id)->get();

        $count = count($onSupply);

        for ($i = 1; $i <= $count; $i++) {
            OnSupply::where('supplier_id', $id)
                ->update(['supplier_id' => null]);
        }


        Supplier::destroy($id);

        return redirect('/supplier')->with('pesan', 'Data deleted successfully');
    }
}
