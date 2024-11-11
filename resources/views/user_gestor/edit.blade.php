@extends('layouts.layout')

@section('title', 'Editar Usuario - ManagePro')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 bg-white">
                <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold">Editar Usuario</h2>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user_gestor.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-bold">Nombre del Usuario</label>
                            <input type="text" class="form-control border border-secondary" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                            <input type="email" class="form-control border border-secondary" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label fw-bold">Nueva Contraseña (opcional)</label>
                            <input type="password" class="form-control border border-secondary" id="password" name="password">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label fw-bold">Confirmar Contraseña</label>
                            <input type="password" class="form-control border border-secondary" id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                            <button type="button" class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $user->id }}">Eliminar Usuario</button>
                        </div>
                    </form>

                    <!-- Modal de confirmación para eliminar -->
                    <div class="modal fade" id="deleteModal-{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel-{{ $user->id }}">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar este usuario?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('user_gestor.destroy', $user) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
