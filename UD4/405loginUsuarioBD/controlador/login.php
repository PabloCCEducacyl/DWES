<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: ../index.php?info=bb');
    } else {
        if(!isset($_POST['usuario']) || !isset($_POST['contrasena'])){
            header('Location: ../index.php?info=aa');
        }
    };
    include_once('../config/conexion.php');
    
    $usuario = trim($_POST['usuario']);
    $contrasena = $_POST['contrasena'];
    
    $contrasenahasheada = password_hash($contrasena, PASSWORD_DEFAULT);

    $selectSQL = $conexion->prepare('SELECT * FROM users WHERE usuario=:usuario');
    $selectSQL->bindParam(':usuario', $usuario, PDO::PARAM_STR);

    $selectSQL->execute();

    $resSelect = $selectSQL->fetchALL();

    if(password_verify($contrasena, $resSelect[0]['password'])){
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo_usu'] = $resSelect[0]['tipo_usu'];
        header("Location: ../index.php?info=sesion iniciada");
    } else {
        header("Location: ../index.php?info=Usuario o contraseña incorrectas?info={$resSelect[0]['contrasena']}");
    }