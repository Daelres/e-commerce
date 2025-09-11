<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crear producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">E-Commerce</a>
  </div>
</nav>
<div class="container py-4">
  <div class="mb-3">
    <a href="{{ url()->previous() ?? route('product.index') }}" class="btn btn-outline-secondary" onclick="if(window.history.length>1){event.preventDefault(); window.history.back();}">← Volver</a>
  </div>
  <h1 class="mb-4">Crear producto</h1>

  @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <div class="card">
    <div class="card-body">
      <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
          @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Descripción</label>
          <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
          @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="row g-3">
          <div class="col-md-4">
            <label for="price" class="form-label">Precio</label>
            <input type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="col-md-4">
            <label for="brand" class="form-label">Marca</label>
            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand') }}" required>
            @error('brand')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="col-md-4">
            <label for="image" class="form-label">URL de imagen</label>
            <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" placeholder="https://...">
            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-primary">Enviar (no guarda)</button>
          <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
