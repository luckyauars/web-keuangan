@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

        @php $role = Auth::user()->role; @endphp

        @if ($role === 'admin')
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\User::count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Transaksi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Transaksi::count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Akun</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\AkunKeuangan::count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Saldo Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp
                                {{ number_format(\App\Models\Transaksi::where('user_id', Auth::id())->where('tipe', 'masuk')->sum('nominal'), 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp
                                {{ number_format(\App\Models\Transaksi::where('user_id', Auth::id())->where('tipe', 'keluar')->sum('nominal'), 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
