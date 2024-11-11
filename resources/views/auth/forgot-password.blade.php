<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Restablecer Contraseña</title>
    <style>
        body {
            background-color: #1c1c1c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .forgot-password-container {
            background-color: #2f2f2f;
            border: 1px solid #3e3e3e;
            border-radius: 10px;
            padding: 40px;
            width: 400px;
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.8);
        }
        .forgot-password-header {
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
            font-size: 1.5em;
        }
        label {
            color: #ffffff;
        }
        .btn-primary {
            background-color: #4f4f4f;
            border: none;
            width: 100%;
            color: #ffffff;
        }
        .btn-primary:hover {
            background-color: #6c6c6c;
        }
        .text-muted {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <div class="forgot-password-header">Restablecer Contraseña</div>
        <span style="color: #ffffff;">¿Olvidaste tu contraseña? No hay problema. Simplemente dinos tu dirección de correo electrónico y te enviaremos un enlace para restablecerla.</span>

        <!-- Session Status -->
        <div class="mb-4">
            <x-auth-session-status :status="session('status')" />
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" class="form-control" name="email" :value="old('email')" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary">Enviar Enlace de Restablecimiento</button>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>