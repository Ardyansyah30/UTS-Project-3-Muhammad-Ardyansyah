@extends('layouts/contentNavbarLayout')

@section('title', ' Edit Kategori Produk')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Produk/</span> Edit Kategori</h4>

    <div class="row">
        <form method="post" action="{{ route('kategori.update', ['kategori' => $kategori]) }}">
            @method('PUT')
            @csrf
            <div class="col-xl-10">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Kategori Data</h5>
                        <small class="text-muted float-end">*Required all data</small>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-floating form-floating-outline">
                                <input name="nama_kategori" value="{{ $kategori->nama_kategori, old('nama_kategori') }}"
                                    type="text" class="form-control" id="floatingInput" placeholder="Makanan"
                                    aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Nama Kategori</label>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('nama_kategori') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="form-floating form-floating-outline">
                                <textarea name="keterangan" class="form-control h-px-100" id="exampleFormControlTextarea1"
                                    placeholder="Makanan adalah produk...">{{ $kategori->keterangan, old('keterangan') }}</textarea>
                                <label for="exampleFormControlTextarea1">Keterangan</label>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('keterangan') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Update</button>

        </form>
    </div>
@endsection
