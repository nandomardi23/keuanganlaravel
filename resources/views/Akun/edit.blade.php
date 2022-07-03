@extends('layouts.app')
@section('title','Form Edit Data Akun')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Form Edit Data Akun
        </div>
        <div class="card-body">
            <a href="{{route('akun.index')}}" class="btn btn-md btn-danger mb-3 float-end text-white">
                Kembali
            </a>
            <div class="mt-5 mb-5">
                <form action="{{route('akun.update',$akun->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">No Refrens</label>
                        <input type="text" class="form-control" placeholder="Masukan No Refrens Anda..." name="noreff"
                            value="{{ old('noreff',$akun->noreff)}}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Akun</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Akun Yang Anda Inginkan ..."
                            name="nama_reff" value="{{old('nama_reff',$akun->nama_reff)}}">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class=" form-control"
                            placeholder="Masukan Keterangan Untuk Memudahkan Anda ..." name="keterangan"
                            value="{{old('keterangan',$akun->keterangan)}}">
                    </div>
                    <button type="submit" class="btn btn-info text-white mt-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection