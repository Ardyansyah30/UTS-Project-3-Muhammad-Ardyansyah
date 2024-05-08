@extends('layouts/contentNavbarLayout')

@section('title', 'Show Users')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Users / </span> Show
    </h4>

    <div class="row">
        <div class="col-xxl-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data User</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $user->email }}</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Role</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <label class="col-sm-8 col-form-label">{{ $user->role }}</label>
                    </div>
                </div>
            </div>
        </div>

        @if ($user->role === 'Kasir')
            <div class="col-xxl-8">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Data Kasir</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->kasir->nama }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->kasir->nik }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->kasir->jenis_kelamin }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->kasir->tempat_lahir }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->kasir->tanggal_lahir }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">No. HP</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->kasir->no_hp }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->kasir->alamat }}</label>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($user->role === 'Inventaris')
            <div class="col-xxl-8">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Data Inventaris</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->inventaris->nama }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->inventaris->nik }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->inventaris->jenis_kelamin }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->inventaris->tempat_lahir }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->inventaris->tanggal_lahir }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">No. HP</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->inventaris->no_hp }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->inventaris->alamat }}</label>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($user->role === 'Pelanggan')
            <div class="col-xxl-8">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Data Pelanggan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->pelanggan->nama }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->pelanggan->nik }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->pelanggan->jenis_kelamin }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->pelanggan->tempat_lahir }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->pelanggan->tanggal_lahir }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">No. HP</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->pelanggan->no_hp }}</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">{{ $user->pelanggan->alamat }}</label>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
