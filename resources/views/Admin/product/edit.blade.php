@extends('Admin.layouts.app')
@section('title', 'Editar producto')

@section('content')
    <div class="mb-3">
        <a href="{{ route('admin.product.index') }}" class="btn btn-outline-secondary">
            ← Volver
        </a>
    </div>
    <div class="d-flex align-items-center mb-4">
        <span class="accent-bar"></span>
        <h1 class="page-title m-0">Editar producto</h1>
    </div>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h2 class="card-title mb-0">Datos del producto</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                           value="{{ old('name', $product->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                              name="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" step="0.01" min="0"
                               class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                               value="{{ old('price', $product->price) }}" required>
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="productBrand" class="form-label">Marca</label>
                        <select class="form-control" id="productBrand" name="productBrand">
                            <option value="" disabled> -- Marca --</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ (int)old('productBrand', $product->brand_id) === (int)$brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('productBrand')
                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="productCategory" class="form-label">Categoría</label>
                        <select class="form-control" id="productCategory" name="productCategory">
                            <option value="" disabled> -- Categoría --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (int)old('productCategory', $product->category_id) === (int)$category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('productCategory')
                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagen actual</label>
                    @php($currentImg = $product->image_path ? Storage::url($product->image_path) : 'https://via.placeholder.com/300x300.png?text=Sin+imagen')
                    <div>
                        <img src="{{ $currentImg }}" alt="Imagen actual" style="max-height: 160px" class="rounded border">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Reemplazar imagen</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
