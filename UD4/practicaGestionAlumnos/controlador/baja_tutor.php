<?php
    $id = $_GET['id_tutor'];
    $baja = $_GET['baja'];

    require '../config/conexion.php';

    session_start();
    if(!isset($_SESSION['tipo_usu']) || $_SESSION['tipo_usu'] != '1'){
        header('Location: ../index.php');
    }

    $sql = $conexion->prepare("UPDATE tutor SET baja = :baja WHERE id_tutor = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->bindParam(':baja', $baja, PDO::PARAM_BOOL);

    $sql->execute();

    if($sql->rowCount() > 0){
        header('Location: ../index.php?info=Baja modificada');
    } else {
        header('Location: ../index.php?info=Error');
    }
?>