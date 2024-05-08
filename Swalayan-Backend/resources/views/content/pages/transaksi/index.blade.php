@extends('layouts/contentNavbarLayout')

@section('title', 'Data Transaksi')

@section('content')
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Transaksi /</span> Data
    </h4>

    <div class="card">
        <h5 class="card-header">Transaksi</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nota</th>
                            <th>Total Biaya</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $transaksi->nota }}</td>
                                <td>{{ $transaksi->total_biaya }}</td>
                                <td>
                                    @if ($transaksi->status === 'Selesai')
                                        <span class="badge rounded-pill bg-label-success me-1">{{ $transaksi->status }}</span>
                                    @else
                                        <span class="badge rounded-pill bg-label-warning me-1">{{ $transaksi->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('transaksi.show', ['transaksi' => $transaksi]) }}"><i
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
