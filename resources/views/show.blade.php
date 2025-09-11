<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product['name'] }} - Detalle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .price { color: #0a7d18; }
        .thumbs img { cursor: pointer; border: 1px solid #ddd; }
        .thumbs img.active { border-color: #0d6efd; }
    </style>
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
  <div class="row g-4">
    <div class="col-12 col-lg-6">
      <div class="d-flex flex-column align-items-center">
        <img id="mainImage" src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid rounded shadow">
        <div class="d-flex gap-2 mt-3 thumbs">
          <img src="{{ $product['image'] }}" class="rounded p-1 active" width="64" height="64" alt="miniatura 1" onclick="document.getElementById('mainImage').src=this.src; setActive(this)">
          <img src="https://via.placeholder.com/600x600.png?text=Vista+2" class="rounded p-1" width="64" height="64" alt="miniatura 2" onclick="document.getElementById('mainImage').src=this.src; setActive(this)">
          <img src="https://via.placeholder.com/600x600.png?text=Vista+3" class="rounded p-1" width="64" height="64" alt="miniatura 3" onclick="document.getElementById('mainImage').src=this.src; setActive(this)">
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6">
      <h1 class="h3">{{ $product['name'] }}</h1>
      <p class="text-muted mb-1">Marca: {{ $product['brand'] }} | Categoría: {{ $category ?? 'General' }}</p>
      <div class="d-flex align-items-baseline gap-2 mb-3">
        <span class="h2 fw-bold price">$ {{ number_format($product['price'], 2) }}</span>
        <span class="text-muted">En stock</span>
      </div>
      <p>{{ $product['description'] }}</p>

      <div class="card mt-4">
        <div class="card-body">
          <div class="d-grid gap-2">
            <button class="btn btn-warning">Agregar al carrito</button>
            <button class="btn btn-primary">Comprar ahora</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function setActive(img){
    document.querySelectorAll('.thumbs img').forEach(i=>i.classList.remove('active'));
    img.classList.add('active');
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
