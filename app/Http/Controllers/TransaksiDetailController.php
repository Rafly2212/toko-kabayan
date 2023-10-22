<?php

namespace App\Http\Controllers;

use App\Exports\Transaksidetail;
use Maatwebsite\Excel\Facades\Excel;
use App\PesananDetail;

class TransaksiDetailController extends Controller
{
    public function index()
    {
        $pesanan_details = PesananDetail::all();
        return view('Admin.Transaksi.TransaksiDetail', compact('pesanan_details'));
    }

    public function exportexcel()
    {
        return Excel::download(new Transaksidetail, 'Transaksi-pesanan-detail.xlsx');
    }
}
