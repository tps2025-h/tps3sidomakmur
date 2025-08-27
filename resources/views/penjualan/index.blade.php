@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1020px;">
    <div class="p-4 rounded" style="background-color: #e9f7ef;">
        <div class="mb-4 p-3 rounded bg-success text-white">
            <h2 class="fw-bold mb-0">Penjualan</h2>
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex gap-2 mb-3">
            <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Tambah</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <!-- Notifikasi -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Tabel Penjualan -->
        <table class="table table-bordered table-striped">
            <thead class="table-success text-center">
                <tr>
                    <th>Nama Pembeli</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grouped = $penjualans->groupBy('nama_pembeli');
                @endphp

                @forelse ($grouped as $pembeli => $items)
                    <tr>
                        <td>{{ $pembeli }}</td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                @foreach($items as $item)
                                    <li>{{ $item->stock->nama_barang ?? $item->nama_barang }} (x{{ $item->jumlah }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                @foreach($items as $item)
                                    <li>Rp {{ number_format($item->harga, 0, ',', '.') }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                @foreach($items as $item)
                                    <li>{{ $item->jumlah }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                @foreach($items as $item)
                                    <li>
                                        @if($item->status === 'selesai')
                                            <span class="badge bg-success">Selesai</span>
                                        @elseif($item->status === 'batal')
                                            <span class="badge bg-secondary">Batal</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled mb-0 text-center">
                                @foreach($items as $item)
                                    <li class="mb-1">
                                        <a href="{{ route('penjualan.edit', $item->id) }}" class="btn btn-sm btn-primary">✏️Edit</a>

                                        <form action="{{ route('penjualan.selesai', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Tandai sebagai selesai?')">✅Selesai</button>
                                        </form>

                                        <form action="{{ route('penjualan.batal', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-secondary" onclick="return confirm('Batalkan pesanan ini?')">❌Batal</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
