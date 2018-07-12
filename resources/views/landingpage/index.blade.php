<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Toko Penjualan Sepeda Terpercaya</title>

    <!-- Styles -->
    {{ Html::style('landingpage/css/bootstrap.css') }}
    {{ Html::style('landingpage/css/linearicons.css') }}
    {{ Html::style('landingpage/css/owl.carousel.css') }}
    {{ Html::style('landingpage/css/font-awesome.min.css') }}
    {{ Html::style('landingpage/css/nice-select.css') }}
    {{ Html::style('landingpage/css/magnific-popup.css') }}
    {{ Html::style('landingpage/css/main.css') }}

    {{ Html::style(url('https://fonts.googleapis.com/css?family=Poppins:300,500,600')) }}

  </head>
  <body>
      <div class="main-wrapper-first">
        <header>
          <div class="container">
            <div class="header-wrap">
              <div class="header-top d-flex justify-content-between align-items-center">
                <div class="logo">
                  <a href="{{ url('/') }}"><img src="landingpage/img/logo2.png" alt=""></a>
                </div>
                <div class="main-menubar d-flex align-items-center">
                  <nav class="hide">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="generic.html">Generic</a>
                    <a href="elements.html">Elements</a>
                  </nav>
                  <div class="menu-bar"><span class="lnr lnr-menu"></span></div>
                </div>
              </div>
            </div>
          </div>
        </header>
      </div>
      <div class="main-wrapper">
        <div class="active-banner-slider">
          <div class="item d-flex align-items-center">
            <div class="container">
              <div class="content">
                <h1 class="text-white text-uppercase">Ali Cycle, <br> Toko Sepeda Terpercaya</h1>
                <p class="text-white">Melayani anda dengan sepenuh hati dan jujur para penggemar & pecinta sepeda.   <br>Kami menyediakan berbagai macam jenis dan merk sepeda mulai dari anak-anak sampai dewasa.</p>
                <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Datang di toko kami</span><span class="lnr lnr-arrow-down"></span></a>
              </div>
            </div>
          </div>
          <div class="item d-flex align-items-center">
            <div class="container">
              <div class="content">
                <h1 class="text-white text-uppercase">Instead of eating, <br> you should feel the garnishing</h1>
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor  <br>incididunt ut labore et dolore magna aliqua.</p>
                <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Get Started</span><span class="lnr lnr-arrow-right"></span></a>
              </div>
            </div>
          </div>
          <div class="item d-flex align-items-center">
            <div class="container">
              <div class="content">
                <h1 class="text-white text-uppercase">Instead of eating, <br> you should feel the garnishing</h1>
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor  <br>incididunt ut labore et dolore magna aliqua.</p>
                <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Get Started</span><span class="lnr lnr-arrow-right"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="main-wrapper">
        <!-- Start Feature Area -->
        <section class="featured-area">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="single-feature">
                  <div class="icon">
                    <span class="lnr lnr-sun"></span>
                  </div>
                  <div class="desc text-center">
                    <h6 class="title text-uppercase">Stunning Visuals</h6>
                    <p>Here, I focus on a range of items and features that we use in life without giving them a second thought such as Coca Cola, body</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-feature">
                  <div class="icon">
                    <span class="lnr lnr-code"></span>
                  </div>
                  <div class="desc text-center">
                    <h6 class="title text-uppercase">Clean Code</h6>
                    <p>Over 92% of computers are infected with Adware and spyware. Such software is rarely accompanied by uninstall utility </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-feature">
                  <div class="icon">
                    <span class="lnr lnr-clock"></span>
                  </div>
                  <div class="desc text-center">
                    <h6 class="title text-uppercase">Punctuality</h6>
                    <p>If you own an Iphone, you’ve probably already worked out how much fun it is to use it to watch movies-it has that nice big screen</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Feature Area -->
        <!-- Start Story Area -->
        <section class="story-area">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3">
                <div class="story-title">
                  <h3 class="text-white">Our Untold Story</h3>
                  <span class="text-uppercase text-white">Re-imagining the way</span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="story-box">
                  <h6 class="text-uppercase">From the part of beginning</h6>
                  <p>Usage of the Internet is becoming more common due to rapid advancement of technology and the power of globalization. Societies are becoming more inter-connected. Thoughts from different</p>
                  <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Get Started</span><span class="lnr lnr-arrow-right"></span></a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Story Area -->

        <!-- Start Amazing Works Area -->

        <section class="amazing-works-area">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="section-title text-center">
                  <h3>Our Amazing Works</h3>
                  <span class="text-uppercase">Re-imagining the way</span>
                </div>
              </div>
            </div>
            <div class="active-works-carousel mt-40">
              <div class="item">
                <div class="thumb" style="background: url(landingpage/img/c1.jpg);"></div>
                <div class="caption text-center">
                  <h6 class="text-uppercase">Vector Illustration</h6>
                  <p>LCD screens are uniquely modern in style, and the liquid crystals <br> that make them work have allowed humanity to</p>
                </div>
              </div>
              <div class="item">
                <div class="thumb" style="background: url(landingpage/img/c1.jpg);"></div>
                <div class="caption text-center">
                  <h6 class="text-uppercase">Vector Illustration</h6>
                  <p>LCD screens are uniquely modern in style, and the liquid crystals <br> that make them work have allowed humanity to</p>
                </div>
              </div>
              <div class="item">
                <div class="thumb" style="background: url(landingpage/img/c1.jpg);"></div>
                <div class="caption text-center">
                  <h6 class="text-uppercase">Vector Illustration</h6>
                  <p>LCD screens are uniquely modern in style, and the liquid crystals <br> that make them work have allowed humanity to</p>
                </div>
              </div>
              <div class="item">
                <div class="thumb" style="background: url(landingpage/img/c1.jpg);"></div>
                <div class="caption text-center">
                  <h6 class="text-uppercase">Vector Illustration</h6>
                  <p>LCD screens are uniquely modern in style, and the liquid crystals <br> that make them work have allowed humanity to</p>
                </div>
              </div>
              <div class="item">
                <div class="thumb" style="background: url(landingpage/img/c1.jpg);"></div>
                <div class="caption text-center">
                  <h6 class="text-uppercase">Vector Illustration</h6>
                  <p>LCD screens are uniquely modern in style, and the liquid crystals <br> that make them work have allowed humanity to</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Amazing Works Area -->
        <!-- Start Story Area -->
        <section class="story-area-2">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3">
                <div class="story-title sm-show text-center">
                  <h3 class="text-white">Our Untold Story</h3>
                  <span class="text-uppercase text-white">Re-imagining the way</span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="story-box">
                  <h6 class="text-uppercase">From the part of beginning</h6>
                  <p>Usage of the Internet is becoming more common due to rapid advancement of technology and the power of globalization. Societies are becoming more inter-connected. Thoughts from different</p>
                  <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Get Started</span><span class="lnr lnr-arrow-right"></span></a>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="story-title sm-hide text-right">
                  <h3 class="text-white">Our Untold Story</h3>
                  <span class="text-uppercase text-white">Re-imagining the way</span>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Story Area -->
        <div class="brand-area">
          <div class="container">
            <div class="total-brand d-flex justify-content-around">
              <img src="landingpage/img/w1.png" alt="">
              <img src="landingpage/img/w2.png" alt="">
              <img src="landingpage/img/w3.png" alt="">
              <img src="landingpage/img/w4.png" alt="">
              <img src="landingpage/img/w5.png" alt="">
            </div>
          </div>
        </div>
        <!-- Start Subscription Area -->
        <section class="subscription-area">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="section-title text-center">
                  <h3>Subscribe for our Newsletter</h3>
                  <span class="text-uppercase">Re-imagining the way</span>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <div id="mc_embed_signup">
                  <form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01" method="get" class="subscription relative">
                    <input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required>
                    <div style="position: absolute; left: -5000px;">
                      <input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
                    </div>
                    <button class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Get Started</span><span class="lnr lnr-arrow-right"></span></button>
                    <div class="info"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Subscription Area -->
        <!-- Start Footer Widget Area -->
        <section class="footer-widget-area">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="single-widget d-flex flex-wrap justify-content-between">
                  <div class="icon d-flex align-items-center justify-content-center">
                    <span class="lnr lnr-pushpin"></span>
                  </div>
                  <div class="desc">
                    <h6 class="title text-uppercase">Alamat</h6>
                    <p>Jl. Jend. Sudirman No. 116, Kupang Dalangan, Kupang, Ambarawa, Semarang</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-widget d-flex flex-wrap justify-content-between">
                  <div class="icon d-flex align-items-center justify-content-center">
                    <span class="lnr lnr-earth"></span>
                  </div>
                  <div class="desc">
                    <h6 class="title text-uppercase">Alamat Email</h6>
                    <div class="contact">
                      <a href="mailto:support.alicycle@gmail.com">support.alicycle@gmail.com</a>
                      <a href="mailto:achmadkafin.99@gmail.com">achmadkafin.99@gmail.com</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-widget d-flex flex-wrap justify-content-between">
                  <div class="icon d-flex align-items-center justify-content-center">
                    <span class="lnr lnr-phone"></span>
                  </div>
                  <div class="desc">
                    <h6 class="title text-uppercase">Nomer Telephone</h6>
                    <div class="contact">
                      <a href="tel:085 866 622 257">085 866 622 257</a><br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <footer>
            <div class="container">
              <div class="footer-content d-flex justify-content-between align-items-center flex-wrap">
                <div class="logo">
                  <a href="{{ url('/') }}"><img src="landingpage/img/f-logo2.png" alt=""></a>
                </div>
                <div class="copy-right-text">Copyright &copy; 2018  |  Ali Cycle - Dev All rights reserved. This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></div>
                <div class="footer-social">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-dribbble"></i></a>
                  <a href="#"><i class="fa fa-behance"></i></a>
                </div>
              </div>
            </div>
          </footer>
        </section>
        <!-- End Footer Widget Area -->

      </div>
      <!-- Scripts -->
      {{ Html::script(url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js')) }}
      <!-- jQuery -->
      {{ Html::script(url('landingpage/js/vendor/jquery-2.2.4.min.js')) }}
      <!-- Bootstrap Core JavaScript -->
      {{ Html::script(url('landingpage/js/vendor/bootstrap.min.js')) }}
      <!-- Metis Menu Plugin JavaScript -->
      {{ Html::script(url('landingpage/js/jquery.ajaxchimp.min.js')) }}
      <!-- Morris Charts JavaScript -->
      {{ Html::script(url('landingpage/js/owl.carousel.min.js')) }}
      {{ Html::script(url('landingpage/js/jquery.nice-select.min.js')) }}
      {{ Html::script(url('landingpage/js/jquery.magnific-popup.min.js')) }}
      <!-- Custom Theme JavaScript -->
      {{ Html::script(url('landingpage/js/main.js')) }}

      @stack('ext_js')
      <script>
          $('div.notifier').not('.alert-important').delay(5000).fadeOut(350);
      </script>
      <script>
          $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
          });
      </script>
      @yield('script')
</body>
</html>
