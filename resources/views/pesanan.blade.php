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
    blog start
    ============================ -->
    <section  id="vlog"  class="description_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="title">
                            <center><h1><span>Pesanan</span></h1></center>
                        </div>
                        <div class="text-content container"> 
                        <div class="inner contact">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            <form method="POST" action="tagihan">
                                @csrf
                                <input type="button" class="btn btn-default wow bounceIn" value="Edit Pesanan" style="color:white; background-color:#ff530a; border:#ff530a" onclick="history.back()"/>
                                <br>
                                <br>
                            <table class=table>
                                <tr>
                                    <th>No</th><th>Nama</th><th>Qty</th><th>Harga</th><th></th>
                                </tr>
                                    <?php 
                                        $x=0;
                                        $total=0; 
                                    ?>
                                    @foreach ($itempesanan as $item)
                                    <?php $x++ ?>
                                        <tr>
                                            <td>{{$x}}</td><td>{{$item->nama}}</td><td>{{$item->qty}}</td><td>{{$item->harga}}</td>
                                            <?php
                                                $price = $item->qty * $item->harga; 
                                                $total += $price;
                                            ?>
                                        </tr>
                                        <input type="hidden" name="idx" value="{{$item->id_pesanan}}">
                                    @endforeach
                                        <tr>
                                            <td colspan="3">Total Harga</td><td>Rp{{$total}}</td>
                                            <input type="hidden" name="total" value="{{$total}}">
                                        </tr>
                            </table>
                                <input type="textarea" style="width:250px; height:50px; border-radius:5px" name="notes" placeholder="Silakan isi bila ada pesan tambahan..">
                                <button class="btn btn-default wow bounceIn" style="float:right; margin-right:320px; width:150px; color:white; font:14pt; background-color:#ff530a; border:#ff530a" type="submit" name="pesan">PESAN</button>
                            </form>

                        </div>       
            </div><!-- End Inner -->
            </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .containe close -->
    </section>    
@endsection