<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="asset/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/rajawali-white.png') }}">
  <title>
   CV Iswara
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{ asset('asset/css/nucleo-icons.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('asset/css/blk-design-system.css?v=1.0.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('asset/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="index-page">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" rel="tooltip" title="Kembali ke laman utama" data-placement="bottom" target="_blank" style="color: white">
          <span>CV</span> Iswara
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
                CV Iswara
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        {{-- @if (Route::has('login'))
        @auth --}}
          <a href="{{ url('/home') }}" style="color: white" class="btn btn-neutral btn-simple btn-round" type="button">
            Belanja
            <i class="tim-icons icon-bag-16" style="margin-left: 1mm"></i> 
          </a>
        {{-- @else
        <ul class="navbar-nav">
          <li class="dropdown nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <i class="fa fa-cogs d-lg-none d-xl-none"></i> Login
            </a>
          </li>
          @if (Route::has('register'))
               <li class="nav-item">
                   <a href="{{ route('register') }}" class="nav-link btn btn-default d-none d-lg-block">
                       <i class="material-icons">person</i> Register
                   </a>
               </li>
               @endif
          @endauth
        @endif
        </ul> --}}
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header header-filter">
      <div class="squares square1"></div>
      <div class="squares square2"></div>
      <div class="squares square3"></div>
      <div class="squares square4"></div>
      <div class="squares square5"></div>
      <div class="squares square6"></div>
      <div class="squares square7"></div>
      <div class="container">
        <div class="content-center brand">
          <h1 class="h1-seo">CV Iswara</h1>
          <h3>Tempat Belanja Oksigen Dengan Cepat dan Mudah</h3>
        </div>
      </div>
    </div>
        <div class="section">
          <div class="container">
            <div class="row justify-content-between align-items-center">
              <div class="col-lg-5 mb-5 mb-lg-0 ">
                <h2 class="text-white font-weight-light">Dapatkan oksigen dengan mudah</h2>
                <p class="text-white mt-4">Disini kami menyediakan oksigen + regulator. Selain melakukan pemesanan, anda juga dapat meminjam tabung oksigen dengan mudah. Silahkan cek informasi tata cara melakukan pemesanan dan peminjaman</p>
                <a href="#" class="btn btn-warning mt-4" data-toggle="modal" data-target="#modal">Lihat Detail</a>
              </div>
              <div class="col-lg-6">
                <div id="carouselExampleControls" class="carousel slide">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="asset/img/oksigen1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="asset/img/oksigen2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="asset/img/oksigen3.jpg" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <i class="tim-icons icon-minimal-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <i class="tim-icons icon-minimal-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('modal')
        
      <div class="section section-download" id="#download-section" data-background-color="black" style="margin-top: -1cm">
        <img src="asset/img/path1.png" class="path">
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="text-center col-md-12 col-lg-8">
              <h2 class="title">Daftarkan Diri Anda!!</h2>
              <h4 class="description">Dapatkan oksigen lebih cepat dan mudah di CV Iswara Tiga Putra, jangan lupa untuk daftarkan diri anda terlebih dahulu sebelum melakukan pemesanan dan dapatkan penawaran menarik!!</h4>
            </div>
            @if (Route::has('register'))
               <div class="text-center col-md-12 col-lg-8" style="margin-bottom: 3cm">
                   <a href="{{ route('register') }}" class="btn btn-primary btn-round btn-lg" role="button">
                       Register
                   </a>
               </div>
            @endif
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h1 class="title">CV Iswara</h1>
          </div>
          <div class="col-md-3">
            <ul class="nav">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Profile
                </a>
              </li>
              <li class="nav-item">
               <a href="#" class="nav-link">
                 Blog
               </a>
             </li>
             <li class="nav-item">
               <a href="#" class="nav-link">
                 License
               </a>
             </li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="nav">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Contact Us
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  About Us
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="title">Follow us:</h3>
            <div class="btn-wrapper profile">
              <a target="_blank" href="#" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-twitter"></i>
              </a>
              <a target="_blank" href="#" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Like us">
                <i class="fab fa-facebook-square"></i>
              </a>
              <a target="_blank" href="#" class="btn btn-icon btn-neutral  btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-dribbble"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('asset/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('asset/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('asset/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('asset/js/plugins/bootstrap-switch.js') }}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('asset/js/plugins/nouislider.min.js') }}"></script>
  <!-- Chart JS -->
  <script src="{{ asset('asset/js/plugins/chartjs.min.js') }}"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="{{ asset('asset/js/plugins/moment.min.js') }}"></script>
  <script src="{{ asset('asset/js/plugins/bootstrap-datetimepicker.js') }}"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('asset/demo/demo.js') }}"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('asset/js/blk-design-system.min.js?v=1.0.0') }}"></script>
  <script>
    $(document).ready(function() {
      blackKit.initDatePicker();
      blackKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</body>

</html>
