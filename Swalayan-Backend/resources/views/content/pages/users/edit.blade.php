@extends('layouts/contentNavbarLayout')

@section('title', ' Edit Users')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Users/</span> Edit</h4>

    @if (session()->has('pesan'))
        <div class="alert alert-warning mb-4 col-md-10" role="alert">
            {{ session('pesan') }}
        </div>
    @endif

    <div class="row">
        <form method="post" action="{{ route('users.update', ['user' => $user]) }}">
            @method('PUT')
            @csrf
            <div class="col-xl-10">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Users</h5> <small class="text-muted float-end">*Required all data</small>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input name="email" value="{{ $user->email, old('email') }}" type="text"
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
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input name="password" type="password" id="password" class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <select name="role" id="largeSelect" class="form-select form-select-lg">
                                <option value=""> -- Pilih Role -- </option>
                                <option value="Inventaris" @selected($user->role == 'Inventaris')>Inventaris</option>
                                <option value="Kasir" @selected($user->role == 'Kasir')>Kasir</option>
                            </select>
                            @if (count($errors) > 0)
                                <div class="form-text text-danger">
                                    {{ $errors->first('role') }}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            @if ($user->role === 'Inventaris')
                <div class="col-xl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Detail Users</h5>
                            <small class="text-muted float-end">*Required all data</small>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="nama" value="{{ $user->inventaris->nama, old('nama') }}" type="text"
                                        class="form-control" id="floatingInput" placeholder="Muhammad Ardyansyah"
                                        aria-describedby="floatingInputHelp" />

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
                                    <input name="nik" value="{{ $user->inventaris->nik, old('nik') }}" type="text"
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
                                    <option value="Laki-Laki" @selected($user->inventaris->jenis_kelamin == 'Laki-Laki')>Laki-Laki</option>
                                    <option value="Perempuan" @selected($user->inventaris->jenis_kelamin == 'Perempuan')>Perempuan</option>
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
                                        value="{{ $user->inventaris->tempat_lahir, old('tempat_lahir') }}" type="text"
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
                                        value="{{ $user->inventaris->tanggal_lahir, old('tanggal_lahir') }}"
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
                                    <input name="no_hp" value="{{ $user->inventaris->no_hp, old('no_hp') }}"
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
                                    <textarea name="alamat" class="form-control h-px-100" id="exampleFormControlTextarea1" placeholder="Jl. Jati">{{ $user->inventaris->alamat, old('alamat') }}</textarea>
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
            @else
                <div class="col-xl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Detail Users</h5>
                            <small class="text-muted float-end">*Required all data</small>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input name="nama" value="{{ $user->kasir->nama, old('nama') }}" type="text"
                                        class="form-control" id="floatingInput" placeholder="Muhammad Ardyansyah"
                                        aria-describedby="floatingInputHelp" />

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
                                    <input name="nik" value="{{ $user->kasir->nik, old('nik') }}" type="text"
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
                                    <option value="Laki-Laki" @selected($user->kasir->jenis_kelamin == 'Laki-Laki')>Laki-Laki</option>
                                    <option value="Perempuan" @selected($user->kasir->jenis_kelamin == 'Perempuan')>Perempuan</option>
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
                                        value="{{ $user->kasir->tempat_lahir, old('tempat_lahir') }}" type="text"
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
                                        value="{{ $user->kasir->tanggal_lahir, old('tanggal_lahir') }}"
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
                                    <input name="no_hp" value="{{ $user->kasir->no_hp, old('no_hp') }}" type="text"
                                        class="form-control" id="floatingInput" placeholder="08xxxxxxxx"
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
                                    <textarea name="alamat" class="form-control h-px-100" id="exampleFormControlTextarea1" placeholder="Jl. Jati">{{ $user->kasir->alamat, old('alamat') }}</textarea>
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
            @endif


            <button type="submit" class="btn btn-primary">Save Update</button>

        </form>
    </div>
@endsection
