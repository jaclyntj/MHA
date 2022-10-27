<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Rumah Makan Mie Hokkien Akheng</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSS
        ================================================ -->
        <!-- Owl Carousel -->
		<link rel="stylesheet" href="/resto/css/owl.carousel.css">
        <!-- bootstrap.min css -->
		<link rel="stylesheet" href="/resto/css/bootstrap.min.css">
        <!-- Font-awesome.min css -->
		<link rel="stylesheet" href="/resto/css/font-awesome.min.css">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="/resto/css/animate.min.css">

		<link rel="stylesheet" href="/resto/css/main.css">
        <!-- Responsive Stylesheet -->
		<link rel="stylesheet" href="/resto/css/responsive.css">
		<!-- Js -->
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"></script>
    <script src="/resto/js/jquery.nav.js"></script>
    <script src="/resto/js/jquery.sticky.js"></script>
    <script src="/resto/js/bootstrap.min.js"></script>
    <script src="/resto/js/plugins.js"></script>
    <script src="/resto/js/wow.min.js"></script>
    <script src="/resto/js/main.js"></script>
	</head>
	<body>
	<!--
	header-img start 
	============================== -->
    <section id="hero-area">
      <img class="img-responsive" width="1920px" height="699px" src='{{ asset("resto/images/header.jpg") }}' alt="">
    </section>
	<!--
    Header start 
	============================== -->
	<nav id="navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <nav class="navbar navbar-default">
                          <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav" id="top-nav">
                                <li><a href="/">Home</a></li>
                                <li><a href="/menu">Menu</a></li>
                                <li><a href="/reservasi">Reservasi</a></li>
                                <li><a href="/daftar-tagihan">Daftar Tagihan</a></li>
                                <li><a href="/blog">Blog</a></li>
                              </ul>
                              @yield('log')
        
                            </div><!-- /.navbar-collapse -->
                          </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
	</nav><!-- header close -->
    <!--
    Content start
    ============================== -->
    @yield('content')
    <!-- content close -->
    <!--
    footer  start
    ============================= -->
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="block wow fadeInLeft"  data-wow-delay="200ms">
                        <h3>CONTACT <span>INFO</span></h3>
                        <div class="info">
                            <ul>
                                <li>
                                  <h4><i class="fa fa-phone"></i>Telephone</h4>
                                  <p>(061) 4144595</p>
                                    
                                </li>
                                <li>
                                  <h4><i class="fa fa-map-marker"></i>Address</h4>
                                  <p>Jl. Bangka No. 100/106, Gg. Buntu</p>
                                  <p>Kec. Medan Timur, Kota Medan, Sumatera Utara 20231</p>
                                </li>
                                <li>
                                  <h4><i class="fa fa-envelope"></i>Whatsapp</h4>
                                  <p>+62 812-6580-8288</p>
                                  
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- .col-md-4 close -->
                <div class="col-md-4">
                    <div class="block wow fadeInLeft"  data-wow-delay="700ms">
                        <h3>FOLLOW <span>US</span></h3>
                        <div class="social-media-link">
                            <ul>
                                <li>
                                    <a href="http://instagram.com/miehokkien_akheng">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- .col-md-4 close -->
                <div class="col-md-4">
                    <div class="block wow fadeInLeft"  data-wow-delay="1100ms">
                        <div class="gallary">
                            <h3>PHOTO <span>STREAM</span></h3>
                            <ul>
                                <li>
                                    <a href="#"><img src='{{ asset("resto/images/photo/photo-1.jpg") }}' width="100px"></a>
                                </li>
                                <li>
                                    <a href="#"><img src='{{ asset("resto/images/photo/photo-2.jpg") }}' width="100px"></a>
                                </li>
                                <li>
                                    <a href="#"><img src='{{ asset("resto/images/photo/photo-3.jpg") }}' width="100px"></a>
                                </li>
                                <li>
                                    <a href="#"><img src='{{ asset("resto/images/photo/photo-4.jpg") }}' width="100px"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- .col-md-4 close -->
            </div><!-- .row close -->
        </div><!-- .containe close -->
    </section><!-- #footer close -->
    <!--
    footer-bottom  start
    ============================= -->
    <footer id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="block">
                        <p>Copyright &copy; 2014 - All Rights Reserved.Design and Developed By <a href="http://www.themefisher.com">Themefisher</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	</body>
</html>