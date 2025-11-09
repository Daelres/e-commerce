@extends('Admin.layouts.app')
@section('title', 'Marcas')

@section('content')
    <div class="mb-3 d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <span class="accent-bar"></span>
            <h1 class="page-title m-0">Marcas</h1>
        </div>
        <div class="text-end">
            <a type="button" class="btn btn-primary" href="{{ route('admin.brand.create') }}">
                <i class="material-symbols-rounded align-middle" style="font-size:20px">add</i>
                <span class="align-middle">Nueva marca</span>
            </a>
        </div>
    </div>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card">
        <div class="card-header pb-0">
            <h2 class="card-title mb-0">Lista de marcas</h2>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($brands as $brand)
                        <tr>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $brand->id }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $brand->name }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <form action="{{ route('admin.brand.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta marca?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">No hay marcas registradas.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-3 pt-3">
                {{ $brands->links() }}
            </div>
        </div>
    </div>
@endsection
