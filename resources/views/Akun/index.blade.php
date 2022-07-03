@extends('layouts.app')

@section('title','Akun')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Table Data Akuntan
        </div>
        <div class="card-body">
            <a href="{{route('akun.create')}}" class="btn btn-md btn-primary mb-3 float-end">
                Tambah Data Akun
            </a>
            <div class="mt-5 mb-5">
                <table class="table table-bordered  table-responsive-md">
                    <thead class=" ">
                        <tr class=" table-dark">
                            <th>No</th>
                            <th>No Reff</th>
                            <th>Nama Reff</th>
                            <th>keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($akun as $akun)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{$akun->noreff}}</td>
                            <td>{{$akun->nama_reff}}</td>
                            <td>{{$akun->keterangan}}</td>
                            <td>
                                <form action="{{route('akun.destroy',$akun->id)}}" method="post">
                                    <a href="{{route('akun.edit',$akun->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" o class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection