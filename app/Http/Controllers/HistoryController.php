<?php

namespace App\Http\Controllers;

use App\Pesanan;
use App\Barang;
use App\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class HistoryController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 'Konfirmasi Admin')->get();
        return view('FrontEnd.History', compact('pesanan'));
    }

    public function detail($id)
    {
        $pesanan_konfirmasi = Pesanan::where('id', $id)->where('ongkir', null)->first();
        if ($pesanan_konfirmasi == null) {
            $pesanan = Pesanan::where('id', $id)->first();
            $pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('FrontEnd.HistoryDetail', compact('pesanan', 'pesanan_detail'));
        } else {
            return view('FrontEnd.KonfirmasiAdmin');
        }
    }

    public function exportpdf($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        $pdf = FacadePdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('FrontEnd.PesananDetailPDF', compact('pesanan', 'pesanan_detail'))->setpaper('A5', 'landscape');
        return $pdf->stream();
    }
}
