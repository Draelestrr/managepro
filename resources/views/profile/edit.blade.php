@extends('layouts.layout')

@section('breadcrumb')
<a class="breadcrumb-item text-sm" href="{{ route('dashboard') }}">Páginas</a>
<a class="breadcrumb-item text-sm" href="#">Perfil de Usuario</a>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 bg-white">
                <div class="card-body p-4">
                    <h1 class="mb-4 fw-bold">Perfil de Usuario</h1>
                    <div class="row">
                        <div class="col-md-12 my-auto">
                            <div class="card card-plain h-100 mb-4">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Actualizar Información del Perfil</h6>
                                </div>
                                <div class="card-body p-3">
                                    <div class="max-w-xl">
                                        @include('profile.partials.update-profile-information-form')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 my-auto">
                            <div class="card card-plain h-100 mb-4">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Actualizar Contraseña</h6>
                                </div>
                                <div class="card-body p-3">
                                    <div class="max-w-xl">
                                        @include('profile.partials.update-password-form')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 my-auto">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Eliminar Cuenta</h6>
                                </div>
                                <div class="card-body p-3">
                                    <div class="max-w-xl">
                                        @include('profile.partials.delete-user-form')
                                    </div>
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

<!-- Agregar el CSS de Material Dashboard -->
<link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
