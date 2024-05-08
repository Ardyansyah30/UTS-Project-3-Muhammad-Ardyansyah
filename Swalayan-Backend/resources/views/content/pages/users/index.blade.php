@extends('layouts/contentNavbarLayout')

@section('title', 'Data Users')

@section('content')
    <h4 class="py-3 mb-2"><span class="text-muted fw-light">Users /</span> Data
    </h4>

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-4">
        <span class="tf-icons mdi mdi-arrow-right-circle-outline me-1"></span>Create
    </a>

    @if (session()->has('pesan'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('pesan') }}
        </div>
    @endif

    <div class="card">
        <h5 class="card-header">Users</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td><span class="badge rounded-pill bg-label-info me-1">{{ $user->role }}</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('users.show', ['user' => $user]) }}"><i
                                                    class="mdi mdi-eye-outline me-1"></i> Show</a>
                                            @if ($user->role === 'Inventaris' || $user->role === 'Kasir')
                                                <a class="dropdown-item"
                                                    href="{{ route('users.edit', ['user' => $user]) }}"><i
                                                        class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            @endif
                                            <form action="{{ route('users.destroy', ['user' => $user]) }}" method="post">
                                                @method('DELETE')
                                                @csrf

                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="mdi mdi-trash-can-outline me-1"></i> Hapus
                                                </button>
                                            </form>
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
