@extends('layouts/contentNavbarLayout')

@section('title', 'Show Transaksi')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Transaksi / </span> Show
    </h4>

    <div class="row">
        <div class="col-xxl-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Transaksi</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nota</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $transaksi->nota }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tanggal</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $transaksi->tanggal }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Total Biaya</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $transaksi->total_biaya }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $transaksi->status }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Petugas Kasir</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $kasir =  ($transaksi->kasir) ? $transaksi->kasir->nama : 'Kasir Deleted' }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Pelanggan</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label
                            class="col-sm-8 col-form-label">{{ $pelanggan = $transaksi->pelanggan ? $transaksi->pelanggan->nama : 'Pelanggan Unknown' }}</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xxl-10">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Detail</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Quantity</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi->detailTransaksi as $detail)
                                    <tr>
                                        <td>{{ $detail->produk->nama_produk }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ $detail->biaya }}</td>
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
