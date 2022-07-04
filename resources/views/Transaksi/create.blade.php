@extends('layouts.app')

@section('title','form Tambah Data transaksi')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Form edit transaksi
            <a href="{{route('transaksi.index')}}" class="btn btn-md btn-danger mb-3 float-end text-white">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('transaksi.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-6">
                        {{-- <input type="hidden" name="user_id" value=""> --}}
                        <div class="form-group mt-4">
                            <label for="namaTransaksi">Nama Transaksi</label>
                            <input type="text" name="namaTransaksi" class="form-control" value=""
                                placeholder="Silahkan Masukan Nama Transaksi">
                        </div>
                        <div class="form-group mt-4">
                            <label for="id_reff">Pilihlah Tipe Akuntansi</label>
                            <select class="form-select form-select-sm" name="id_reff">
                                <option value="">--- Pilih Data ---</option>
                                @foreach ($Akun as $Akun)
                                <option class=" form-select" value="{{$Akun->id}}" {{ old('id_reff')==$Akun->id
                                    ?
                                    'selected' : null }}
                                    >
                                    {{$Akun->nama_reff}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="nominal" class="">Masukkan nominal </label>
                            <input type="number" class="form-control form-control" name="nominal" value=""
                                placeholder="silahkan masukan nomimal yang akan digunakan/ditambah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-4">
                            <label for="tanggalTransaksi">Tanggal Transaksi</label>
                            <input type="date" name="tanggalTransaksi" class="form-control" value="">
                        </div>
                        <div class="form-group mt-4">
                            <label for="id_typesaldo">Jenis Saldo</label>
                            <select name="id_typesaldo" class="form-select form-select-sm" value="">
                                <option value="">--- Pilih Data ---</option>
                                @foreach ($typesaldo as $typesaldo)
                                <option class=" form-select " value="{{$typesaldo->id}}" {{
                                    old('id_typesaldo')==$typesaldo-> id ? 'selected' : null }}>{{$typesaldo ->
                                    namaTypeSaldo}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="desv">Keterangan</label>
                            <textarea type="text" name="desc" class="form-control" id="desc" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-md mb-5 mt-5">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection