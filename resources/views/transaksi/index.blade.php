@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Transaksi</h1>
        <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary">+ Tambah Transaksi</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" class="row mb-4">
        <div class="col-md-3">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-control">
                <option value="">Semua Kategori</option>
                @foreach ($semua_kategori as $ktg)
                    <option value="{{ $ktg->id }}" {{ request('kategori') == $ktg->id ? 'selected' : '' }}>
                        {{ $ktg->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="tanggal_dari">Tanggal Dari</label>
            <input type="date" name="tanggal_dari" id="tanggal_dari" class="form-control"
                value="{{ request('tanggal_dari') }}">
        </div>
        <div class="col-md-3">
            <label for="tanggal_sampai">Tanggal Sampai</label>
            <input type="date" name="tanggal_sampai" id="tanggal_sampai" class="form-control"
                value="{{ request('tanggal_sampai') }}">
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary me-2">Filter</button>
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>


    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            @if (auth()->user()->role === 'admin')
                                <th>User</th>
                            @endif
                            <th>Tanggal</th>
                            <th>Akun</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Bukti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $trx)
                            <tr>
                                @if (auth()->user()->role === 'admin')
                                    <td>{{ $trx->user->name ?? '[user tidak ditemukan]' }}</td>
                                @endif
                                <td>{{ $trx->tanggal }}</td>
                                <td>{{ $trx->akun->nama_akun ?? '[akun tidak ditemukan]' }}</td>
                                <td>{{ $trx->kategori->nama_kategori ?? '[kategori tidak ditemukan]' }}</td>
                                <td>Rp {{ number_format($trx->nominal, 0, ',', '.') }}</td>
                                <td>{{ $trx->deskripsi }}</td>
                                <td>
                                    @if ($trx->bukti)
                                        <a href="{{ asset('storage/' . $trx->bukti) }}" target="_blank">Lihat</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('transaksi.edit', $trx->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>


                                    <form action="{{ route('transaksi.destroy', $trx->id) }}" method="POST"
                                        style="display:inline;" onsubmit="return confirm('Yakin hapus transaksi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
