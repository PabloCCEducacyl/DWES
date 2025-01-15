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
            $sql = "SELECT * FROM usuarios";
            $consulta = $mysqli->query($sql);
            while($consultaassoc = $consulta->fetch_assoc()){
                echo "ID User: " . $consultaassoc['id_user']. "<br>";
                echo "Nombre: " . $consultaassoc['Nombre_user']. "<br>";
                echo "Email: " . $consultaassoc['email']. "<br><br><hr>";
            }
        }
    }

?>