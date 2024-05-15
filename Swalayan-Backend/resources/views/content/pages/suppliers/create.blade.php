@extends('layouts/contentNavbarLayout')

@section('title', ' Create Supplier')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Supplier/</span> Create</h4>

    <div class="row">
        <form method="post" action="{{ route('supplier.store') }}">
            @csrf
            <div class="col-xl-10">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Supplier Data</h5>
                        <small class="text-muted float-end">*Required all data</small>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-floating form-floating-outline">
                                <input name="nama_supplier" value="{{ old('nama_supplier') }}" type="text"
                                    class="form-control" id="floatingInput" placeholder="CV Jailani Fujiati"
                                    aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Nama Supplier</label>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('nama_supplier') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="form-floating form-floating-outline">
                                <input name="no_hp" value="{{ old('no_hp') }}" type="text" class="form-control"
                                    id="floatingInput" placeholder="08xxxxxxxx" aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">No. HP</label>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('no_hp') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="form-floating form-floating-outline">
                                <textarea name="alamat" class="form-control h-px-100" id="exampleFormControlTextarea1" placeholder="Jl. Jati">{{ old('alamat') }}</textarea>
                                <label for="exampleFormControlTextarea1">Alamat</label>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('alamat') }}
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
