<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\AkunKeuangan;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    /*public function index()
    {
        $data = Transaksi::where('user_id', Auth::id())->with('akun', 'kategori')->orderByDesc('tanggal')->get();
        return view('transaksi.index', compact('data'));
    }*/

    public function index(Request $request)
    {

        if (Auth::user()->role === 'admin') {
            $query = Transaksi::with(['akun', 'kategori', 'user']);
            $semua_kategori = Kategori::all();
        } else {
            $query = Transaksi::where('user_id', Auth::id())->with(['akun', 'kategori']);
            $semua_kategori = Kategori::where('user_id', Auth::id())->get();
        }

        if ($request->filled('tanggal_dari')) {
            $query->where('tanggal', '>=', $request->tanggal_dari);
        }

        if ($request->filled('tanggal_sampai')) {
            $query->where('tanggal', '<=', $request->tanggal_sampai);
        }

        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        $data = $query->orderByDesc('tanggal')->get();

        return view('transaksi.index', compact('data', 'semua_kategori'));
    }



    public function create()
    {
        $akun = \App\Models\AkunKeuangan::whereNull('user_id')
            ->orWhere('user_id', auth()->id())
            ->get();

        $kategori = \App\Models\Kategori::whereNull('user_id')
            ->orWhere('user_id', auth()->id())
            ->get();

        return view('transaksi.create', compact('akun', 'kategori'));
    }


    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'akun_keuangan_id' => 'required|exists:akun_keuangan,id',
            'kategori_id' => 'required|exists:kategori,id',
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date',
            'tipe' => 'required|in:masuk,keluar',
            'deskripsi' => 'nullable|string',
            'bukti' => 'nullable|image|max:2048',
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti', 'public');
        }

        Transaksi::create([
            'user_id' => Auth::id(),
            'akun_keuangan_id' => $request->akun_keuangan_id,
            'kategori_id' => $request->kategori_id,
            'nominal' => $request->nominal,
            'tanggal' => $request->tanggal,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'bukti' => $buktiPath,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }


    public function destroy($id)
    {
        $trx = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $trx->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }


    public function laporan(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        $data = Transaksi::where('user_id', Auth::id())
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->with('akun', 'kategori')
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('laporan.index', compact('data', 'bulan', 'tahun'));
    }

    public function laporanPDF(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $data = Transaksi::where('user_id', Auth::id())
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->with('akun', 'kategori')
            ->get();

        $pdf = Pdf::loadView('laporan.pdf', [
            'data' => $data,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);

        return $pdf->download("laporan_{$bulan}_{$tahun}.pdf");
    }

    public function laporanExcel(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        return Excel::download(new TransaksiExport($request->bulan, $request->tahun), 'laporan.xlsx');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($transaksi->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $akun = \App\Models\AkunKeuangan::whereNull('user_id')
            ->orWhere('user_id', auth()->id())
            ->get();

        $kategori = \App\Models\Kategori::whereNull('user_id')
            ->orWhere('user_id', auth()->id())
            ->get();

        return view('transaksi.edit', compact('transaksi', 'akun', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'akun_keuangan_id' => 'required|exists:akun_keuangan,id',
            'kategori_id' => 'required|exists:kategori,id',
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date',
            'tipe' => 'required|in:masuk,keluar',
            'deskripsi' => 'nullable|string',
            'bukti' => 'nullable|image|max:2048',
        ]);

        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($transaksi->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403);
        }

        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti', 'public');
            $transaksi->bukti = $buktiPath;
        }

        $transaksi->update([
            'akun_keuangan_id' => $request->akun_keuangan_id,
            'kategori_id' => $request->kategori_id,
            'nominal' => $request->nominal,
            'tanggal' => $request->tanggal,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }
}
