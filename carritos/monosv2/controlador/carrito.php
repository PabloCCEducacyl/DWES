<?php
    session_start();

    if(!isset($_GET['operacion'])){
        header('Location: ../index.php');
    }
    switch($_GET['operacion']){
        case "annadir":
            $cantidad = 1;
            annadirCarrito($_GET['id'], $cantidad);
            break;
    }


    function annadirCarrito($id_producto, $cantidad){
        if(!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = [];
        }
        $carrito = $_SESSION['carrito'];

        if(isset($carrito[$id_producto])){
            $carrito[$id_producto] += $cantidad;
        } else {
            $carrito[$id_producto] = $cantidad;
        }
        $_SESSION['carrito'] = $carrito;
    }
    