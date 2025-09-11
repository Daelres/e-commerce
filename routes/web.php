<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route :: get('products', function () {
    return "Listado de productos";
});

Route :: get('products/create', function () {
    return "Formulario de creación de productos";
});

Route :: get('products/{id}/{category?}', function ($idProducto, $category = "General") {
    return "Detalle de cada producto {$idProducto} de la categoría {$category}";
});
