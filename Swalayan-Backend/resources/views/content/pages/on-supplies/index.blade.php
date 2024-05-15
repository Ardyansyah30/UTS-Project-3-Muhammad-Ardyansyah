@extends('layouts/contentNavbarLayout')

@section('title', 'Data On-Supply')

@section('content')
    <h4 class="py-3 mb-2"><span class="text-muted fw-light">On-Supply /</span> Data
    </h4>

    <a href="{{ route('on-supply.create') }}" class="btn btn-primary mb-4">
        <span class="tf-icons mdi mdi-arrow-right-circle-outline me-1"></span>Create
    </a>

    @if (session()->has('pesan'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('pesan') }}
        </div>
    @endif


    <div class="card">
        <h5 class="card-header">On-Supply</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama Supplier</th>
                            <th>Nama Produk</th>
                            <th>Tanggal</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>PJ Inventaris</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($onSupplies as $onSupply)
                            <tr>
                                <td>{{ $onSupply->supplier->nama_supplier }}</td>
                                <td>{{ $onSupply->produk->nama_produk }}</td>
                                <td>{{ \Carbon\Carbon::parse($onSupply->tanggal)->format('d F Y') }}</td>
                                <td>{{ $onSupply->quantity }}</td>
                                <td>
                                    @if ($onSupply->status === 'Ordering')
                                        <span class="badge rounded-pill bg-label-info me-1">{{ $onSupply->status }}</span>
                                    @elseif ($onSupply->status === 'On Delivery')
                                        <span
                                            class="badge rounded-pill bg-label-warning me-1">{{ $onSupply->status }}</span>
                                    @elseif ($onSupply->status === 'Recipient')
                                        <span
                                            class="badge rounded-pill bg-label-success me-1">{{ $onSupply->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $onSupply->inventaris->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
