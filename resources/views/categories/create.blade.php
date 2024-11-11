@extends('layouts.layout')



@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 bg-white">
                <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold">Crear Categoría</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-bold">Nombre de la Categoría</label>
                            <input type="text" class="form-control border border-secondary" id="name" name="name" value="{{ old('name') }}" placeholder="Ingrese el nombre de la categoría" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label fw-bold">Descripción</label>
                            <textarea class="form-control border border-secondary" id="description" name="description" rows="3" placeholder="Describe la categoría...">{{ old('description') }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Crear Categoría</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
