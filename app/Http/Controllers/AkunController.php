<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AkunKeuangan;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $data = AkunKeuangan::with('user')->get();
        } else {
            $data = AkunKeuangan::where('user_id', auth()->id())->get();
        }

        return view('akun.index', compact('data'));
    }

    public function create()
    {
        return view('akun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_akun' => 'required|string|max:100',
            'tipe' => 'required|in:kas,bank,e-wallet',
            'saldo_awal' => 'required|numeric'
        ]);

        AkunKeuangan::create([
            'user_id' => Auth::id(),
            'nama_akun' => $request->nama_akun,
            'tipe' => $request->tipe,
            'saldo_awal' => $request->saldo_awal,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('akun.index')->with('success', 'Akun berhasil ditambahkan');
    }

    public function edit($id)
    {
        $akun = AkunKeuangan::findOrFail($id);

        if ($akun->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('akun.edit', compact('akun'));
    }

    public function update(Request $request, $id)
    {
        $akun = AkunKeuangan::findOrFail($id);

        if ($akun->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $akun->update($request->only('nama_akun', 'tipe', 'saldo_awal', 'keterangan'));

        return redirect()->route('akun.index')->with('success', 'Akun berhasil diperbarui');
    }

    public function destroy($id)
    {
        $akun = AkunKeuangan::findOrFail($id);

        if ($akun->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $akun->delete();

        return redirect()->route('akun.index')->with('success', 'Akun berhasil dihapus');
    }
}
