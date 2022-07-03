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
                        <input type="hidden" name="user_id" value="">
                        <div class="form-group mt-4">
                            <label for="id_reff">Pilihlah Tipe Akuntansi</label>
                            <select class="form-select form-select-sm" name="id_reff">
                                <option value="">--- Pilih Data ---</option>
                                @foreach ($Akun as $Akun)
                                <option class=" form-select form-select" value="{{$Akun->id}}" {{
                                    old('id_reff')==$Akun->id ?
                                    'selected' : null }}
                                    >
                                    {{$Akun->nama_reff}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="jenis_saldo">Jenis Saldo</label>
                            <select name="jenis_saldo" class="form-select form-select-sm" value="">
                                <option value="Debit">Debit</option>
                                <option value="Kredit">Kredit</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="" class="">Masukkan nominal </label>
                            <input type="number" class="form-control form-control" name="saldo" value=""
                                placeholder="silahkan masukan nomimal yang akan digunakan/ditambah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-4">
                            <label for="tgl_transaksi">Tanggal Transaksi</label>
                            <input type="date" name="tgl_transaksi" class="form-control" value="">
                        </div>
                        <div class="form-group mt-2">
                            <label for="Keterangan">Keterangan</label>
                            <textarea type="text" name="Keterangan" class="form-control" id="Keterangan"
                                rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-md mb-5 mt-5">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection