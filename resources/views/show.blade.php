@extends("layouts.app")

@section("content")
    <h1>Detalle del producto</h1>
    <p>Id del producto: <?php echo htmlspecialchars($product->id); ?></p>
    <p>Nombre del producto: <?php echo htmlspecialchars($product->name); ?></p>
    <p>Descripción del producto: <?php echo htmlspecialchars($product->description); ?></p>
    <p>Precio del producto: $<?php echo htmlspecialchars(number_format($product->price, 2)); ?></p>
@endsection
