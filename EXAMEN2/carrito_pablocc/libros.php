<?php
require_once('controlador_libro.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
</head>
<body>
    
    <h1>Libros disponibles para comprar</h1>
    <a href="carrito_libro.php">Carrito</a>
    <?php
        //print_r($_SESSION);
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Carrito</th></tr>";
        foreach($libros as $libro){
            echo "<tr><td>{$libro->getNombre()}</td><td>{$libro->getPrecio()}</td><td>{$libro->getCantidad()}</td><td><form action='controlador_libro.php' method='GET'><input type='hidden' name='operacion' value='annadir'><input type='hidden' name='id' value='{$libro->getID()}'><input type='number' min='1' max='{$libro->getCantidad()}'name='cantidad' value='1'><input type='submit' value='Añadir'></form></td></tr>";}
        echo "</table>";
    ?>
    <!--Listado de los libros disponibles para añdir al carrito -->

    <!--Posibilidad de ver el carrito -->
    
</body>
</html>
