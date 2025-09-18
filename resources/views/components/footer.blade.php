<footer class="border-top py-4 mt-auto bg-light">
  <div class="container text-center text-muted small">
    <div>&copy; {{ date('Y') }} {{ config('app.name', 'E-Commerce') }}. Todos los derechos reservados.</div>
    <div class="mt-1">
      <a href="{{ route('product.index') }}" class="text-decoration-none">Productos</a>
      <span class="mx-2">•</span>
      <a href="{{ route('product.create') }}" class="text-decoration-none">Crear producto</a>
    </div>
  </div>
</footer>
