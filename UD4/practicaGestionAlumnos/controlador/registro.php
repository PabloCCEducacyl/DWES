<?php
    $index = "../index.php";

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header("Location: $index?info=Acceso denegado");
    } else {
        if(!isset($_POST['correo']) || !isset($_POST['contrasena']) || !isset($_POST['tipo_usu'])){
            header("Location: $index?info=Falta algun campo");
        }
    };
    include_once('../config/conexion.php');

    $comprobarCorreoSQL = "SELECT * FROM `tutor` WHERE `correo` = :correo";
    $comprobarCorreo = $conexion->prepare($comprobarCorreoSQL);
    $comprobarCorreo->bindParam(':correo', $_POST['correo'], PDO::PARAM_STR);
    $comprobarCorreo->execute();
    if($comprobarCorreo->rowCount() > 0) {
        header("Location: $index?info=Correo ya registrado");
    }

    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);
    if($password == "") {
        // header("Location: $index?info=Contraseña vacía");
    } else if(strlen($password) < 8) {
        // header("Location: $index?info=Contraseña demasiado corta");
    }
    $tipo_usu = 2; // 1 = admin, 2 = tutor
                   // solo se pueden registrar tutores
    
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);

    $contrasenahasheada = password_hash($password, PASSWORD_DEFAULT);
    $insertarTutorSQL = "INSERT INTO `tutor` (`correo`, `nombre`, `apellidos`, `password`, `tipo_usu`, `baja`, `activada`) VALUES (:correo, :nombre, :apellidos, :password, :tipo_usu, FALSE, FALSE)";
    $insertarSQL = $conexion->prepare($insertarTutorSQL);
    $insertarSQL->bindParam(':correo', $correo, PDO::PARAM_STR);
    $insertarSQL->bindParam(':password', $contrasenahasheada, PDO::PARAM_STR);
    $insertarSQL->bindParam(':tipo_usu', $tipo_usu, PDO::PARAM_INT);
    $insertarSQL->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $insertarSQL->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);

    $insertarSQL->execute();

    if($insertarSQL->rowCount()){
        header("Location: $index?info=Registrado con exito");
    } else {
        header("Location: $index?info=Error al registrar");
    }