<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $akun = Akun::latest()->get();
        return view('Akun.index', compact('akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Akun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'noreff' => 'required',
            'nama_reff' => 'required',
            'keterangan' => 'required'
        ]);
        $akun = Akun::create([
            'noreff' => $request->noreff,
            'nama_reff' => $request->nama_reff,
            'keterangan' => $request->keterangan
        ]);

        if ($akun) {
            return redirect()->route('akun.index')->with(['success' => 'Data berhasil Di kirim']);
        } else {
            return back()->withInput()->with(['error' => 'Anda Dalam mengisi Form Yang Salah Silahkan Dicek Kembali']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akun = Akun::findOrFail($id);
        return view('Akun.edit', compact('akun'));
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
        $this->validate($request, [
            'noreff' => 'required',
            'nama_reff' => 'required',
            'keterangan' => 'required'
        ]);
        $akun = Akun::findOrFail($id);
        $akun->update([
            'noreff' => $request->noreff,
            'nama_reff' => $request->nama_reff,
            'keterangan' => $request->keterangan
        ]);
        if ($akun) {
            return redirect()->route('akun.index')->with(['success' => 'Update Data berhasil']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Ada Yang Salah Dalam Form Edit']);
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
        $akun = Akun::findOrFail($id);
        $akun->delete();
        return redirect()->route('akun.index')->with(['success' => 'Sukses Menghapus Data']);
    }
}
