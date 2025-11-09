@extends('Admin.layouts.app')
@section('title', 'Crear producto')

@section('content')
    <div class="mb-3">
        <a href="{{ url()->previous() ?? route('product.index') }}" class="btn btn-outline-secondary">
            ← Volver
        </a>
    </div>
    <div class="d-flex align-items-center mb-4">
        <span class="accent-bar"></span>
        <h1 class="page-title m-0">Crear producto</h1>
    </div>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h2 class="card-title mb-0">Datos del producto</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                           value="{{ old('name') }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                              name="description" rows="3" required>{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" step="0.01" min="0"
                               class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                               value="{{ old('price') }}" required>
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="brand" class="form-label">Marca</label>
                        <select class="form-control" id="productBrand" name="productBrand">
                            <option value="" selected disabled> -- Marca --</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand')
                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="category" class="form-label">Categoria</label>
                        <select class="form-control" id="productCategory" name="productCategory">
                            <option value="" selected disabled> -- Categoria --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
