<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $transaksi = transaks'i::
        $transaksi = transaksi::with('akun', 'user')->latest()->get();
        return view('Transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Akun = Akun::latest()->get();
        return view('Transaksi.create', compact('Akun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_reff' => 'required',
            'tgl_transaksi' => 'required',
            'jenis_saldo' => 'required',
            'saldo' => 'required',
            'Keterangan' => 'required'
        ]);
        $transaksi = transaksi::create([
            'id_reff' => $request->id_reff,
            'id_user' => Auth::user()->id,
            'tgl_transaksi' => $request->tgl_transaksi,
            'jenis_saldo' => $request->jenis_saldo,
            'saldo' => $request->saldo,
            'Keterangan' => $request->Keterangan,
        ]);
        if ($transaksi) {
            return redirect()->route('transaksi.index')->with(['success' => 'data transaksi berhasil di tambahkan']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'data tidak berhasil ditambahkan coba cek lagi inputan yang anda masukkan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $akun = Akun::all();
        // dd($akun);

        $transaksi = transaksi::with('akun', 'user')->findOrFail($id);
        return view('Transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $akun = Akun::latest()->get();
        $Akun = Akun::latest()->get();
        $transaksi = transaksi::with('akun', 'user')->findOrFail($id);
        // dd($transaksi);
        return view('Transaksi.edit', compact('transaksi', 'Akun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'id_reff' => 'required',
            'tgl_transaksi' => 'required',
            'jenis_saldo' => 'required',
            'saldo' => 'required',
            'keterangan' => 'required'
        ]);
        $transaksi = transaksi::findOrFail($id);
        $transaksi->update([
            'id_reff' => $request->id_reff,
            'tgl_transaksi' => $request->tgl_transaksi,
            'jenis_saldo' => $request->jenis_saldo,
            'saldo' => $request->saldo,
            'keterangan' => $request->keterangan,
        ]);
        if ($transaksi) {
            return redirect()->route('transaksi.index')->with(['success' => 'data transaksi berhasil di update']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'data transaksi gagal di update coba cek kembali']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
