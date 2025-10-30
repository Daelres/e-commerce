@extends('admin.layouts.app')

@section('content')
    <h1>Add new Category</h1>

    <div class="">
        <div class="card-body">
            <form action="admin.category.store" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre de la categoría</label>
                    <input type="text" id="name" name="name" class="form-control card" placeholder="Nombre de la categoría">
                </div>

                <button type="submit" class="btn btn-dark">Guardar</button>
            </form>
        </div>
    </div>

@endsection
