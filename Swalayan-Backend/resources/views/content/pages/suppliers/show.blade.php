@extends('layouts/contentNavbarLayout')

@section('title', 'Show Supplier')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Supplier / </span> Show
    </h4>

    <div class="row">
        <div class="col-xxl-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Supplier</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Supplier</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $supplier->nama_supplier }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Inventaris</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $inventaris = ($supplier->onSupply[0]->inventaris) ?  $supplier->onSupply[0]->inventaris->nama : "Inventaris Deleted" ; }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">No. HP</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $supplier->no_hp }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $supplier->alamat }}</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xxl-10">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Supplying</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supplier->onSupply as $supplying)
                                    <tr>
                                        <td>{{ $supplying->produk->nama_produk }}</td>
                                        <td>{{ $supplying->quantity }}</td>
                                        <td>
                                            @if ($supplying->status === 'Ordering')
                                                <span
                                                    class="badge rounded-pill bg-label-info me-1">{{ $supplying->status }}</span>
                                            @elseif ($supplying->status === 'On Delivery')
                                                <span
                                                    class="badge rounded-pill bg-label-warning me-1">{{ $supplying->status }}</span>
                                            @else
                                                <span
                                                    class="badge rounded-pill bg-label-success me-1">{{ $supplying->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
