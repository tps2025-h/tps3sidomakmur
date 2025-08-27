@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="mb-4 p-3 rounded" style="background-color: #66a869;">
        <h2 class="fw-bold mb-0" style="color: #ffffff;">Daftar Stok</h2>
    </div>

    <div class="d-flex gap-2 mb-3">
        <a href="{{ route('stock.create') }}" class="btn btn-primary w-30">Tambah</a>
        <a href="{{ route('home') }}" class="btn btn-secondary w-30">Kembali</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light text-center">
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Jumlah Stock</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $stock->id }}</td>
                    <td>{{ $stock->category->nama_category }}</td>
                    <td>{{ $stock->jumlah_stock }}</td>
                <td>
                    @if(empty($category->deskripsi))
                        <span class="text-dark">Tidak Ada Deskripsi</span>
                    @else
                        {{ Str::limit($category->deskripsi, 50) }}
                    @endif
                </td>

                <td>
                    @if(empty($category->gambar))
                        <span class="text-dark">Tidak Ada Gambar</span>
                    @else
                        <img src="{{ asset('storage/' . $category->gambar) }}" width="60" alt="gambar">
                    @endif
                </td>
                    <td class="text-center">
                        <a href="{{ route('stock.edit', $stock->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('stock.destroy', $stock->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
