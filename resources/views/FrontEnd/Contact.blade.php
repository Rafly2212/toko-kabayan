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
                    <div class="col-lg-3 col-md-3">
                        <div class="header__logo">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <nav class="header__menu mobile-menu">
                            <ul style="font-size: 20px">
                                <li><a href="{{url ('/')}}">Beranda</a></li>
                                <li><a href="{{url ('Produk')}}">Produk</a></li>
                                <li class="active"><a href="{{url ('Kontak')}}">Tentang Toko</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="header__nav__option">
                            @guest
                            <a href="{{url ('Check-Out')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt=""></a>
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
    <!-- Map Begin -->
        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.4849619190254!2d107.60261007606043!3d-6.832308093165674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e12bd0f3e4f5%3A0xf8643234807b1e02!2sOleh2%20kabayan%203!5e0!3m2!1sid!2sid!4v1696156804581!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
        <section class="contact spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__text">
                            <div class="section-title">
                                <h2>Kontak Kami</h2>
                                <p>Hubungi kami jika terdapat error pada website atau jika ingin memberikan saran</p>
                            </div>
                            <ul>
                                <li>
                                    <h4>Bandung Barat</h4>
                                    <p>Jl. Raya Lembang No.75, Gudangkahuripan, Kec. Lembang, Kabupaten Bandung Barat, Jawa Barat 40391<br/>+62 813-9490-8783</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <div class="footer__logo">
                            <p>Toko Kabayan</p>
                            </div>
                            <p>Selamat datang di Toko Kabayan dan selamat berbelanja</p>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                        <div class="footer__widget">
                            <h6>Produk</h6>
                            <ul>
                                <li><a href="{{url ('/Produk')}}">Bolu</a></li>
                                <li><a href="{{url ('/Produk')}}">Kripik</a></li>
                                <li><a href="{{url ('/Produk')}}">Bolen</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="footer__widget">
                            <h6>Menu</h6>
                            <ul>
                                <li><a href="{{url ('/')}}">Beranda</a></li>
                                <li><a href="{{url ('Produk')}}">Produk</a></li>
                                <li><a href="{{url ('Kontak')}}">Tentang Toko</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                        <div class="footer__widget">
                            <h6>Lokasi</h6>
                            <div class="footer__newslatter">
                                <p>Jl. Raya Lembang No.75, Gudangkahuripan, Kec. Lembang, Kabupaten Bandung Barat, Jawa Barat 40391</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <!-- Footer Section End -->
@endsection