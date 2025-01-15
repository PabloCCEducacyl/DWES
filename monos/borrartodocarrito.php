<?php
    include('comun.php');
    $id_user = $_SESSION["id_sesion"];
    $sql = "DELETE FROM carrito WHERE id_user_carrito_fk = $id_user";
    $mysqli->query($sql);
    echo "<html><head><script>window.location.replace('index.php')</script></head></html>";
    ?>