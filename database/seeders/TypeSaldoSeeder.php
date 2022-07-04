<?php

namespace Database\Seeders;

use App\Models\TypeSaldo;
use Illuminate\Database\Seeder;

class TypeSaldoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typesaldo = [[
            'namaTypeSaldo' => 'Debit',
            'desc' => 'ini adalah bagian Debit yang menandakan bahwa penambahan data positif atau plus pada transaksi',
        ], [
            'namaTypeSaldo' => 'Kredit',
            'desc' => 'ini adalah bagian Kredit yang menandakan bahwa pengurangan data negatif atau mines pada transaksi',
        ]];

        TypeSaldo::insert($typesaldo);
    }
}
