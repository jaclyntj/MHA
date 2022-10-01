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
        <section  id="reservation"  class="description_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="title">
                                <h1 style="text-align:center">Daftar <span>Tagihan</span></h1>
                            </div>

                            @if ($pesanan->isEmpty())
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Belum ada tagihan.</strong>
                                </div>
                            @endif

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            <form action="pembayaran" method="GET">
                            @csrf
                            <div class="text-content container"> 
                                <table class=table>
                                    <tr>
                                        <th style="text-align: center">No</th><th style="text-align: center">Total Tagihan</th><th></th>
                                    </tr>
                                        <?php 
                                            $x=1;
                                            $idx=0;
                                        ?>
                                        @foreach ($pesanan as $item)
                                            <tr>
                                                <td style="text-align: center">{{$x}}</td><td style="text-align: center">{{$item->totalharga}}</td><td><button class="btn btn-default wow bounceIn" type="submit" style="width:100px; color:white; font:14pt; background-color:#ff530a; border:#ff530a" name={{"bayar".$idx}}>Bayar</button></td>
                                                <?php 
                                                    $x++;
                                                    $idx++;
                                                ?>
                                            </tr>
                                        @endforeach
                                </table>
                            </form>
                            @if(session('alert-success'))
                            <script>alert("{{session('alert-success')}}")</script>
                            @elseif(session('alert-failed'))
                            <script>alert("{{session('alert-failed')}}")</script>
                            @endif
                            </div><!-- End Inner -->
                </div><!-- .col-md-12 close -->
                </div><!-- .row close -->
            </div><!-- .containe close -->
        </section>    
@endsection