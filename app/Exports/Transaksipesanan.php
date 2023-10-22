<?php

namespace App\Exports;

use App\Pesanan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Transaksipesanan implements FromView
{
    public function view(): View
    {
        return view('Admin.Transaksi.Excel', [
            'pesanan' => Pesanan::all()
        ]);
    }
}
