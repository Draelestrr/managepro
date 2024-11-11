@extends('layouts.layout')
@section('title', 'Crear Producto - ManagePro')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 bg-white">
                <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold">Crear Producto</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-bold">Nombre del Producto</label>
                            <input type="text" class="form-control border border-secondary" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category" class="form-label fw-bold">Categoría</label>
                            <select class="form-select border border-secondary" id="category" name="category_id" required>
                                <option value="" disabled selected>Seleccione una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price" class="form-label fw-bold">Precio</label>
                            <input type="number" step="0.01" class="form-control border border-secondary" id="price" name="price" value="{{ old('price') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="stock" class="form-label fw-bold">Stock</label>
                            <input type="number" class="form-control border border-secondary" id="stock" name="stock" value="{{ old('stock') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="stock_min" class="form-label fw-bold">Stock Mínimo</label>
                            <input type="number" class="form-control border border-secondary" id="stock_min" name="stock_min" value="{{ old('stock_min') }}" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Crear Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
