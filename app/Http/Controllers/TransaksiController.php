<?php

namespace App\Http\Controllers;

use App\Exports\Transaksipesanan;
use App\Pesanan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanans = Pesanan::all();
        return view('Admin.Transaksi.Transaksis', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $pesanans = Pesanan::find($id);
        return view('Admin.Transaksi.Edit', compact('pesanans'));
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
        $request->validate([
            'status' => 'required',
            'ongkir' => 'required|max:5',
            'nama_kurir' => 'required|max:30',
            'nomor_telepon_kurir' => 'required|max:13',
            'kurir' => 'required'
        ], [
            'status.required' => 'Status transaksi tidak boleh kosong',
            'ongkir.required' => 'Ongkir tidak boleh kosong',
            'ongkir.max' => 'Ongkir tidak boleh lebih dari 5 angka',
            'nama_kurir.required' => 'Nama kurir tidak boleh kosong',
            'nama_kurir.max' => 'Nama kurir tidak boleh lebih dari 30 karakter',
            'nomor_telepon_kurir.required' => 'No telepon kurir tidak boleh kosong',
            'nomor_telepon_kurir.max' => 'No telepon kurir tidak boleh lebih dari 13 angka',
            'kurir.required' => 'Kurir tidak boleh kosong',
        ]);
        $pesanans = Pesanan::find($id);
        $pesanans->update([
            'status' => $request->status,
            'no_resi' => $request->no_resi,
            'ongkir' => $request->ongkir,
            'nama_kurir' => $request->nama_kurir,
            'nomor_telepon_kurir' => $request->nomor_telepon_kurir,
            'kurir' => $request->kurir,
        ]);

        return redirect()->route('Transaksis.index')
            ->with('status', 'Data Status Berhasil Diupdate!');
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

    public function exportexcel()
    {
        return Excel::download(new Transaksipesanan, 'Transaksi-pesanan.xlsx');
    }
}
