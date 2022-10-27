@extends('layouts.restaurant')

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-T8lPeRmK42ldPOml"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

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
                                <h1 style="text-align:center">Pembayaran</h1>
                            </div>
                            <div class="text-content container"> 
                                <form action="" id="submit_form" method="POST">
                                    @csrf
                                    <input type="hidden" name="json" id="json_callback">
                                </form>
                                  <script type="text/javascript">
                                    window.snap.pay('{{$snap_token}}', {
                                        onSuccess: function(result){
                                            /* You may add your own implementation here */
                                            console.log(result);
                                            send_response_to_form(result);
                                        },
                                        onPending: function(result){
                                            /* You may add your own implementation here */
                                            console.log(result);
                                            send_response_to_form(result);
                                        },
                                        onError: function(result){
                                            /* You may add your own implementation here */
                                            console.log(result);
                                            send_response_to_form(result);
                                        },
                                        onClose: function(){
                                            /* You may add your own implementation here */
                                            alert('you closed the popup without finishing the payment');
                                            window.location.href = "/daftar-tagihan";
                                        }
                                    });

                                    function send_response_to_form(result) {
                                    document.getElementById('json_callback').value = JSON.stringify(result);
                                    $('#submit_form').submit();
                                    }
                                  </script>
                             
                </div><!-- End Inner -->
                </div><!-- .col-md-12 close -->
                </div><!-- .row close -->
            </div><!-- .containe close -->
        </section>    
@endsection