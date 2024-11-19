<?php
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        header("Location: ../vistas/formulario_agregar_proyecto.php?error='Error de petición'");
    }
    include("../config/conexion.php");
    $proximoIDSQL = $conexion->prepare("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'proyecto'");
    $proximoIDSQL->setFetchMode(PDO::FETCH_NUM);
    $proximoIDSQL->execute();
    $proximoID = $proximoIDSQL->fetch()[0];
    //echo $proximoID;
    //print_r($_FILES);
    $pdf = $_FILES['pdf'];
    move_uploaded_file($pdf["tmp_name"], "../archivos/" . $proximoID . ".pdf");
    
    //$titulo = $_POST['titulo'];
    //$descripccion ? $_POST['descripccion'] : '';
    //$periodo = $_POST['periodo'];
    //$curso = $_POST['fecha_presentacion'];
    //$nota = $_POST['nota'];
    //$logotipo;
