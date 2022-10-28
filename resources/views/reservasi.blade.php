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
                                <h1 style="text-align:center">Reserve <span>A Table</span></h1>
                            </div>
                            <div class="text-content container"> 

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
    
                            <h3 style="text-align:center">How to reserve?</h3>
                            <p style="text-align:center">1. Pastikan Anda sudah log in ke dalam web.</p>
                            <p style="text-align:center">2. Reservasi hanya bisa dilakukan pada hari yang sama atau hari berikutnya.</p>
                            <p style="text-align:center">3. Pastikan waktu reservasi berada di dalam jam buka rumah makan.</p>
                            <p style="text-align:center">4. Isi data sesuai dengan yang diminta.</p>
                            <br><br>

                            <div class="inner contact">
                                <!-- Form Area -->
                                <div class="contact-form">
                                    <!-- Form -->
                                    <form id="reservasi" action="reservasi" method="post">
                                        @csrf
                                        <!-- Left Inputs -->
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="row">
                                                            <input style="width:350px; font-size:16pt" class="center-block" type="text" name="nama" required="required" class="form" placeholder="Nama" />
                                                        </div>
                                                        <div class="row">
                                                            <input style="width:350px; font-size:16pt" class="center-block" type="date" name="tanggal" required="required" class="form" placeholder="Reservation Date" />
                                                        </div>
                                                        <div class="row">
                                                            <input style="width:350px; font-size:16pt" class="center-block" type="time" name="waktu" required="required" class="form" placeholder="Reservation Time" />
                                                        </div>
                                                        <div class="row">
                                                            <input style="width:350px; font-size:16pt" class="center-block" type="text" name="jumlah_pax" required="required" class="form" placeholder="Jumlah Pax" />
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                </div>
                                            
                                                <div class="col-lg-4 col-md-6 col-xs-12">
                                                    <!-- Message -->
                                                    <div class="right-text">
                                                        <h2>Opening Hours</h2><hr>
                                                        <p>Monday to Saturday: 06:30 AM - 02:30 PM</p>
                                                        <p>Sunday: 06:30 AM - 01:00 PM</p>
                                                        <p></p>
                                                        <p>Notes:</p>
                                                        <p>Only accepting reservations up to 12:59 PM.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Send Button -->
                                                <button class="btn btn-default wow bounceIn center-block" style="width:150px; font-size: 14pt; background-color: #ff530a; color:white; border:#ff530a" type="submit" id="submit" name="submit">Reservasi</button>
                                        </div>
                                        </div>
                                    </div>
                            <!-- Clear -->
                            <div class="clear"></div>
                        </form>
                    </div><!-- End Reservation Form Area -->
                </div><!-- End Inner -->
                </div><!-- .col-md-12 close -->
                </div><!-- .row close -->
            </div><!-- .container close -->
        </section>    
@endsection