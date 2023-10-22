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
                $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)->where('status', 'Konfirmasi Admin')->first();
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
                    <div class="col-lg-3 col-md-3">
                       
                    </div>
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
                            $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)->where('status','Konfirmasi Admin')->first();
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
    <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h4>Riwayat Pemesanan</h4>
                            <div class="breadcrumb__links">
                                <a href="{{url ('/')}}">Beranda</a>
                                <span>Riwayat Pemesanan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Breadcrumb Section End -->
    
    <!-- Check Out Section End -->
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
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Jumlah Harga</th>
                                        <th></th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @forelse ($pesanan as $item)
                                        <tr>
                                            <td class="quantity__item">
                                                <h6>{{$loop -> iteration}}</h6>
                                            </td>
                                            <td class="quantity__item">
                                                @if ($item->no_resi == null)
                                                    <h6>Belum Ada</h6>
                                                @else
                                                    <h6>{{$item->no_resi}}</h6>
                                                @endif
                                            </td>
                                            <td class="quantity__item">
                                                <h6>{{$item->tanggal}}</h6>
                                            </td>
                                            <td class="quantity__item" style="width: 21.5%">
                                                <h6>
                                                    @if ($item->ongkir == null)
                                                        Menunggu Konfirmasi
                                                        @elseif ($item->status == 'Proses')
                                                        Belum Melakukan Pembayaran
                                                    @else
                                                        Lunas
                                                    @endif
                                                </h6>
                                            </td>
                                            <td class="cart__price">Rp. {{number_format($item->jumlah_harga + $item->ongkir, 0, ',', '.')}}</td>
                                            <td class="cart__price" style="padding-left: 12.5%">
                                                <a href="{{'History/'.$item->id}}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Check Out Section End -->
@endsection