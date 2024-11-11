@extends('layouts.layout')

@section('title', 'Crear Usuario - ManagePro')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 bg-white">
                <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold">Crear Usuario</h2>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user_gestor.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-bold">Nombre del Usuario</label>
                            <input type="text" class="form-control border border-secondary" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                            <input type="email" class="form-control border border-secondary" id="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label fw-bold">Contraseña</label>
                            <input type="password" class="form-control border border-secondary" id="password" name="password" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label fw-bold">Confirmar Contraseña</label>
                            <input type="password" class="form-control border border-secondary" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Crear Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
