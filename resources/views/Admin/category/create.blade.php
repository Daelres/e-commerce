@extends('Admin.layouts.app')

@section('title', 'Crear categoría')

@section('content')
    <div class="mb-3">
        <a href="{{ url()->previous() ?? route('admin.index') }}" class="btn btn-outline-secondary">
            ← Volver
        </a>
    </div>

    <div class="d-flex align-items-center mb-4">
        <span class="accent-bar"></span>
        <h1 class="page-title m-0">Crear categoría</h1>
    </div>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h2 class="card-title mb-0">Datos de la categoría</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre de la categoría" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Descripción de la categoría">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
