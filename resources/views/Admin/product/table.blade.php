@extends('Admin.layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">

            <table class="table align-items-center mb-0">
                <thead>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Precio</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoria</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Marca</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $product->id }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $product->name }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $product->price }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $product->category_id }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $product->brand_id }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <a href="#" style="color:red">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
