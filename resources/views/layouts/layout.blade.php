<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/material/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/material/assets/img/favicon.png">
  <title>@yield('title', 'Dashboard - ManagePro')</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <link href="/material/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/material/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link id="pagestyle" href="/material/assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="wrapper d-flex align-items-stretch">
    @include('layouts.sidebar')

    <main class="main-content w-100 position-relative max-height-vh-100 h-100 border-radius-lg">
      <!-- Navbar -->
      @include('layouts.navbar')
      <!-- End Navbar -->

      <div class="container-fluid py-4">
        @yield('content')
        @include('layouts.footer')
      </div>
    </main>
  </div>

  <script src="/material/assets/js/core/popper.min.js"></script>
  <script src="/material/assets/js/core/bootstrap.min.js"></script>
  <script src="/material/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/material/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script src="/material/assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>
