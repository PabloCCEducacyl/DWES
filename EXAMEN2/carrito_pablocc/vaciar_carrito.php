<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Vaciar carrito</title>
</head>

<body>
    <h1>Vaciar carrito</h1>
    <?php
    unset($_SESSION['carrito']);

    
    ?>
    <p>Carrito borrado</p>
    <a href="libros.php">Volver a libros</a>
</body>

</html>