<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'noreff',
        'nama_reff',
        'keterangan'
    ];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
}
