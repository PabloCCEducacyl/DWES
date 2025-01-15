<?php 
    include('comun.php');
    if (!isset($_REQUEST["registrar"])){
        echo "Algo no ha salido bien";
    }
    else {
        $nombre =           $mysqli->real_escape_string($_REQUEST["nombre"]);
        $contrasena =       $mysqli->real_escape_string($_REQUEST["contrasena"]);
        $email =            $mysqli->real_escape_string($_REQUEST["email"]);
        $fecha_nacimiento = $mysqli->real_escape_string($_REQUEST["fecha_nacimiento"]);
        if ($_REQUEST["genero"] == "otro"){
            $genero = $mysqli->real_escape_string($_REQUEST["otrogenero"]);}
        else{
            $genero = $mysqli->real_escape_string($_REQUEST["genero"]);
        }
        $resultado = $mysqli->query("SELECT email FROM usuarios WHERE email = '$email'");
        $numemails = $resultado->num_rows;
        if ($numemails == 0){
            //encripta contraseña y la pone en una variable
            $contrasena_encript = password_hash($contrasena, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (nombre_user, contrasena, email, fecha_nacimiento, genero) 
                                      VALUES ('$nombre', '$contrasena_encript', '$email', '$fecha_nacimiento', '$genero')";
            $mysqli->query($sql);
            echo   "<h3>Registro completado</h3>
                    <p>Será redirigido en 5 segundos. Si no funciona pulse abajo</p>
                    <script>setTimeout(() => window.location.replace('index.php'), 5000)</script>
                    <a href='index.php'>Volver a Inicio</a>";}                   
        else{echo "<html><script>window.location.replace('emailrepe.php')</script></html>";}
        
        
        }
            
        
?>