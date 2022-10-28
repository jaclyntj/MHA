@extends('layouts.restaurant')

@if(Auth::check())
    @section('log')
    <ul class="nav navbar-nav navbar-right" id="top-nav">
        <li>
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
    @endsection
@else
    @section('log')
    <ul class="nav navbar-nav navbar-right" id="top-nav">
        <li><a href="/login">Log In</a></li>
    </ul>
    @endsection
@endif

@section('content')
   <!--
    menu start
    ============================ -->
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1 class="heading">Our <span>Menu</span></h1>
                        <ul>
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <form action='pesan' method="POST">
                            @csrf
                            <?php $idx=0 ?>
                            @foreach ($menu as $item)
                            <li class="wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="300ms">
                                @if ($item->gambar == null)
                                <div class="blog-img">
                                    <img src="\image\no-image.jpg" width="285px" height="300px">
                                </div>
                                @else
                                <div class="blog-img">
                                    <img src="/public/image/{{ $item->gambar }}" width="285px" height="300px">
                                </div>
                                @endif
                                <div class="content-right">
                                    <h3>{{ $item->nama }}</h3>
                                    <p>{{ $item->deskripsi }}</p>
                                    <p>Rp{{ $item->harga }}</p>
                                    <p></p>
                                    <input type="number" style="width:50px" name={{"qty".$idx}} id="qty"/>
                                    <?php
                                        $idx++;
                                    ?>
                                </div>
                            </li>
                            @endforeach
                                <button type="submit" class="btn btn-default btn-more-info wow bounceIn" values="cart" name="cart">Masukkan ke keranjang</button>
                            </form>
                        </ul>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .containe close -->
    </section><!-- menu close -->
@endsection