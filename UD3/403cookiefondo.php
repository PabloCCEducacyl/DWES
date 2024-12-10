<?php
    if(isset($_GET['fondo'])){
        setcookie('fondo', $_GET['fondo'], time() + 3600 * 24);
        header('Location:?');
    }
    if(isset($_GET['borrar'])){
        setcookie('fondo', "", time() - 1);
        
        header('Location:?');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Pablo Campuzano Cuadrado">
    <title>Document</title>
    <style>
        .oscuro{
            background-color: grey;
        }
        .claro{
            background-color: white;
        }
    </style>
</head>
<body class="<?php if(isset($_COOKIE['fondo'])){echo $_COOKIE['fondo'];}?>">
    <a href="?fondo=claro">claro</a>
    <a href="?fondo=oscuro">oscuro</a>
    <a href="?borrar=si">borrar</a>
</body>
</html>