@extends('layouts/contentNavbarLayout')

@section('title', ' Edit Produk')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Produk/</span> Edit</h4>

    <div class="row">
        <form method="post" action="{{ route('produk.update', ['produk' => $produk]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-xl-10">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Produk Data</h5>
                        <small class="text-muted float-end">*Required all data</small>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">File Photo Produk</label>
                            <input name="img_url" class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <div class="form-floating form-floating-outline">
                                <input name="nama_produk" value="{{ $produk->nama_produk, old('nama_produk') }}"
                                    type="text" class="form-control" id="floatingInput"
                                    placeholder="Ultra Milk Rasa Cokelat 250 ml" aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Nama Produk</label>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('nama_produk') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="form-floating form-floating-outline">
                                <input name="harga_produk" value="{{ $produk->harga_produk, old('harga_produk') }}"
                                    type="number" class="form-control" id="floatingInput" placeholder="6000"
                                    aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Harga Produk</label>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('harga_produk') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <select name="kategori_id" id="largeSelect" class="form-select form-select-lg">
                                <option value=""> -- Pilh Kategori Produk -- </option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id_kategori }}" @selected($produk->kategori_id == $kategori->id_kategori)>
                                        {{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('kategori_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="form-floating form-floating-outline">
                                <input name="stock" value="{{ $produk->stock, old('stock') }}" type="number"
                                    class="form-control" id="floatingInput" placeholder="100"
                                    aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Stock</label>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('stock') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <select name="status" id="largeSelect" class="form-select form-select-lg">
                                <option value=""> -- Pilh Status -- </option>
                                <option value="Tersedia" @selected($produk->status === 'Tersedia')>Tersedia</option>
                                <option value="Kosong" @selected($produk->status === 'Kosong')>Kosong</option>
                            </select>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="form-floating form-floating-outline">
                                <textarea name="deskripsi" class="form-control h-px-100" id="exampleFormControlTextarea1"
                                    placeholder="Ultra Milk Rasa Cokelat adalah produk susu...">{{ $produk->deskripsi, old('deskripsi') }}</textarea>
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('deskripsi') }}
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
