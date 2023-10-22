@extends('App')
@section('Navbar')
    <!-- Navbar Mobile -->
        <div class="offcanvas-menu-overlay"></div>
        <div class="offcanvas-menu-wrapper">
            <div style="margin-right: 50px" class="offcanvas__nav__option">
                @guest
                <a href="{{url ('Check-Out')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt=""></a>
                <div class="price">Rp.0</div>
                @else
                <?php
                $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                if($pesanan_utama == null){
                    $notif = 0;
                }else{
                    $notif = \App\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                }
                ?>
                @if ($notif == 0)
                <a href="{{url ('/')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt=""></a>
                <div class="price">Rp.0</div>
                @else    
                <a style="text-decoration: none; color: #212121" href="{{url ('Check-Out')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt="">{{$notif}}</a>
                <div class="price">Rp.0</div>
                @endif
                @endguest
            </div>
            <div style="margin-top: 50px" id="mobile-menu-wrap"></div>
            <div class="offcanvas__option">
                <div class="offcanvas__links">
                    @guest
                    <a href="{{ route('login') }}">Sign in</a>
                    @else    
                    <a style="margin-bottom: 15px; margin-top: 15px" href="{{url ('/Profile')}}"><strong>Profile</strong></a>
                    <a style="margin-bottom: 30px" href="{{url ('/History')}}"><strong>Riwayat Pemesanan</strong></a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><strong>Keluar</strong> 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    <!-- End -->

    <!-- Navbar Web -->
        <header class="header">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <div class="header__top__left">
                                <p>Selamat Datang di Toko Kabayan</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="header__top__right">
                                <div class="header__top__links">
                                    @guest
                                    <a href="{{ route('login') }}">Masuk</a>
                                    @else
                                    <div class="header__top__hover">
                                        <span><a href="{{url ('/Profile')}}"><strong>Profil</strong><i style="margin-left: 10px" class="arrow_carrot-down"></i></a></span>
                                        <ul style="background-color: #111; width: 210px; margin-top: 10px">
                                            <li style="padding-right: 56px; width: 250px; margin-top: 10px"><a href="{{url ('/History')}}"><strong>Riwayat Pemesanan</strong></a></li>
                                            <li style="padding-right: 103px; margin-top: 10px; margin-bottom: 10px"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><strong>Keluar</strong> 
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form></li>
                                        </ul>
                                    </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <nav class="header__menu mobile-menu">
                            <ul style="font-size: 20px">
                                <li class="active"><a href="{{url ('/')}}">Beranda</a></li>
                                <li><a href="{{url ('Produk')}}">Produk</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="header__nav__option">
                            @guest
                            <a href="{{url ('Check-Out')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt=""></a>
                            @else
                            <?php
                            $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)->where('status', 'Konfirmasi Admin')->first();
                            if($pesanan_utama == null){
                                $notif = 0;
                            }else{
                            $notif = \App\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                            }
                            ?>
                            @if ($notif == 0)
                            <a href="{{url ('/')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt=""></a>
                            @else    
                            <a style="text-decoration: none; color: #212121" href="{{url ('Check-Out')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt="">{{$notif}}</a>
                            @endif
                            @endguest
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </header>
    <!-- End -->
