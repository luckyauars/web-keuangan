<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $data = Kategori::with('user')->get();
        } else {
            $data = Kategori::where('user_id', auth()->id())->get();
        }

        return view('kategori.index', compact('data'));
    }
    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'jenis' => 'required|in:masuk,keluar',
        ]);

        Kategori::create([
            'user_id' => Auth::id(),
            'nama_kategori' => $request->nama_kategori,
            'jenis' => $request->jenis
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        if ($kategori->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        if ($kategori->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'jenis' => 'required|in:masuk,keluar',
        ]);

        $kategori->update($request->only('nama_kategori', 'jenis'));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        if ($kategori->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
