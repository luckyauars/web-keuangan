<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use Illuminate\Http\Request;
use App\Models\Transaksi;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::resource('akun', AkunController::class)->except(['show']);
    Route::resource('kategori', KategoriController::class)->except(['show']);

    Route::get('/dashboard', function () {
        $query = Transaksi::query()->with('kategori');

        if (auth()->user()->role === 'admin') {
            $query->with('user');
        } else {
            $query->where('user_id', auth()->id());
        }

        $transaksi = $query->latest()->take(10)->get();

        return view('dashboard', compact('transaksi'));
    })->name('dashboard');

    // Hanya user biasa: transaksi dan laporan milik sendiri
    Route::resource('transaksi', TransaksiController::class)->except(['show']);

    Route::get('/laporan/transaksi', [TransaksiController::class, 'laporan'])->name('laporan.transaksi');
    Route::get('/laporan/transaksi/pdf', [TransaksiController::class, 'laporanPDF'])->name('laporan.transaksi.pdf');
    Route::get('/laporan/transaksi/excel', [TransaksiController::class, 'laporanExcel'])->name('laporan.transaksi.excel');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/export', [LaporanController::class, 'exportExcel'])->name('laporan.export');

    // Khusus admin
    /*Route::middleware(['cekrole:admin'])->group(function () {
        Route::resource('akun', AkunController::class)->except(['show']);
        Route::resource('kategori', KategoriController::class)->except(['show']);
    });*/
});

// Route untuk preview laporan tanpa export
Route::get('/laporan-preview', function (Request $request) {
    $request->validate([
        'bulan' => 'required|integer|min:1|max:12',
        'tahun' => 'required|integer|min:2000|max:' . date('Y'),
    ]);

    $bulan = $request->bulan;
    $tahun = $request->tahun;

    $data = \App\Models\Transaksi::where('user_id', auth()->id())
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->with('akun', 'kategori')
        ->get();

    return view('laporan.pdf', [
        'data' => $data,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'cetak' => true
    ]);
})->middleware(['auth', 'verified'])->name('laporan.preview');
