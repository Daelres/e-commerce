@extends('layouts.app')

@section('title', 'Listado de productos')

@section('content')
  <div class="container py-4">
    <h1 class="mb-4">Listado de productos</h1>

    @if(session('status'))
      <div class="alert alert-info">{{ session('status') }}</div>
    @endif

    @if($products->count() === 0)
      <div class="alert alert-secondary">No hay productos disponibles por ahora.</div>
    @else
      <div class="row g-4">
        @foreach($products as $p)
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm">
              @php($img = $p->image_path ? Storage::url($p->image_path) : 'https://via.placeholder.com/600x600.png?text=Producto')
              <img src="{{ $img }}" class="card-img-top" alt="{{ $p->name }}">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $p->name }}</h5>
                <p class="text-muted small mb-2">
                  Marca: {{ optional($p->brand)->name ?? '—' }}
                  @if($p->category)
                    | Categoría: {{ $p->category->name }}
                  @endif
                </p>
                <p class="fw-bold h5 text-success mb-3">$ {{ number_format($p->price, 2) }}</p>
                <a href="{{ route('product.getProduct', ['idProducto' => $p->id]) }}" class="btn btn-primary mt-auto">Ver detalle</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="mt-4">
        {{ $products->links() }}
      </div>
    @endif
  </div>
@endsection
