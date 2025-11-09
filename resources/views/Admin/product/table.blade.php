@extends('Admin.layouts.app')

@section('content')
    <div class="mb-3 d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <span class="accent-bar"></span>
            <h1 class="page-title m-0">Productos</h1>
        </div>
        <div class="text-end">
            <a type="button" class="btn btn-primary" href="{{ route('product.create')  }}">
                <i class="material-symbols-rounded align-middle" style="font-size:20px">add</i>
                <span class="align-middle">Nuevo producto</span>
            </a>
        </div>
    </div>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card">
        <div class="card-header pb-0">
            <h2 class="card-title mb-0">Lista de productos</h2>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Imagen</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Precio</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoría</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Marca</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $product->id }}</span>
                            </td>
                            <td class="align-middle text-center">
                                @php($thumb = $product->image_path ? Storage::url($product->image_path) : 'https://via.placeholder.com/80x80.png?text=IMG')
                                <img src="{{ $thumb }}" alt="{{ $product->name }}" style="width:48px;height:48px;object-fit:cover;border-radius:6px;border:1px solid #eee;">
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $product->name }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">${{ number_format($product->price, 2) }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ optional($product->category)->name ?? '—' }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ optional($product->brand)->name ?? '—' }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                        Editar
                                    </a>
                                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-3 pt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
