@extends('layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Kategori Transaksi</h1>
    <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
            </div>

            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis" class="form-control" required>
                    <option value="masuk" {{ $kategori->jenis == 'masuk' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="keluar" {{ $kategori->jenis == 'keluar' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
