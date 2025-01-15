<?php 
    include('comun.php'); //se inicia mysqli y session
    $tipo = $mysqli->real_escape_string($_REQUEST['tipo']);
    $sesion = $mysqli->real_escape_string($_SESSION['id_sesion']);
    //el unico caso especial es genero donde igual tiene que coger la info de otro campo
    //email tiene que revisar si ya esta en uso
    if ($tipo == "email") {
        $email = $_REQUEST['cambio'];
        $resultado = $mysqli->query("SELECT email FROM usuarios WHERE email = '$email'");
        if ($resultado->num_rows == 1){
            exit("<h4>Este correo ya esta en uso</h4>
                    <a href='perfil.php'>Volver a perfil</a>");
        }else{
            $cambio = $mysqli->real_escape_string($_REQUEST['cambio']);
        }
        
    }
    elseif ($tipo == "contrasena") {
        $contrasena = $mysqli->real_escape_string($_REQUEST['cambio']);
        $contrasena_encript = password_hash($contrasena, PASSWORD_DEFAULT);
        $cambio = $contrasena_encript;
    }
    elseif ($tipo == "genero"){
        if($_REQUEST["genero"] == "otro"){
            $cambio = $mysqli->real_escape_string($_REQUEST["otrogenero"]);}
        else{
            $cambio = $mysqli->real_escape_string($_REQUEST["genero"]);
    }}
    else {
        $cambio = $mysqli->real_escape_string($_REQUEST["cambio"]); 
    }
        $sql = "UPDATE usuarios SET $tipo = '$cambio' WHERE id_user = $sesion";
        $mysqli->query($sql);
        echo "<html><head><script>window.location.replace('perfil.php')</script></head></html>";
?>