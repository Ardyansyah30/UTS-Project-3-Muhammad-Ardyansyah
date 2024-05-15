@extends('layouts/contentNavbarLayout')

@section('title', ' Create On Supply')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">On Supply/</span> Create</h4>

    <div class="row">
        <form method="post" action="{{ route('on-supply.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-xl-10">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">On Supply Data</h5>
                        <small class="text-muted float-end">*Required all data</small>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <select name="supplier_id" id="largeSelect" class="form-select form-select-lg">
                                <option value=""> -- Pilh Supplier -- </option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id_supplier }}" @selected(old('supplier_id') == $supplier->id_supplier)>
                                        {{ $supplier->nama_supplier }}</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('supplier_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <select name="produk_id" id="largeSelect" class="form-select form-select-lg">
                                <option value=""> -- Pilh Produk -- </option>
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id_produk }}" @selected(old('produk_id') == $produk->id_produk)>
                                        {{ $produk->nama_produk }}</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('produk_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="form-floating form-floating-outline">
                                <input name="quantity" value="{{ old('quantity') }}" type="number" class="form-control"
                                    id="floatingInput" placeholder="100" aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Quantity</label>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="form-floating form-floating-outline">
                                <input name="tanggal" value="{{ old('tanggal') }}" class="form-control" type="date"
                                    id="html5-date-input" />
                                <label for="html5-date-input">Tanggal</label>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('tanggal') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <select name="status" id="largeSelect" class="form-select form-select-lg">
                                <option value=""> -- Pilh Status -- </option>
                                <option value="Ordering" @selected(old('status') == 'Ordering')>Ordering</option>
                                <option value="On Delivery" @selected(old('status') == 'On Delivery')>On Delivery</option>
                                <option value="Recipient" @selected(old('status') == 'Recipient')>Recipient</option>
                            </select>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

        </form>
    </div>
@endsection
