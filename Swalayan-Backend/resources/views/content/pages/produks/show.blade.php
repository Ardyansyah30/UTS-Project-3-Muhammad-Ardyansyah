@extends('layouts/contentNavbarLayout')

@section('title', 'Show Produk')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Produk / </span> Show
    </h4>

    <div class="row">
        <div class="col-xxl-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Produk</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Produk</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $produk->nama_produk }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Harga Produk</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $produk->harga_produk }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Stock</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $produk->stock }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $produk->status }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Deskripsi</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $produk->deskripsi }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kategori Produk</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $produk->kategori->nama_kategori }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
