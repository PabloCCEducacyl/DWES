<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: index.php');
    } else {
        if(!isset($_POST['usuario']) || !isset($_POST['contrasena']) || !isset($_POST['tipo_usu'])){
            header('Location: index.php');
        }
    };
    include_once('config/conexion.php');
    
    $usuario = trim($_POST['usuario']);
    $contrasena = $_POST['contrasena'];
    $tipo_usu = $_POST['tipo_usu'];
    
    $contrasenahasheada = password_hash($contrasena, PASSWORD_DEFAULT);

    $insertarSQL = $conexion->prepare('INSERT INTO users (usuario, password, tipo_usu) VALUES (:usuario, :contrasena, :tipo_usu)');
    $insertarSQL->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $insertarSQL->bindParam(':contrasena', $contrasenahasheada, PDO::PARAM_STR);
    $insertarSQL->bindParam(':tipo_usu', $tipo_usu, PDO::PARAM_INT);

    $insertarSQL->execute();

    if($insertarSQL->rowCount()){
        header('Location: index.php?info=Registrado con exito');
    } else {
        header('Location: index.php?info=Error al registrar');
    }