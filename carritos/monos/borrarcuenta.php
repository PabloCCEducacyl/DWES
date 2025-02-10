<?php
    include('comun.php');
    $id_user = $_SESSION['id_sesion'];
    $sql = "DELETE FROM usuarios WHERE id_user = $id_user";
    session_destroy();
    $mysqli->query($sql);
    header("Location:index.php");
?>