<?php

namespace Database\Seeders;

use App\Models\Akun;

use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $akun = [[
            'noreff' => '9090',
            'nama_reff' => 'Asset',
            'keterangan' => 'asset merupakan data pembelian barang untuk sebuah perusahaan',
        ], [
            'noreff' => '9091',
            'nama_reff' => 'Piutang',
            'keterangan' => 'Piutang merupakan data utang perusahaan yang harus di bayar dalam jangka waktu panjang ataupun pendek',
        ], [
            'noreff' => '9092',
            'nama_reff' => 'Modal',
            'keterangan' => 'Modal merupakan penanaman asset pelanggan atau bos keperusahaan ',
        ], [
            'noreff' => '9093',
            'nama_reff' => 'Beban Gaji',
            'keterangan' => 'Beban gaji merupakan hal yang harus di bayar kepada karyawan yang bekerja pada perusahaan',
        ]];
        Akun::insert($akun);
    }
}
