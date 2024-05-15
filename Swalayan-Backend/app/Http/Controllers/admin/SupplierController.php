<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('content.pages.suppliers.index', ['suppliers' => $suppliers]);
    }
    
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('content.pages.suppliers.show', ['supplier' => $supplier]);
    }
}
