<?php
session_start();
require_once '../Modelo/Producto.php';


$productos = [
    new Producto("No game no life", 9, "NoGameNoLife.png"),
    new Producto("Re:Zero", 10, "ReZero.png"),
    new Producto("Fate/Stay Night", 15, "Fate.png"),
    new Producto("Dandadan", 13, "Dandadan.png"),
    new Producto("Full metal alchemist", 13, "FullMetalAlchemist.png"),
];


if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar'])) {
    $indice = $_POST['indice']; 
    $_SESSION['carrito'][] = $productos[$indice]; 
    header('Location: ../Vista/productos.php');  
    exit;
}


if (isset($_POST['vaciar_carrito'])) {
    unset($_SESSION['carrito']); 
}


if (isset($_POST['borrar_producto'])) {
    $indice = $_POST['indice']; 
    unset($_SESSION['carrito'][$indice]);  
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);  
    header('Location: carrito.php');  
    exit;
}
