<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'user_id',
        'nama_kategori',
        'jenis',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
