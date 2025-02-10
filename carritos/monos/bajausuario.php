<?php
    include('comun.php');
    $admin = $_SESSION['admin'];
    $id_admin = $_SESSION['id_sesion'];
    if ($admin == 0){
        echo "<html><head><script>window.location.replace('index.php') </script></head></html>";
    }
    $id_user = $_REQUEST["id_usuario"];
    if($id_admin == $id_user){
    echo "<html><head><script>window.location.replace('administrador.php') </script></head></html>";
    }
    else{
    $sql = "DELETE FROM usuarios WHERE id_user = $id_user";
    $mysqli->query($sql);
    echo "<html><head><script>window.location.replace('administrador.php') </script></head></html>";
    }

?>