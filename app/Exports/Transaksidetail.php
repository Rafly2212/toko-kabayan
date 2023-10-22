<?php

namespace App\Exports;

use App\PesananDetail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Transaksidetail implements FromView
{
    public function view(): View
    {
        return view('Admin.Transaksi.ExcelDetail', [
            'detail' => PesananDetail::all()
        ]);
    }
}
