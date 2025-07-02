@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Transaksi</h1>

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $transaksi->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="akun_keuangan_id">Akun Keuangan</label>
            <select name="akun_keuangan_id" class="form-control" required>
                @foreach ($akun as $a)
                    <option value="{{ $a->id }}" {{ $a->id == $transaksi->akun_keuangan_id ? 'selected' : '' }}>
                        {{ $a->nama_akun }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" class="form-control" required>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ $k->id == $transaksi->kategori_id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal">Jumlah</label>
            <input type="number" step="0.01" name="nominal" class="form-control" value="{{ $transaksi->nominal }}" required>
        </div>

        <div class="mb-3">
            <label for="tipe">Tipe Transaksi</label>
            <select name="tipe" class="form-control" required>
                <option value="masuk" {{ $transaksi->tipe == 'masuk' ? 'selected' : '' }}>Masuk</option>
                <option value="keluar" {{ $transaksi->tipe == 'keluar' ? 'selected' : '' }}>Keluar</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi">Keterangan</label>
            <textarea name="deskripsi" class="form-control">{{ $transaksi->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="bukti">Upload Bukti (Opsional, hanya jika ganti)</label>
            <input type="file" name="bukti" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
