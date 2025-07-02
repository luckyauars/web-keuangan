@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Transaksi</h1>

    <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="akun_keuangan_id">Akun Keuangan</label>
            <select name="akun_keuangan_id" class="form-control" required>
                @foreach ($akun as $a)
                    <option value="{{ $a->id }}">{{ $a->nama_akun }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" class="form-control" required>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal">Jumlah</label>
            <input type="number" step="0.01" name="nominal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipe">Tipe Transaksi</label>
            <select name="tipe" class="form-control" required>
                <option value="masuk">Masuk</option>
                <option value="keluar">Keluar</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi">Keterangan</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="bukti">Upload Bukti (Opsional)</label>
            <input type="file" name="bukti" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
