@extends('layouts/contentNavbarLayout')

@section('title', 'Data Supplier')

@section('content')
    <h4 class="py-3 mb-2"><span class="text-muted fw-light">Supplier /</span> Data
    </h4>

    @can('inventaris')
        <a href="{{ route('supplier.create') }}" class="btn btn-primary mb-4">
            <span class="tf-icons mdi mdi-arrow-right-circle-outline me-1"></span>Create
        </a>

        @if (session()->has('pesan'))
            <div class="alert alert-success mb-4" role="alert">
                {{ session('pesan') }}
            </div>
        @endif
    @endcan


    <div class="card">
        <h5 class="card-header">Supplier</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama Supplier</th>
                            <th>No. HP</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->nama_supplier }}</td>
                                <td>{{ $supplier->no_hp }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            @can('admin')
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.supplier.show', ['supplier' => $supplier]) }}"><i
                                                        class="mdi mdi-eye-outline me-1"></i> Show</a>
                                            @endcan
                                            @can('inventaris')
                                                <a class="dropdown-item"
                                                    href="{{ route('supplier.show', ['supplier' => $supplier]) }}"><i
                                                        class="mdi mdi-eye-outline me-1"></i> Show</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('supplier.edit', ['supplier' => $supplier]) }}"><i
                                                        class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                                <form action="{{ route('supplier.destroy', ['supplier' => $supplier]) }}"
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
