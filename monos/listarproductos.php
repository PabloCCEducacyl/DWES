<?php 
//para el panel de administrador
include("comun.php");
    $id_session = $_SESSION["id_sesion"];
    $checkadmin = "SELECT administrador FROM usuarios WHERE id_user = $id_session";
    $checkadminconsulta = $mysqli->query($checkadmin);
    while($admin = $checkadminconsulta->fetch_row()){
        if($admin == 0){
            echo "<html><head><script>window.location.replace('index.php')</script></head></html>";
        }
        else{
            $sql = "SELECT * FROM productos";
            $consulta = $mysqli->query($sql);
            while($consultaassoc = $consulta->fetch_assoc()){
                echo "ID Producto: " . $consultaassoc['id_producto']. "<br>";
                echo "Nombre: " . $consultaassoc['Nombre_producto']. "<br>";
                echo "Clase: " . $consultaassoc['clase']. "<br><br><hr>";
            }
        }
    }

?>