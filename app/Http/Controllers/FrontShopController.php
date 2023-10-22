<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class FrontShopController extends Controller
{
    public function index(Request $request)
    {
        if($request->kategori) {
            $barangs = Barang::where('kategori', 'LIKE', '%' . $request->kategori . '%')->get();
        } else {
            $barangs = Barang::all();
        }
        return view('FrontEnd.Shop', compact('barangs'));
    }
}
