<?php
    session_start();
    $mysqli = new mysqli("localhost", "root", "", "tiendaweb");
    $email = $mysqli->real_escape_string($_REQUEST["email"]);
    $contrasena = $mysqli->real_escape_string($_REQUEST["contrasena"]);

    
    $resultado = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'");
    if ($resultado->num_rows == 1){
        $idus = $resultado->fetch_assoc();
        $contrasena_encript = $idus['contrasena'];
        if(password_verify($contrasena, $contrasena_encript)){
            $_SESSION['id_sesion'] = $idus['id_user'];
            if($idus['administrador'] == 1){
                $_SESSION['admin'] = 1;
            }
            echo "<html><script> window.location.replace('perfil.php') </script></html>";   
        }
        else{
            echo "<html><script> window.location.replace('errorinicio.php') </script></html>";
        }
    }else{
        echo "<html><script> window.location.replace('errorinicio.php') </script></html>";
    }

?>