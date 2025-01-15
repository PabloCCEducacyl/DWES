<?php
    include('comun.php');
    $admin = $_SESSION['admin'];
    if ($admin == 0){
        echo "<html><head><script>window.location.replace('index.php') </script></head></html>";
    }
    $id_producto = $_REQUEST["id_producto"];
    $sql = "DELETE FROM productos WHERE id_producto = $id_producto";
    $mysqli->query($sql);
    echo "<html><head><script>window.location.replace('administrador.php') </script></head></html>";

?>