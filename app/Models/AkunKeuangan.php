<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunKeuangan extends Model
{
    use HasFactory;

    protected $table = 'akun_keuangan';

    protected $fillable = [
        'user_id',
        'nama_akun',
        'tipe',
        'saldo_awal',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
