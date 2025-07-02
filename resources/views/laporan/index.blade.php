@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Laporan Transaksi Bulanan</h1>

    <form action="{{ route('laporan.preview') }}" method="GET" class="row g-3" target="_blank">
        <div class="col-md-3">
            <label for="bulan" class="form-label">Bulan</label>
            <select name="bulan" id="bulan" class="form-control" required>
                @foreach (range(1, 12) as $b)
                    <option value="{{ $b }}" {{ request('bulan') == $b ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $b)->format('F') }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="tahun" class="form-label">Tahun</label>
            <select name="tahun" id="tahun" class="form-control" required>
                @foreach (range(date('Y'), date('Y') - 5) as $t)
                    <option value="{{ $t }}" {{ request('tahun') == $t ? 'selected' : '' }}>
                        {{ $t }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 d-flex align-items-end gap-2">
            <button type="submit" class="btn btn-primary">
                Tampilkan Laporan
            </button>

            <a href="{{ route('laporan.transaksi.excel', ['bulan' => request('bulan', date('m')), 'tahun' => request('tahun', date('Y'))]) }}"
                class="btn btn-success">
                Export Excel
            </a>
        </div>
    </form>
@endsection
