<?php
    include_once("../config/conexion.php");
    include_once("../config/bibliotecas.php");
    $nombre_prenda = limpiarNombre($_POST['prenda']);
    

    $foto = $_FILES['foto'];
    $precio = $_POST['precio'];
    $rebaja = $_POST['rebaja'];
    $rebajadoCheck = $_POST['rebajado'];
    if($rebaja == 0){
        $rebajada = FALSE;
    } else {
        $rebajada = TRUE;
    }
    if($rebajadoCheck){
        $rebajada = TRUE;
    } else {
        $rebajada = FALSE;
        $rebaja = 0;
    }
    $imagenprenda = file_get_contents($foto['tmp_name']);
    $base64prenda = base64_encode($imagenprenda);

    $sqlInsertar = $conexionSQL->prepare("INSERT INTO rebajas_hombre
                    (prenda, foto, precio, rebajada, rebaja)
              VALUES(:nombre, :foto, :precio, :rebajada, :rebaja);");
    $sqlInsertar->bindParam(":nombre", $nombre_prenda, PDO::PARAM_STR);
    $sqlInsertar->bindParam(":foto", $base64prenda, PDO::PARAM_LOB);
    $sqlInsertar->bindParam(":precio", $precio, PDO::PARAM_INT);
    $sqlInsertar->bindParam(":rebaja", $rebaja, PDO::PARAM_INT);
    $sqlInsertar->bindParam(":rebajada", $rebajada, PDO::PARAM_BOOL);

    $sqlInsertar->execute();

    if($sqlInsertar->rowCount() == 1){
        header("Location: ../index.php?info=Añadido con exito");
    } else{
        echo "error";
    };