@endsection
@section('Main')
    <!-- Notification Section Begin -->
        @if (session('status'))
        <center>
        <div style="width: 65%" class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <center><img style="width: 15px; height: 15px" src="{{asset ('assets/front/img/icon/bell.png')}}" alt="Bell">
                &nbsp;  {{ session('status')}}
            </center>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </center>
        @endif
    <!-- Notification Section End -->

    <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h4>Detail Pemesanan</h4>
                            <div class="breadcrumb__links">
                                <a href="{{url ('/')}}">Beranda</a>
                                <a href="{{url ('/History')}}">Riwayat Pemesanan</a>
                                <span>Detail Pemesanan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Breadcrumb Section End -->
    
    <!-- History Detail Section End -->
        <section class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Resi</th>
                                        <th>Produk</th>
                                        <th>Pesanan</th>
                                        <th>Jumlah Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pesanan->status == 'Proses')
                                        <center>
                                            <div class="cart__discount">
                                                <h4 style="color: red; margin-bottom: 0px">PEMBAYARAN</h4>
                                                <h4 style="color: #212121; margin-top: 15px">Silahkan Tranfer ke Rekening di Bawah ini </h4> 
                                                <b>BANK BCA A/N : Rafly Ananda dengan Nomor Rekening : 32113-821312-123</b>
                                                    <br>
                                                    Total Harga : <b> Rp. {{number_format($pesanan->jumlah_harga + $pesanan->ongkir, 0, ',', '.')}}</b></h4> 
                                                    <h5>Jika sudah melakukan pembayaran, pesanan akan segera di packing dan di kirim ke Ekspedisi</h5>
                                            </div>
                                        </center>
                                            @forelse ($pesanan_detail as $item)
                                            <tr>
                                                <td class="quantity__item">
                                                    {{$loop -> iteration}}
                                                </td>
                                                <td class="quantity__item">
                                                    @if ($item->pesanan->no_resi == null)
                                                        Belum Ada
                                                    @else
                                                        {{$item->pesanan->no_resi}}
                                                    @endif
                                                </td>
                                                @if (!empty($item->barang->id))
                                                    <td class="product__cart__item">
                                                        <div class="product__cart__item__pic">
                                                            <img style="width: 90px; height: 90px" src="{{asset ('images/'.$item->barang->foto)}}" alt="">
                                                        </div>
                                                        <div class="product__cart__item__text">
                                                            <h6>{{$item->barang->nama_barang}}</h6>
                                                            <h5>Rp. {{number_format($item->barang->harga, 0, ',', '.')}}</h5>          
                                                        </div>
                                                    </td>
                                                @else
                                                    <td class="product__cart__item">
                                                        <div class="product__cart__item__pic">
                                                            <img style="width: 90px; height: 90px" src="{{asset ('images/Produk-notfound.png')}}" alt="">
                                                        </div>
                                                        <div class="product__cart__item__text">
                                                            <h6>Produk Not Found</h6>
                                                            <h5>Rp. 0</h5>          
                                                        </div>
                                                    </td>
                                                @endif
                                                <td class="quantity__item">
                                                    <div class="quantity">
                                                        {{$item->jumlah}} Buah
                                                    </div>
                                                </td>
                                                <td class="cart__price">
                                                    Rp. {{number_format($item->jumlah_harga, 0, ',', '.')}}
                                                </td>
                                            </tr>
                                        @empty
                                            <center>
                                                <div class="cart__discount">
                                                    <h6>Anda belum check out</h6>
                                                    <h6 style="color: red">Silahkan pesan produk terlebih dahulu <a style="color: red" href="{{url ('Produk')}}">Pesan Produk</a></h6>
                                                </div>
                                            </center>
                                        @endforelse
                                        <tr>
                                            <th colspan="3"></th>
                                            <th style="font-size: 18px; font-weight: blod; background-color: #f3f2ee; padding-left: 15px">Ongkir &nbsp;: </th>
                                            <td style="background-color: #f3f2ee; color: red" class="cart__price" colspan="4">
                                                Rp. {{number_format($pesanan->ongkir, 0, ',', '.')}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="3"></th>
                                            <th style="font-size: 18px; font-weight: blod; background-color: #f3f2ee; padding-left: 15px">Kurir &nbsp;: </th>
                                            <td style="background-color: #f3f2ee; color: red" class="cart__price" colspan="4">
                                                {{($pesanan->kurir)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="3"></th>
                                            <th style="font-size: 18px; font-weight: blod; background-color: #f3f2ee; padding-left: 15px">Total &nbsp;&nbsp;&nbsp; : </th>
                                            <td style="background-color: #f3f2ee; color: red" class="cart__price">
                                                Rp. {{number_format($pesanan->jumlah_harga + $pesanan->ongkir, 0, ',', '.')}}
                                            </td>
                                        </tr>
                                    @else
                                        <center>
                                            <div class="cart__discount">
                                                <h4 style="color: green; margin-bottom: 0px">Lunas</h4>
                                                <h4 style="color: #212121; margin-top: 15px">Terimakasih sudah berbelanja di Toko Kabayan</h4>
                                            </div>
                                        </center>
                                            @forelse ($pesanan_detail as $item)
                                            <tr>
                                                <td class="quantity__item">
                                                    {{$loop -> iteration}}
                                                </td>
                                                <td class="quantity__item">
                                                    {{$item->pesanan->no_resi}}
                                                </td>
                                                @if (!empty($item->barang->id))
                                                    <td class="product__cart__item">
                                                        <div class="product__cart__item__pic">
                                                            <img style="width: 90px; height: 90px" src="{{asset ('images/'.$item->barang->foto)}}" alt="">
                                                        </div>
                                                        <div class="product__cart__item__text">
                                                            <h6>{{$item->barang->nama_barang}}</h6>
                                                            <h5>Rp. {{number_format($item->barang->harga, 0, ',', '.')}}</h5>          
                                                        </div>
                                                    </td>
                                                @else
                                                    <td class="product__cart__item">
                                                        <div class="product__cart__item__pic">
                                                            <img style="width: 90px; height: 90px" src="{{asset ('images/Produk-notfound.png')}}" alt="">
                                                        </div>
                                                        <div class="product__cart__item__text">
                                                            <h6>Produk Not Found</h6>
                                                            <h5>Rp. 0</h5>          
                                                        </div>
                                                    </td>
                                                @endif
                                                <td class="quantity__item">
                                                    <div class="quantity">
                                                        {{$item->jumlah}} Buah
                                                    </div>
                                                </td>
                                                <td class="cart__price">
                                                    Rp. {{number_format($item->jumlah_harga, 0, ',', '.')}}
                                                </td>
                                            </tr>
                                        @empty
                                            <center>
                                                <div class="cart__discount">
                                                    <h6>Anda belum check out</h6>
                                                    <h6 style="color: red">Silahkan pesan produk terlebih dahulu <a style="color: red" href="{{url ('Produk')}}">Pesan Produk</a></h6>
                                                </div>
                                            </center>
                                        @endforelse
                                            <tr>
                                                <th colspan="3"></th>
                                                <th style="font-size: 18px; font-weight: blod; background-color: #f3f2ee; padding-left: 15px">Ongkir &nbsp;: </th>
                                                <td style="background-color: #f3f2ee; color: red" class="cart__price" colspan="4">
                                                    Rp. {{number_format($pesanan->ongkir, 0, ',', '.')}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="3"></th>
                                                <th style="font-size: 18px; font-weight: blod; background-color: #f3f2ee; padding-left: 15px">Kurir &nbsp;: </th>
                                                <td style="background-color: #f3f2ee; color: red" class="cart__price" colspan="4">
                                                    {{($pesanan->kurir)}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="3"></th>
                                                <th style="font-size: 18px; font-weight: blod; background-color: #f3f2ee; padding-left: 15px">Total &nbsp;&nbsp;&nbsp; : </th>
                                                <td style="background-color: #f3f2ee; color: red" class="cart__price">
                                                    Rp. {{number_format($pesanan->jumlah_harga + $pesanan->ongkir, 0, ',', '.')}}
                                                </td>
                                            </tr>
                                            @if ($pesanan->status == 'Lunas')
                                                <tr>
                                                    <th colspan="3"></th>
                                                    <td>
                                                        <a href="{{ url('Bukti-pembelian/'.$pesanan->id) }}" style="border: none;border-radius: 10px;padding-left: 15px;padding-right: 15px;padding-top: 10px;padding-bottom: 10px;width: 243px;background-color: #000;color: #fff">Download Transaksi</a>
                                                    </td>
                                                </tr>    
                                            @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- History Detail Section End -->
@endsection