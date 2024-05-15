@extends('layouts/contentNavbarLayout')

@section('title', 'Data Produk')

@section('content')
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Produk /</span> Data
    </h4>

    @can('inventaris')
        <a href="{{ route('produk.create') }}" class="btn btn-primary mb-4">
            <span class="tf-icons mdi mdi-arrow-right-circle-outline me-1"></span>Create
        </a>

        @if (session()->has('pesan'))
            <div class="alert alert-success mb-4" role="alert">
                {{ session('pesan') }}
            </div>
        @endif
    @endcan


    <div class="card">
        <h5 class="card-header">Produk</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori Produk</th>
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
                                <td>{{ $kategori = ($produk->kategori) ? $produk->kategori->nama_kategori : 'No Kategori Data' }}</td>
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
                                            @can('admin')
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.produk.show', ['produk' => $produk]) }}"><i
                                                        class="mdi mdi-eye-outline me-1"></i> Show</a>
                                            @endcan
                                            @can('inventaris')
                                                <a class="dropdown-item"
                                                    href="{{ route('produk.show', ['produk' => $produk]) }}"><i
                                                        class="mdi mdi-eye-outline me-1"></i> Show</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('produk.edit', ['produk' => $produk]) }}"><i
                                                        class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                                <form action="{{ route('produk.destroy', ['produk' => $produk]) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="mdi mdi-trash-can-outline me-1"></i> Hapus
                                                    </button>
                                                </form>
                                            @endcan
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
