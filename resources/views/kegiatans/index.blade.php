@extends('layouts.app')

@section('content')
   <div class="container" style="max-width: 1020px; margin: 0 auto;">
    <div class="p-4 rounded" style="background-color: #e9f7ef;">
        <div class="mb-4 p-3 rounded" style="background-color: #66a869;">
            <h2 class="fw-bold mb-0" style="color: #ffffff;">Daftar Kegiatan</h2>
        </div>

        <div class="d-flex gap-2 mb-3">
            <a href="{{ route('kegiatans.create') }}" class="btn btn-primary w-30">Tambah</a>
            <a href="{{ route('home') }}" class="btn btn-secondary w-30">Kembali</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover">
            <thead class="table-light text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kegiatans as $kegiatan)
                <tr>
                    <td>{{ $kegiatan->id }}</td>
                    <td>{{ $kegiatan->judul }}</td>
                    <td>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d-m-Y') }}</td>
                    <td class="text-center">
                        @if($kegiatan->gambar)
                            <img src="{{ asset('storage/' . $kegiatan->gambar) }}" width="100" class="rounded">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('kegiatans.edit', $kegiatan->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('kegiatans.destroy', $kegiatan->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin hapus kegiatan ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection