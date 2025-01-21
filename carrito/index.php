<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e_e_e_e</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="imagenes/importante.gif" type="image/x-icon">
</head>
<body>
    <?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT']."\DWES\carrito\\";
    include_once("vistas/header");
    if(isset($_GET["login"])){
        include_once("vistas/login");
    } else if(isset($_GET["carrito"])) {
        include_once("vistas/carrito");
    } else {
        include_once("vistas/productos");
    }
        ?>

    <script src="js/js.js"></script>
</body>
</html>