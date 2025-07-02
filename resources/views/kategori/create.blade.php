@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori Transaksi</h1>
        <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select name="jenis" class="form-control" required>
                        <option value="masuk">Pemasukan</option>
                        <option value="keluar">Pengeluaran</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
