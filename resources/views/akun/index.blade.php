@extends('layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Akun Keuangan</h1>
    <a href="{{ route('akun.create') }}" class="btn btn-sm btn-primary">+ Tambah Akun</a>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Akun</th>
                        <th>Tipe</th>
                        <th>Saldo Awal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $akun)
                    <tr>
                        <td>{{ $akun->nama_akun }}</td>
                        <td>{{ ucfirst($akun->tipe) }}</td>
                        <td>Rp {{ number_format($akun->saldo_awal, 0, ',', '.') }}</td>
                        <td>{{ $akun->keterangan }}</td>
                        <td>
                            <a href="{{ route('akun.edit', $akun->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('akun.destroy', $akun->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus akun ini?')">Hapus</button>
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
