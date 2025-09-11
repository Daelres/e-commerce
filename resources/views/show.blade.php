<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la página</title>
</head>
<body>
    <h1>Detalle del producto</h1>
    <p>Id del producto: <?php echo htmlspecialchars($product->id); ?></p>
    <p>Nombre del producto: <?php echo htmlspecialchars($product->name); ?></p>
    <p>Descripción del producto: <?php echo htmlspecialchars($product->description); ?></p>
    <p>Precio del producto: $<?php echo htmlspecialchars(number_format($product->price, 2)); ?></p>
</body>
</html>
