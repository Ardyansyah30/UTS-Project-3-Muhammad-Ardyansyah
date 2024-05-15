@extends('layouts/contentNavbarLayout')

@section('title', 'Show Kategori')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Produk / </span> Show Kategori
    </h4>

    <div class="row">
        <div class="col-xxl-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Kategori</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Kategori</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $kategori->nama_kategori }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Keterangan</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $kategori->keterangan }}</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
