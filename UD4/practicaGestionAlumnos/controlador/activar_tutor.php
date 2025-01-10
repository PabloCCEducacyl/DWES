<?php
    require '../config/conexion.php';

    $id = $_GET['id_tutor'];

    session_start();
    if(!isset($_SESSION['tipo_usu']) || $_SESSION['tipo_usu'] != '1'){
        header('Location: ../index.php');
    }

    $sql = $conexion->prepare("UPDATE tutor SET activada = TRUE WHERE id_tutor = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    if($sql->rowCount() > 0){
        header('Location: ../index.php?info=Activado');
    } else {
        header('Location: ../index.php?info=No se ha podido activar');
    }