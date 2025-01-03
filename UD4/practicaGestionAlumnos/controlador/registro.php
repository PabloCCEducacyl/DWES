<?php
    $index = __DIR__."/vista/index.php";

    // if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    //     header("Location: $index?info=Acceso denegado");
    // } else {
    //     if(!isset($_POST['usuario']) || !isset($_POST['contrasena']) || !isset($_POST['tipo_usu'])){
    //         header("Location: $index?info=Datos incorrectos");
    //     }
    // };
    include_once('../config/conexion.php');
    
    $usuario = trim($_POST['correo']);
    $password = trim($_POST['contrasena']);
    if($password == "") {
        header("Location: $index?info=Contraseña vacía");
    } else if(strlen($password) < 8) {
        header("Location: $index?info=Contraseña demasiado corta");
    }
    $tipo_usu = 2; // 1 = admin, 2 = tutor
                   // solo se pueden registrar tutores
    
    $contrasenahasheada = password_hash($contrasena, PASSWORD_DEFAULT);
    $insertarTutorSQL = "INSERT INTO `tutor` (`correo`, `nombre`, `apellidos`, `password`, `tipo_usu`, `baja`, `activada`) VALUES (:correo, :nombre, :apellidos, :password, :tipo_usu, FALSE, TRUE)";
    $insertarSQL = $conexion->prepare($insertarTutorSQL);
    $insertarSQL->bindParam(':correo', $correo, PDO::PARAM_STR);
    $insertarSQL->bindParam(':contrasena', $contrasenahasheada, PDO::PARAM_STR);
    $insertarSQL->bindParam(':tipo_usu', $tipo_usu, PDO::PARAM_INT);
    $insertarSQL->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $insertarSQL->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);

    $insertarSQL->execute();

    if($insertarSQL->rowCount()){
        header("Location: $index?info=Registrado con exito");
    } else {
        header("Location: $index?info=Error al registrar");
    }