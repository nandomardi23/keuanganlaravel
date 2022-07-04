<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_reff',
        'id_user',
        'id_saldotype',
        'namaTransaksi',
        'tanggalTransaksi',
        'nominal',
        'desc',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'id_reff', 'id');
    }

    public function typeSaldo()
    {
        return $this->belongsTo(TypeSaldo::class, 'id_saldotype', 'id');
    }
}
