@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kategori Transaksi</h1>
        <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary">+ Tambah Kategori</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $kategori)
                            <tr>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td>
                                    <span class="badge {{ $kategori->jenis == 'masuk' ? 'badge-success' : 'badge-danger' }}">
                                        {{ ucfirst($kategori->jenis) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('kategori.edit', $kategori->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Hapus kategori ini?')">Hapus</button>
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
