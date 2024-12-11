<?php
    include_once("../config/conexion.php");
    $rebajado = $_POST['rebajado'];
    $rebaja = $_POST['rebaja'];
    $id_prenda = $_POST['id_prenda'];
    $sqlModificar = $conexionSQL->prepare("UPDATE supermoda_hombre.rebajas_hombre
                     SET rebajada=:rebajada, rebaja=:rebaja
                     WHERE id_prenda=:id_prenda;");

    $sqlModificar->bindParam(":id_prenda", $id_prenda, PDO::PARAM_INT);
    $sqlModificar->bindParam(":rebajada", $rebajado, PDO::PARAM_BOOL);
    $sqlModificar->bindParam(":rebaja", $rebaja, PDO::PARAM_INT);

    $sqlModificar->execute();

    if($sqlModificar->rowCount() == 1){
        header("Location: ../index.php?info=Modificado con exito");
    } else {
        print_r($sqlModificar);
    }
    