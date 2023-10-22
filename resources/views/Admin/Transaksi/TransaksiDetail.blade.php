@extends('AppAdmin')
@section('Page Title')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Detail Pemesanan</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('Content')
    <!-- Table Transaksi Begin -->
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content mt-2">
                            <div class="animated fadeIn">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Table Detail Pemesanan</strong>
                                            </div>
                                            <div class="card-body">
                                                <a href="{{ url('/Export-excel-detail') }}" style="border: none;border-radius: 10px;float: right;background-color: green;color: #fff;padding-top: 8px;padding-bottom: 8px;padding-left: 15px;padding-right: 15px">Export Excel</a>
                                                <table id="bootstrap-data-table" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Id Transaksi</th>
                                                            <th scope="col">Nama Pemesan</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Nama Barang</th>
                                                            <th scope="col">Size</th>
                                                            <th scope="col">Jumlah Pesanan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($pesanan_details as $item)
                                                            @if (!empty($item->barang->id))
                                                                <tr>
                                                                    <td>{{$item->pesanan_id}}</td>
                                                                    <td>{{$item->User->name}}</td>
                                                                    <td>{{$item->Pesanan->tanggal}}</td>
                                                                    <td>{{$item->barang->nama_barang}}</td>
                                                                    <td>{{$item->size}}</td>
                                                                    <td>{{$item->jumlah}}</td>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>{{$item->pesanan_id}}</td>
                                                                    <td>{{$item->User->name}}</td>
                                                                    <td>{{$item->Pesanan->tanggal}}</td>
                                                                    <td>Produk Not Found</td>
                                                                    <td>{{$item->size}}</td>
                                                                    <td>{{$item->jumlah}}</td>
                                                                </tr>
                                                            @endif
                                                        @empty
                                                        <div class="alert alert-danger" role="alert">
                                                            <center>Data transaksi masih kosong!</center>
                                                         </div>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Table Transaksi End -->
@endsection