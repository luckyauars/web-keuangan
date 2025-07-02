<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function exportExcel(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        return Excel::download(new TransaksiExport($bulan, $tahun), "laporan-transaksi-{$bulan}-{$tahun}.xlsx");
    }
}