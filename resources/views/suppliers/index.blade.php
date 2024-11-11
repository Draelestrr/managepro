@extends('layouts.layout')
@section('title', 'Proveedores - ManagePro')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 bg-white">
                <div class="card-body p-4">
                    <h1 class="mb-4 fw-bold">Lista de Proveedores</h1>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">Añadir Proveedor</a>
                    
                    @if($suppliers->isEmpty())
                        <p>No hay proveedores disponibles.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $supplier->name }}</td>
                                            
                                            <td>{{ $supplier->email }}</td>
                                            <td>{{ $supplier->phone }}</td>
                                            <td>
                                                <a href="{{ route('suppliers.show', $supplier) }}" class="btn btn-info">Ver</a>
                                                <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning">Editar</a>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $supplier->id }}">Eliminar</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal-{{ $supplier->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $supplier->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel-{{ $supplier->id }}">Confirmar Eliminación</h5>
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
