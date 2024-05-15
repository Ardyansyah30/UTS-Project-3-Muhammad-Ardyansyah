@extends('layouts/contentNavbarLayout')

@section('title', ' Profile Users')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Profile/</span> Index</h4>

    @if (session()->has('pesan'))
        <div class="alert alert-success mb-4 col-md-10" role="alert">
            {{ session('pesan') }}
        </div>
    @endif

    <div class="row">
        <form method="post" action="{{ route('profile.update', ['id' => $profile->id_user]) }}">
            @method('PUT')
            @csrf
            <div class="col-xl-10">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Profile</h5> <small class="text-muted float-end">*Required all data</small>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input name="email" value="{{ $profile->email, old('email') }}" type="text"
                                        id="basic-default-email" class="form-control" placeholder="ardyansyah.muhammad"
                                        aria-label="ardy.muhammad" aria-describedby="basic-default-email2" />
                                    <label for="basic-default-email">Email</label>
                                </div>
                                <span class="input-group-text" id="basic-default-email2">@example.com</span>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @else
                                <div class="form-text"> You can use letters, numbers & periods </div>
                            @endif
                        </div>

                        @if ($profile->role === 'Inventaris')

                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="nama" value="{{ $profile->inventaris->nama, old('nama') }}"
                                        type="text" class="form-control" id="floatingInput"
                                        placeholder="Muhammad Ardyansyah" aria-describedby="floatingInputHelp" />

                                    <label for="floatingInput">Nama</label>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('nama') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="nik" value="{{ $profile->inventaris->nik, old('nik') }}" type="text"
                                        class="form-control" id="floatingInput" placeholder="14030xxxxxxxxxx"
                                        aria-describedby="floatingInputHelp" />
                                    <label for="floatingInput">NIK</label>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('nik') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <select name="jenis_kelamin" id="largeSelect" class="form-select form-select-lg">
                                    <option value=""> -- Pilh Jenis Kelamin -- </option>
                                    <option value="Laki-Laki" @selected($profile->inventaris->jenis_kelamin == 'Laki-Laki')>Laki-Laki</option>
                                    <option value="Perempuan" @selected($profile->inventaris->jenis_kelamin == 'Perempuan')>Perempuan</option>
                                </select>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('jenis_kelamin') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="tempat_lahir"
                                        value="{{ $profile->inventaris->tempat_lahir, old('tempat_lahir') }}" type="text"
                                        class="form-control" id="floatingInput" placeholder="Padang"
                                        aria-describedby="floatingInputHelp" />
                                    <label for="floatingInput">Tempat Lahir</label>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('tempat_lahir') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="tanggal_lahir"
                                        value="{{ $profile->inventaris->tanggal_lahir, old('tanggal_lahir') }}"
                                        class="form-control" type="date" id="html5-date-input" />
                                    <label for="html5-date-input">Tanggal Lahir</label>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('tanggal_lahir') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="no_hp" value="{{ $profile->inventaris->no_hp, old('no_hp') }}"
                                        type="text" class="form-control" id="floatingInput" placeholder="08xxxxxxxx"
                                        aria-describedby="floatingInputHelp" />
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
                                    <textarea name="alamat" class="form-control h-px-100" id="exampleFormControlTextarea1" placeholder="Jl. Jati">{{ $profile->inventaris->alamat, old('alamat') }}</textarea>
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('alamat') }}
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="nama" value="{{ $profile->kasir->nama, old('nama') }}"
                                        type="text" class="form-control" id="floatingInput"
                                        placeholder="Muhammad Ardyansyah" aria-describedby="floatingInputHelp" />

                                    <label for="floatingInput">Nama</label>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('nama') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="nik" value="{{ $profile->kasir->nik, old('nik') }}" type="text"
                                        class="form-control" id="floatingInput" placeholder="14030xxxxxxxxxx"
                                        aria-describedby="floatingInputHelp" />
                                    <label for="floatingInput">NIK</label>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('nik') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <select name="jenis_kelamin" id="largeSelect" class="form-select form-select-lg">
                                    <option value=""> -- Pilh Jenis Kelamin -- </option>
                                    <option value="Laki-Laki" @selected($profile->kasir->jenis_kelamin == 'Laki-Laki')>Laki-Laki</option>
                                    <option value="Perempuan" @selected($profile->kasir->jenis_kelamin == 'Perempuan')>Perempuan</option>
                                </select>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('jenis_kelamin') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="tempat_lahir"
                                        value="{{ $profile->kasir->tempat_lahir, old('tempat_lahir') }}" type="text"
                                        class="form-control" id="floatingInput" placeholder="Padang"
                                        aria-describedby="floatingInputHelp" />
                                    <label for="floatingInput">Tempat Lahir</label>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('tempat_lahir') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="tanggal_lahir"
                                        value="{{ $profile->kasir->tanggal_lahir, old('tanggal_lahir') }}"
                                        class="form-control" type="date" id="html5-date-input" />
                                    <label for="html5-date-input">Tanggal Lahir</label>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('tanggal_lahir') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="no_hp" value="{{ $profile->kasir->no_hp, old('no_hp') }}"
                                        type="text" class="form-control" id="floatingInput" placeholder="08xxxxxxxx"
                                        aria-describedby="floatingInputHelp" />
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
                                    <textarea name="alamat" class="form-control h-px-100" id="exampleFormControlTextarea1" placeholder="Jl. Jati">{{ $profile->kasir->alamat, old('alamat') }}</textarea>
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="form-text text-danger">
                                        {{ $errors->first('alamat') }}
                                    </div>
                                @endif
                            </div>

                        @endif
                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Update</button>
        </form>
    </div>
@endsection
