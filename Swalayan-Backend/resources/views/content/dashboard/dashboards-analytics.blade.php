@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Admin')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <div class="row gy-4">

        <div class="col-lg-8">
            @if (session()->has('pesan'))
                <div class="alert alert-success mb-4" role="alert">
                    {{ session('pesan') }}
                </div>
            @endif
        </div>

        <!-- Transactions -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Transactions</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical mdi-24px"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                <a class="dropdown-item" href="{{ route('dashboard-analytics') }}">Refresh</a>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#reportModal">Report</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-primary rounded shadow">
                                        <i class="mdi mdi-trending-up mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Sales</div>
                                    <h5 class="mb-0">{{ $sales }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-success rounded shadow">
                                        <i class="mdi mdi-account-outline mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Customers</div>
                                    <h5 class="mb-0">{{ $customers }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-warning rounded shadow">
                                        <i class="mdi mdi-cellphone-link mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Product</div>
                                    <h5 class="mb-0">{{ $product }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-info rounded shadow">
                                        <i class="mdi mdi-currency-usd mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Revenue</div>
                                    <h5 class="mb-0">{{ 'Rp' . $revenue }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Transactions -->

        <!-- Report Modal -->
        <div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Laporan Penjualan</h4>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#modalBulanan" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Bulanan</button>
                        <button class="btn btn-secondary" data-bs-target="#modalTahunan" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Tahunan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Modal Bulanan -->
        <div class="modal fade" id="modalBulanan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Laporan Penjualan Bulanan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('laporan.bulanan') }}" method="post">
                            @csrf
                            <div class="row mb-2">
                                <div class="col mb-6 mt-2">
                                    <div class="form-floating form-floating-outline mb-6">
                                        <input name="tanggal" class="form-control" type="month" id="html5-month-input"
                                            required />
                                        <label for="html5-month-input">Month and Year</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Download</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Modal Tahunan -->
        <div class="modal fade" id="modalTahunan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Laporan Penjualan Tahunan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('laporan.tahunan') }}" method="post">
                            @csrf
                            @php
                                $now = \Carbon\Carbon::parse(now())->year;
                            @endphp
                            <div class="row mb-2">
                                <div class="col mb-6 mt-2">
                                    <div class="form-floating form-floating-outline mb-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tahun</label>
                                            <select class="form-select" name="tahun">
                                                <option value=""> -- Pilih Tahun -- </option>
                                                @for ($data = $now; $data > 2000; $data--)
                                                    <option value="{{ $data }}">{{ $data }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Download</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
