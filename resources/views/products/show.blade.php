@extends('layouts.layout')
@section('title', 'Ver Producto - ManagePro')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 bg-white">
                <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold">Ver Producto</h2>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre del Producto:</label>
                        <p class="form-control-plaintext">{{ $product->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Categoría:</label>
                        <p class="form-control-plaintext">{{ $product->category->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Precio:</label>
                        <p class="form-control-plaintext">{{ $product->price }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Stock:</label>
                        <p class="form-control-plaintext">{{ $product->stock }}</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning me-2">Editar</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar Producto</button>
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
                ¿Estás seguro de que deseas eliminar este producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection