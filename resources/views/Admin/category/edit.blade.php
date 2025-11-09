@extends('Admin.layouts.app')
@section('title', 'Editar categoría')

@section('content')
    <div class="mb-3">
        <a href="{{ route('admin.category.index') }}" class="btn btn-outline-secondary">
            ← Volver
        </a>
    </div>
    <div class="d-flex align-items-center mb-4">
        <span class="accent-bar"></span>
        <h1 class="page-title m-0">Editar categoría</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h2 class="card-title mb-0">Datos de la categoría</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                           value="{{ old('name', $category->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
