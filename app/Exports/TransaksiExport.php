<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(private $bulan, private $tahun) {}

    public function collection()
    {
        return Transaksi::with(['akun', 'kategori'])
            ->where('user_id', Auth::id())
            ->whereMonth('tanggal', $this->bulan)
            ->whereYear('tanggal', $this->tahun)
            ->get();
    }

    public function map($trx): array
    {
        return [
            $trx->tanggal,
            $trx->akun->nama_akun ?? '-',
            $trx->kategori->nama_kategori ?? '-',
            $trx->tipe,
            $trx->nominal,
            $trx->deskripsi ?? '',
        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Akun',
            'Kategori',
            'Tipe',
            'nominal',
            'deskripsi',
        ];
    }
}