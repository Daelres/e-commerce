<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">E-Commerce</a>
    <div class="ms-auto">
      <a href="{{ route('product.create') }}" class="btn btn-outline-light">Crear producto</a>
    </div>
  </div>
</nav>

<div class="container py-4">
  <h1 class="mb-4">Listado de productos</h1>
  <div class="row g-4">
    @foreach($products as $p)
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card h-100 shadow-sm">
          <img src="{{ $p['image'] }}" class="card-img-top" alt="{{ $p['name'] }}">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $p['name'] }}</h5>
            <p class="text-muted small mb-2">Marca: {{ $p['brand'] }}</p>
            <p class="fw-bold h5 text-success mb-3">$ {{ number_format($p['price'], 2) }}</p>
            <a href="{{ route('product.getProduct', ['id' => $p['id']]) }}" class="btn btn-primary mt-auto">Ver detalle</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
