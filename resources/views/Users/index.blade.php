@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="mb-4 p-3 rounded" style="background-color: rgba(102, 168, 105, 0.8);">
        <h2 class="fw-bold mb-0" style="color: #ffffff;">Daftar Pengguna</h2>
    </div>

    @if(auth()->user()->role == 'admin')
    <div class="d-flex gap-2 mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah</a>
        <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
    </div>
    @endif

    <div class="bg-white p-4 rounded shadow-sm">
        <table class="table table-bordered table-hover">
            <thead class="table-light text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td class="text-center">
                            @if(auth()->user()->role == 'admin')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
