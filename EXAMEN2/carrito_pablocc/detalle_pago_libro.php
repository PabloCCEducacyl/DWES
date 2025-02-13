<?php
require_once('controlador_libro.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle del pago de los libros:</title>
</head>

<body>
    <h1>Detalle del pago de los libros</h1>
    <?php
    //Muestra el detalle del pago
    //Da la posibilidad de:
    //- Realizar el pago
    //- Volver al carrito
    //- Volver al listado de los libros
    
    $precioTotalCarrito = 0;

    if($_SESSION['carrito'] == []){
        echo "<p>No hay nada en el carrito</p>";
     } else {
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Precio Total</th></tr>";
        $carrito = $_SESSION['carrito'];
        foreach($carrito as $id => $cantidad){
           $libro = getByID($id);
           $precioTotal = $libro->getPrecio() * $cantidad;
           $precioTotalCarrito+= $precioTotal;
           echo "<tr><td>{$libro->getNombre()}</td><td>{$libro->getPrecio()}€</td><td>{$cantidad}</td><td>{$precioTotal}€</td></tr>";}
        }
        echo "</table>";
        echo "<p>Precio total del carrito: {$precioTotalCarrito}€</p>";
        echo "<a href='pago_realizado.php'>Confirmar compra</a>";

    ?>

</body>

</html>