<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable = [
        'user_id',
        'akun_keuangan_id',
        'kategori_id',
        'nominal',
        'tanggal',
        'deskripsi',
        'bukti',
    ];

    public function akun()
    {
        return $this->belongsTo(AkunKeuangan::class, 'akun_keuangan_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
