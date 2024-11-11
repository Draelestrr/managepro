<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/material/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/material/assets/img/favicon.png">
  <title>
    Registro
  </title>
  <!--     Fuentes e íconos     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Iconos Nucleo -->
  <link href="/material/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/material/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- Archivos CSS -->
  <link id="pagestyle" href="/material/assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
              ManagePro
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link me-2" href="{{ route('register') }}">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Regístrate
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="{{ route('login') }}">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Iniciar Sesión
                  </a>
                </li>
              </ul>
              <ul class="navbar-nav d-lg-flex d-none">
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('/material/assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Registrarse</h4>
                  <p class="mb-0">Ingresa tu correo electrónico y contraseña para registrarte</p>
                </div>
                <div class="card-body">
                  <!-- Mostrar errores de validación -->
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nombre</label>
                      <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Correo Electrónico</label>
                      <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Contraseña</label>
                      <input type="password" id="password" name="password" required class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Confirmar Contraseña</label>
                      <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control">
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        Estoy de acuerdo con los <a href="javascript:;" class="text-dark font-weight-bolder">Términos y Condiciones</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Registrarse</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Inicia Sesión</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Archivos JS principales   -->
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
  
</body>

</html>