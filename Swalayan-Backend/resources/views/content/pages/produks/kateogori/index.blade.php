@extends('layouts/contentNavbarLayout')

@section('title', 'Data Kategori Produk')

@section('content')
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Produk /</span> Kategori
    </h4>

    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-4">
        <span class="tf-icons mdi mdi-arrow-right-circle-outline me-1"></span>Create
    </a>

    @if (session()->has('pesan'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('pesan') }}
        </div>
    @endif

    <div class="card">
        <h5 class="card-header">Kategori Produk</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $kategori)
                            <tr>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('kategori.show', ['kategori' => $kategori]) }}"><i
                                                    class="mdi mdi-eye-outline me-1"></i> Show</a>
                                            <a class="dropdown-item"
                                                href="{{ route('kategori.edit', ['kategori' => $kategori]) }}"><i
                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <form action="{{ route('kategori.destroy', ['kategori' => $kategori]) }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="mdi mdi-trash-can-outline me-1"></i> Hapus
                                                </button>
                                            </form>
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
