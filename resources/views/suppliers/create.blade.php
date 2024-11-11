@extends('layouts.layout')

@section('breadcrumb')
<a class="breadcrumb-item text-sm" href="{{ route('dashboard') }}">Páginas</a>
<a class="breadcrumb-item text-sm" href="{{ route('suppliers.index') }}">Proveedores</a>
<a class="breadcrumb-item text-sm" href="#">Añadir Proveedor</a>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 bg-white">
                <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold">Añadir Proveedor</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('suppliers.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-bold">Nombre del Proveedor</label>
                            <input type="text" class="form-control border border-secondary" id="name" name="name" value="{{ old('name') }}" placeholder="Ingrese el nombre del proveedor" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                            <input type="email" class="form-control border border-secondary" id="email" name="email" value="{{ old('email') }}" placeholder="Ingrese el correo electrónico">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label fw-bold">Teléfono</label>
                            <input type="text" class="form-control border border-secondary" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Ingrese el teléfono del proveedor">
                        </div>
                        <div class="form-group mb-3">
                            <label for="address" class="form-label fw-bold">Dirección</label>
                            <input type="text" class="form-control border border-secondary" id="address" name="address" value="{{ old('address') }}" placeholder="Ingrese la dirección del proveedor">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Añadir Proveedor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
