<?php
    $id_proyecto = $_GET['id_proyecto'];

    require '../config/conexion.php';

    session_start();
    if(!isset($_SESSION['tipo_usu'])) {
        header('Location: ../index.php');
    }

    $sql = $conexion->prepare("DELETE FROM proyecto WHERE id_proyecto = :id_proyecto");
    $sql->bindParam(':id_proyecto', $id_proyecto, PDO::PARAM_INT);

    $sql->execute();

    if($sql->rowCount() > 0){
        header('Location: ../index.php?info=Proyecto eliminado');
    } else {
        header('Location: ../index.php?info=Error');
    }
