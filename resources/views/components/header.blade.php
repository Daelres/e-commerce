<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">{{ $brand ?? 'E-Commerce' }}</a>
    <div class="ms-auto d-flex gap-2">
      @foreach(($actions ?? []) as $action)
        <a href="{{ $action['href'] ?? '#' }}" class="btn btn-outline-light">{{ $action['label'] ?? 'Acción' }}</a>
      @endforeach
    </div>
  </div>
</nav>
