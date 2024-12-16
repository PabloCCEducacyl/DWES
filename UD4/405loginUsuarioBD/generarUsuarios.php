<?php

    include_once('config/conexion.php');
    $usuario = "usuario";
    $contrasena = "usuario";
    $contrasenahash = password_hash($contrasena, PASSWORD_DEFAULT);

    $usuario2 = "admin";
    $contrasena2 = "admin";
    $contrasena2hash = password_hash($contrasena2, PASSWORD_DEFAULT);

    $sentenciaSQL = "SELECT * FROM users WHERE usuario='usuario' OR usuario='admin'";
    $selectSQL = $conexion->prepare($sentenciaSQL);
    $selectSQL->execute();
    $numRows = $selectSQL->rowCount();

    if($numRows > 0){
        header('Location:index.php?info=Los usuarios ya existen');
    } else {
        $insertSQL = $conexion->prepare("INSERT INTO users
                      (usuario, password, tipo_usu)
                VALUES('usuario', '$contrasenahash', 1);");
        $insertSQL->execute();

        $insertSQL2 = $conexion->prepare("INSERT INTO users
                      (usuario, password, tipo_usu)
                VALUES('admin', '$contrasena2hash', 2);");
        $insertSQL2->execute();


        header('Location:index.php?info=Usuarios insertados correctamente');
    }


?>