<?php
    require_once('controlador_libro.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pago de libros realizado</title>
</head>

<body>
    <h1>Pago de libros realizado</h1>
    <?php
        $cantidadTotal = 0;
        foreach($_SESSION['carrito'] as $id => $cantidad){
            $cantidadTotal += $cantidad;
        }
        unset($_SESSION['carrito']);
        echo "<p>Has comprado {$cantidadTotal} libros</p>";
    ?>
    <a href="libros.php">Volver</a>

</body>

</html>