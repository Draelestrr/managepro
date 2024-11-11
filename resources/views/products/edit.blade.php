@extends('layouts.layout')
@section('title', 'Editar Producto - ManagePro')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 bg-white">
                <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold">Editar Producto</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('products.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-bold">Nombre del Producto</label>
                            <input type="text" class="form-control border border-secondary" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category" class="form-label fw-bold">Categoría</label>
                            <select class="form-select border border-secondary" id="category" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price" class="form-label fw-bold">Precio</label>
                            <input type="number" step="0.01" class="form-control border border-secondary" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="stock" class="form-label fw-bold">Stock</label>
                            <input type="number" class="form-control border border-secondary" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Actualizar Producto</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar Producto</button>
                        </div>
                    </form>

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection