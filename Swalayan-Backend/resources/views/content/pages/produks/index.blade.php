@extends('layouts/contentNavbarLayout')

@section('title', 'Data Produk')

@section('content')
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Produk /</span> Data
    </h4>

    <div class="card">
        <h5 class="card-header">Produk</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                            <tr>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->harga_produk }}</td>
                                <td>{{ $produk->stock }}</td>
                                <td>
                                    @if ($produk->status === 'Tersedia')
                                        <span class="badge rounded-pill bg-label-success me-1">{{ $produk->status }}</span>
                                    @else
                                        <span class="badge rounded-pill bg-label-danger me-1">{{ $produk->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('produk.show', ['produk' => $produk]) }}"><i
                                                    class="mdi mdi-eye-outline me-1"></i> Show</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
