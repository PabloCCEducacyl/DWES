<?php
    $index = "../vista/index.php";
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header("Location: ".$index."?info=bb");
    } else {
        if(!isset($_POST['correo']) || !isset($_POST['contrasena'])){
            header("Location: ".$index."?info=aa");
        }
    };
    include_once('../config/conexion.php');
    
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];
    
    $contrasenahasheada = password_hash($contrasena, PASSWORD_DEFAULT);

    $selectSQL = $conexion->prepare('SELECT * FROM tutor WHERE correo=:correo');
    $selectSQL->bindParam(':correo', $correo, PDO::PARAM_STR);

    $selectSQL->execute();
    $resSelect = $selectSQL->fetch(PDO::FETCH_ASSOC);
    echo $resSelect;
    print_r($resSelect);
    if($resSelect == 0){
        echo 'no hay nada';
        header("Location: ../index.php?info=Usuario o contraseña incorrectas");
    }

    if(password_verify($contrasena, $resSelect['password'])){
        session_start();
        $_SESSION['correo'] = $correo;
        $_SESSION['tipo_usu'] = $resSelect[0]['tipo_usu'];
        header("Location: ".$index."?info=sesion iniciada");
    } else {
        header("Location: ".$index."?info=Usuario o contraseña incorrectas");
    }