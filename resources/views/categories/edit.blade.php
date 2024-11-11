@extends('layouts.layout')

@section('breadcrumb')
<a class="breadcrumb-item text-sm" href="{{ route('dashboard') }}">Páginas</a>
<a class="breadcrumb-item text-sm" href="{{ route('categories.index') }}">Categorías</a>
<a class="breadcrumb-item text-sm" href="#">Editar Categoría</a>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 bg-white">
                <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold">Editar Categoría</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-bold">Nombre de la Categoría</label>
                            <input type="text" class="form-control border border-secondary" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Ingrese el nombre de la categoría" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label fw-bold">Descripción</label>
                            <textarea class="form-control border border-secondary" id="description" name="description" rows="3" placeholder="Describe la categoría...">{{ old('description', $category->description) }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
