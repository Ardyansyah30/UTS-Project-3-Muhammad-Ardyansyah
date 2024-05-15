@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Kasir')

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
        @if ($transaksis)
            <!-- Data Tables -->
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('transaksi.store') }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-truncate">No</th>
                                        <th class="text-truncate">ID Produk</th>
                                        <th class="text-truncate">Nama Produk</th>
                                        <th class="text-truncate">Quantity</th>
                                        <th class="text-truncate">Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($transaksis as $transaksi)
                                        <tr>
                                            <th class="text-truncate">{{ $loop->index + 1 }}</th>
                                            <input type="hidden" name="produk_id[]" value="{{ $transaksi['id_produk'] }}">
                                            <th class="text-truncate">{{ $transaksi['id_produk'] }}</th>
                                            <th class="text-truncate">{{ $transaksi['nama_produk'] }}</th>
                                            <input type="hidden" name="quantity[]" value="{{ $transaksi['quantity'] }}">
                                            <th class="text-truncate">{{ $transaksi['quantity'] }}</th>
                                            <input type="hidden" name="biaya[]" value="{{ $transaksi['biaya'] }}">
                                            <th class="text-truncate">{{ 'Rp' . $transaksi['biaya'] }}</th>
                                        </tr>
                                        @php
                                            $total = $total + $transaksi['biaya'];
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-content">
                            <div class="row mt-2 mb-3 ms-2">
                                <label class="col-sm-2 col-form-label"><b>Total Biaya</b></label>
                                <label class="col-sm-1 col-form-label">:</label>
                                <input type="hidden" name="total" value="{{ $total }}">
                                <label class="col-sm-8 col-form-label">{{ 'Rp' . $total }}</label>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Finish Transaction</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/ Data Tables -->
        @else
            <!-- Point of Sales -->
            <div class="col-lg-12">

                @if (session()->has('pesan'))
                    <div class="alert alert-success mb-4 col-md-12" role="alert">
                        {{ session('pesan') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Point of Sales</h5>
                        </div>
                    </div>
                    @csrf
                    <form action="{{ route('transaksi') }}" method="post">
                        @csrf
                        <div id="item" class="card-body">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6 col-6 me-3">
                                    <select name="id_produk[]" id="largeSelect" class="form-select form-select-lg" required>
                                        <option value=""> -- Pilh Produk -- </option>
                                        @foreach ($produks as $produk)
                                            <option value="{{ $produk->id_produk }}" @selected(old('id_produk') == $produk->id_produk)>
                                                {{ $produk->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 col-3 me-3">
                                    <div class="form-floating form-floating-outline">
                                        <input name="quantity[]" value="{{ old('quantity') }}" type="number"
                                            class="form-control" id="floatingInput" placeholder="100"
                                            aria-describedby="floatingInputHelp" required />
                                        <label for="floatingInput">Quantity</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-3">
                                    <button id="add" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
            <!--/ Point of Sales -->
        @endif
    </div>
@endsection
