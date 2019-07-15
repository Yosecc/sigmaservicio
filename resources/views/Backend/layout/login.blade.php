<!doctype html>
<html lang="es">

<head>
  <title>@isset ($title) {{ $title }} @endisset</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="dark-edition">
    @include('Backend.layout.menulogin')
        <div class="wrapper wrapper-full-page">
<div class="page-header login-page header-filter" filter-color="black" style="background-image: url('../../assets/img/login.jpg'); background-size: cover; background-position: top center;">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
  <div class="container">
    @yield('content')
  </div>
  <footer class="footer" >
    <div class="container">
        {{-- <nav class="float-left">
          <ul>
              <li>
                  <a href="https://www.creative-tim.com">
                      Creative Tim
                  </a>
              </li>
              <li>
                  <a href="https://creative-tim.com/presentation">
                      About Us
                  </a>
              </li>
              <li>
                  <a href="http://blog.creative-tim.com">
                      Blog
                  </a>
              </li>
              <li>
                  <a href="https://www.creative-tim.com/license">
                      Licenses
                  </a>
              </li>
          </ul>
        </nav> --}}
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, hecho con <i class="material-icons">favorite</i> por
            <a href="https://www.creative-tim.com" target="_blank">TIFYCA</a>.
        </div>
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
  <!--  Google Maps Plugin    -->
{{--   <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Chartist JS -->
  <script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-dashboard.js?v=2.1.0') }}"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('demo/demo.js') }}"></script>
  <script src="{{ asset('demo/main.js') }}"></script>

</body>

</html>
