<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/material/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/material/assets/img/favicon.png">
  <title>Manage PRO</title>
  <!-- Fonts and Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <link href="/material/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/material/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/material/assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  <main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Iniciar Sesión</h4>
                </div>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="text-start">
                  @csrf
                  <!-- Email Input -->
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" id="email" name="email" :value="old('email')" required autofocus class="form-control">
                  </div>
                  <!-- Password Input -->
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" id="password" name="password" required class="form-control">
                  </div>
                  <!-- Remember Me Checkbox -->
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label mb-0 ms-3" for="remember">Recuérdame</label>
                  </div>
                  <!-- Submit Button -->
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Iniciar Sesión</button>
                  </div>
                  <!-- Links -->
                  <p class="mt-4 text-sm text-center">
                    ¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Registrarse</a>
                  </p>
                  @if (Route::has('password.request'))
                  <p class="mt-4 text-sm text-center">
                    <a href="{{ route('password.request') }}" class="text-primary text-gradient font-weight-bold">Olvidó su contraseña?</a>
                  </p>
                  @endif
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Scripts -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const inputGroups = document.querySelectorAll('.input-group');
      inputGroups.forEach((group) => {
        const input = group.querySelector('input');

        input.addEventListener('focus', () => group.classList.add('is-focused'));
        input.addEventListener('blur', () => {
          if (!input.value) group.classList.remove('is-focused');
        });

        if (input.value) group.classList.add('is-focused');
      });
    });
  </script>
  <script src="/material/assets/js/core/popper.min.js"></script>
  <script src="/material/assets/js/core/bootstrap.min.js"></script>
  <script src="/material/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/material/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = { damping: '0.5' };
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
</body>

</html>
