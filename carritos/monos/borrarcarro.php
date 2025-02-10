<?php 
    include('comun.php');
    $id_carrito = $_REQUEST['id_carrito']; //coge el id de la compra
    $sql = "DELETE FROM carrito WHERE id_item_carrito = $id_carrito";
    $mysqli->query($sql); // borra la compra con el id de antes
    header("Location:carrito.php") // te devuelve a la vista de compras
?>