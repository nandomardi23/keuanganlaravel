@extends('layouts.app')

@section('title','transaksi')
@section('content')
<div class="container-lg">
    <div class="card">
        <div class="card-header">
            List Transaksi
        </div>
        <div class="card-body">
            <a href="{{route('transaksi.create')}}" class="btn btn-md btn-primary mb-3 float-end">
                Tambah Data Transaksi
            </a>
            <table class=" table table-bordered table-responsive ">
                <thead class="bg-secondary">
                    <tr>
                        <td class="text-light">No</td>
                        <td class="text-light">Nama Transaksi</td>
                        <td class="text-light">No Reff</td>
                        <td class="text-light">Tipe Akun</td>
                        <td class="text-light">Tanggal Transaksi</td>
                        <td class="text-light">Jenis Transaksi</td>
                        <td class="text-light">Nominal</td>
                        <td class="text-light">keterangan</td>
                        <td class="text-light">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $transaksi)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$transaksi->akun->noreff}}</td>
                        <td>{{$transaksi->akun->nama_reff}}</td>
                        <td>{{$transaksi->namaTransaksi}}</td>
                        <td>{{$transaksi->tanggalTransaksi}}</td>
                        <td>{{$transaksi->typeSaldo->namaTypeSaldo}}</td>
                        <td>{{$transaksi->nominal}}</td>
                        <td>{{$transaksi->desc}}</td>
                        <td>
                            <form action="{{route('transaksi.destroy',$transaksi->id)}}" method="POST">
                                <a href="{{route('transaksi.edit',$transaksi->id)}}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{route('transaksi.show',$transaksi->id)}}"
                                    class="btn btn-info btn-sm">Detail</a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection