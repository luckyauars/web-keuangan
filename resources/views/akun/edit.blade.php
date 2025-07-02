@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Akun Keuangan</h1>
        <a href="{{ route('akun.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('akun.update', $akun->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_akun">Nama Akun</label>
                    <input type="text" class="form-control" name="nama_akun" value="{{ $akun->nama_akun }}" required>
                </div>
                <div class="form-group">
                    <label for="tipe">Tipe Akun</label>
                    <select name="tipe" class="form-control" required>
                        <option value="kas" {{ $akun->tipe == 'kas' ? 'selected' : '' }}>Kas</option>
                        <option value="bank" {{ $akun->tipe == 'bank' ? 'selected' : '' }}>Bank</option>
                        <option value="e-wallet" {{ $akun->tipe == 'e-wallet' ? 'selected' : '' }}>E-Wallet</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="saldo_awal">Saldo Awal</label>
                    <input type="number" step="0.01" class="form-control" name="saldo_awal"
                        value="{{ $akun->saldo_awal }}" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan (Opsional)</label>
                    <textarea name="keterangan" class="form-control">{{ $akun->keterangan }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </form>
        </div>
    </div>
@endsection
