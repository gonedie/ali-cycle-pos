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
                <h1 class="text-white text-uppercase">Ali Cycle, <br> Toko Sepeda Terpercaya</h1>
                <p class="text-white">Melayani anda dengan sepenuh hati dan jujur para penggemar & pecinta sepeda.   <br>Kami menyediakan berbagai macam jenis dan merk sepeda mulai dari anak-anak sampai dewasa.</p>
                <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Datang di toko kami</span><span class="lnr lnr-arrow-down"></span></a>
              </div>
            </div>
          </div>
          <div class="item d-flex align-items-center">
            <div class="container">
              <div class="content">
                <h1 class="text-white text-uppercase">Ali Cycle, <br> Toko Sepeda Terpercaya</h1>
                <p class="text-white">Melayani anda dengan sepenuh hati dan jujur para penggemar & pecinta sepeda.   <br>Kami menyediakan berbagai macam jenis dan merk sepeda mulai dari anak-anak sampai dewasa.</p>
                <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Datang di toko kami</span><span class="lnr lnr-arrow-down"></span></a>
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
                    <h6 class="title text-uppercase">Sepeda Baru</h6>
                    <p>Menjual berbagai macam jenis sepeda dengan kondisi baru atau bekas </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-feature">
                  <div class="icon">
                    <span class="lnr lnr-code"></span>
                  </div>
                  <div class="desc text-center">
                    <h6 class="title text-uppercase">Aksesoris Sepeda</h6>
                    <p>Menjual berbagai macam aksesoris atau spare part sepeda </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-feature">
                  <div class="icon">
                    <span class="lnr lnr-clock"></span>
                  </div>
                  <div class="desc text-center">
                    <h6 class="title text-uppercase">Service Sepeda</h6>
                    <p>Melayani jasa perbaikan atau service sepeda</p>
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
                  <h4 class="text-white">Kisah Tak Terungkap</h4>
                  <span class="text-uppercase text-white">Kembali untuk Sehat</span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="story-box">
                  <h6 class="text-uppercase">Merayakan Hidup dengan Bersepeda</h6>
                  <p>"Hidup ini laksana naik sepeda. Untuk mempertahankan keseimbangan, kamu harus tetap bergerak."
                    <br>Tak ada kesenangan sederhana dan olah raga sehat yang bisa dibandingkan dengan naik sepeda.
                    <br><br>Source: <a href="https://nasional.kompas.com/read/2010/06/25/09534030/Mereka.Merayakan.Hidup.dengan.Bersepeda" target="_blank" style="color:blue">Kompas</a>
                  </p>
                  <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Datang di toko kami</span><span class="lnr lnr-arrow-down"></span></a>
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
                  <h3>Jenis Kategori Sepeda Kami</h3>
                  <span class="text-uppercase">Berbagai macam tipe sepeda</span>
                </div>
              </div>
            </div>
            <div class="active-works-carousel mt-40">
              <div class="item">
                <div class="thumb" style="background: url(landingpage/img/mtb.png);"></div>
                <div class="caption text-center">
                  <h6 class="text-uppercase">Montain Bike (MTB)</h6>
                  <p>Sepeda Gunung atau biasa disebut MTB ini dirancang untuk jalur off-road dengan rintangan
                    minimum hingga menengah. Saat memakai Hardtail MTB, saat mengayuh, kamu akan merasakan kayuhan yang
                    sangat baik.</p>
                </div>
              </div>
              <div class="item">
                <div class="thumb" style="background: url(landingpage/img/onthel.jpg);"></div>
                <div class="caption text-center">
                  <h6 class="text-uppercase">Ontel Klasik</h6>
                  <p>Sepeda ontel ini sering disebut dengan sepeda kebo, atau pit pancal. Sepeda ini sangat klasik karena mengacu
                  pada desain Belanda bercirikan posisi duduk tegak dan memiliki reputasi yang sangat kuat dan berkualitas tinggi</p>
                </div>
              </div>
              <div class="item">
                <div class="thumb" style="background: url(landingpage/img/baby.jpg);"></div>
                <div class="caption text-center">
                  <h6 class="text-uppercase">Baby Walker</h6>
                  <p> Baby walker sering dianggap sebagai alat bantu bayi belajar berjalan. Selain itu,
                    dengan baby walker, orangtua bisa mengalihkan perhatian bayi sejenak, bayi bisa bermain dan
                    berjelajah sendiri selama orangtua menyelesaikan pekerjaannya. </p>
                </div>
              </div>
              <div class="item">
                <div class="thumb" style="background: url(landingpage/img/bmx.jpg);"></div>
                <div class="caption text-center">
                  <h6 class="text-uppercase">BMX</h6>
                  <p>Sepeda ini dirancang khusus untuk yang hobi melakukan loncatan–loncatan tinggi dan ekstrim sambil berkendara di jalanan perkotaan atau tempat khusus. </p>
                </div>
              </div>
              <div class="item">
                <div class="thumb" style="background: url(landingpage/img/3.jpg);"></div>
                <div class="caption text-center">
                  <h6 class="text-uppercase">Sepeda Roda Tiga</h6>
                  <p>Sepeda ini dirancang untuk membuat anak-anak usia 2-5 tahun senang ketika jalan-jalan menggunakan Sepeda
                  ini karena dilengkapi berbagai macam mainan</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Amazing Works Area -->
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
