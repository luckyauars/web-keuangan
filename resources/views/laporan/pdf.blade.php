<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi Bulanan</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        h2 {
            text-align: center;
        }

        .btn-download {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 12px;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi Bulanan</h2>
    <p>Bulan: {{ $bulan }} / Tahun: {{ $tahun }}</p>

    @if (!empty($cetak))
        <div style="text-align: right;">
            <a href="{{ route('laporan.transaksi.pdf', ['bulan' => $bulan, 'tahun' => $tahun]) }}" target="_blank"
                class="btn-download">
                Unduh PDF
            </a>
        </div>
    @endif



    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Akun</th>
                <th>Kategori</th>
                <th>Nominal</th>
                <th>Tipe</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $trx)
                <tr>
                    <td>{{ $trx->tanggal }}</td>
                    <td>{{ $trx->akun->nama_akun ?? '-' }}</td>
                    <td>{{ $trx->kategori->nama_kategori ?? '-' }}</td>
                    <td>Rp {{ number_format($trx->nominal, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($trx->tipe) }}</td>
                    <td>{{ $trx->deskripsi }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">Tidak ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
