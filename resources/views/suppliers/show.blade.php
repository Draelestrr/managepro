@extends('layouts.layout')

@section('breadcrumb')
<a class="breadcrumb-item text-sm" href="{{ route('dashboard') }}">Páginas</a>
<a class="breadcrumb-item text-sm" href="{{ route('suppliers.index') }}">Proveedores</a>
<a class="breadcrumb-item text-sm" href="#">Detalles del Proveedor</a>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 bg-white">
                <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold">Detalles del Proveedor</h2>
                    <div class="mb-3">
                        <h5 class="fw-bold">Nombre del Proveedor:</h5>
                        <p>{{ $supplier->name }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <h5 class="fw-bold">Correo Electrónico:</h5>
                        <p>{{ $supplier->email }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-bold">Teléfono:</h5>
                        <p>{{ $supplier->phone }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-bold">Dirección:</h5>
                        <p>{{ $supplier->address }}</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning me-2">Editar</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este proveedor?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
