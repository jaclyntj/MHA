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
                            <center><h1>Blog: <span>Artikel</span></h1></center>
                        </div>
                        <div class="text-content container"> 
                        <div class="inner contact">
                            @foreach ($artikel as $item)
                                <h3 style="text-align:center; font-size:25px">{{ $item->judul }}</h3>
                                <p>{{ ($item->created_at)->toDateString() }}</p>
                                <br>
                                <p style="font-size:18px; text-align:justify; margin-right:50px">{{ $item->artikel }}</p>
                                <hr />
                            @endforeach
                        </div>       
            </div><!-- End Inner -->
            </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .containe close -->
    </section>    
@endsection