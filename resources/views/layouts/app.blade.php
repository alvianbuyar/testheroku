<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/rajawali-white.png') }}">
  <title>
   CV Iswara
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{ url('asset/css/nucleo-icons.css') }}" rel="stylesheet"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- CSS Files -->
  <link href="{{ url('asset/css/blk-design-system.css?v=1.0.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ url('asset/demo/demo.css') }}" rel="stylesheet" />

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="index-page">
  @include('sweet::alert')
  <div id="app">
      <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
          <div class="container">
            <div class="navbar-translate">
              <a href="{{ url('home') }}" class="navbar-brand" rel="tooltip" title="Kembali ke laman utama" data-placement="bottom" style="color: white">
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
              <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="dropdown nav-item">
                      <a href="{{ route('login') }}" class="nav-link">
                        <i class="fa fa-cogs d-lg-none d-xl-none"></i> {{ __('Login') }}
                      </a>
                    </li>

                    @if (Route::has('register'))
                      <li class="nav-item">
                        <a href="{{ route('register') }}" style="color: white" class="btn btn-neutral btn-simple btn-round" type="button">
                          {{ __('Register') }}
                          <i class="tim-icons icon-single-02" style="margin-left: 1mm"></i> 
                        </a>
                      </li>
                    @endif
                @else
                    <li>
                      <?php
                        $first_purchase = \App\purchaselog::where('id_users', Auth::user()->id)->where('purchase_status', 0)->first();
                        if (!empty($first_purchase)) 
                        {
                          $notif = \App\detail::where('id_purchaselogs', $first_purchase->id)->count();
                        }
                      ?>
                      <a href="{{ url('checkout') }}" class="nav-link">
                        <i class="tim-icons icon-cart"></i>
                        @if(!empty($notif))
                        <span class="badge badge-danger">{{ $notif }}</span>
                        @endif
                      </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a id="navbarDropdown" class="dropdown-toggle nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <i class="tim-icons icon-single-02"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('profile') }}">
                             Profile
                            </a>

                            <a class="dropdown-item" href="{{ url('history') }}">
                             History
                            </a>
                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
              </ul>
            </div>
          </div>
        </nav>

        <div class="wrapper" style="margin-top:-10mm">
          <main class="py-4">
              @yield('content')
          </main>
        </div>
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

      // project data table
      $(document).ready(function() {
          $('#myProjectTable')
          .addClass( 'nowrap' )
          .dataTable( {
              responsive: true,
              columnDefs: [
                  { targets: [-1, -3], className: 'dt-body-right' }
              ]
          });
          $('.deleterow').on('click',function(){
          var tablename = $(this).closest('table').DataTable();  
          tablename
                  .row( $(this)
                  .parents('tr') )
                  .remove()
                  .draw();
          
          } );
      });
    </script>

</body>
</html>
