<!doctype html>
<html lang="es">

<head>
  <title>Admin / @isset ($title) {{ $title }} @endisset</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}} " type="image/x-icon">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <!-- Material Kit CSS -->
  <link href="{{ asset('css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style_back.css') }}">

  <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom-pagination.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/uploader-master/dist/css/jquery.dm-uploader.min.css') }}">
    
  @yield('styles')
  <style type="text/css" media="screen">
    
  </style>
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="{{ route('/') }}" class="simple-text logo-normal" style="color: white; font-weight:bold">
          <b>@isset ($title) {{ $title }} @endisset</b>
        </a>
      </div>
      @include('Backend.layout.menu')
    </div>
    <div class="main-panel">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Panel Administrativo </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                  <i class="material-icons">exit_to_app</i>
                  <p class="d-lg-none d-md-block">
                    Cerrar Sesión
                  </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  @isset ($title) {{ $title }} @endisset
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right" style="color: black">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, hecho con <i class="material-icons">favorite</i> por
            <a href="https://www.creative-tim.com" target="_blank">TIFYCA</a>.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
  <!-- Chartist JS -->
  <script src="{{ asset('js/plugins/jasny-bootstrap.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-dashboard.js?v=2.1.0') }}"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('demo/demo.js') }}"></script>
  {{-- <script src="https://cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script> --}}
 <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>

  <!-- <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/decoupled-document/ckeditor.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/decoupled-document/translations/es.js"></script> -->
  <script>
  $(document).ready(function(){
    $("#"+$("#mostra_vista").val()).addClass("active");
  });
  </script>

  @stack('scripts')


</body>

</html>
