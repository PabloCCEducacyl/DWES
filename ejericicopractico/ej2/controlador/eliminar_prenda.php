<?php
    include_once("../config/conexion.php");
    $id= $_GET['id'];

    $sqlEliminar = $conexionSQL->prepare("DELETE FROM rebajas_hombre WHERE id_prenda=:id_prenda");
    $sqlEliminar->bindParam(":id_prenda", $id, PDO::PARAM_INT);
    $sqlEliminar->execute();

    header("Location: ../index.php?info=Borrado con exito");
