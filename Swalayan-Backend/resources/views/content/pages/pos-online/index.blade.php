@extends('layouts/contentNavbarLayout')

@section('title', 'Data POS-Online')

@section('content')
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Point of Sales Online /</span> Data
    </h4>

    @if (session()->has('pesan'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('pesan') }}
        </div>
    @endif

    <div class="card">
        <h5 class="card-header">Point of Sales Online</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nota</th>
                            <th>Tanggal</th>
                            <th>Total Biaya</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $transaksi->nota }}</td>
                                <td>{{ $transaksi->tanggal }}</td>
                                <td>{{ $transaksi->total_biaya }}</td>
                                <td>
                                    <span class="badge rounded-pill bg-label-warning me-1">{{ $transaksi->status }}</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('pos-online.complete', ['transaksi' => $transaksi]) }}"
                                                method="post">
                                                @csrf

                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="mdi mdi-check me-1"></i> Complete Transaction
                                                </button>
                                            </form>
                                            <a class="dropdown-item"
                                                href="{{ route('pos-online.show', ['transaksi' => $transaksi]) }}"><i
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
