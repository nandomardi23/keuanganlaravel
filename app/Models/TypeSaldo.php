<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSaldo extends Model
{
    use HasFactory;
    protected $fillable = [
        'namaTypeSaldo',
        'desc',
    ];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
}
