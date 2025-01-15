<?php
    include('comun.php');
    $id_compra = $_REQUEST['id_compra']; //coge el id de la compra
    $sql = "DELETE FROM compras WHERE id_compra = $id_compra";
    $mysqli->query($sql); // borra la compra con el id de antes
    header("Location:vistacompras.php") // te devuelve a la vista de compras
    ?>