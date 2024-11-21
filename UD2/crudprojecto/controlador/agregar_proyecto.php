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
    $logotipo = $_FILES['logotipo'];
    move_uploaded_file($pdf["tmp_name"], "../archivos/" . $proximoID . ".pdf");
    
    $titulo = $_POST['titulo'];
    $descripccion = $_POST['descripccion'] ?? '';
    $periodo = $_POST['periodo'];
    $fecha_presentacion = $_POST['fecha_presentacion'];
    $curso = $_POST['curso'];
    $nota = $_POST['nota'];
    $insertarProyectoSQL = $conexion->prepare("INSERT INTO proyecto 
    (titulo, descripccion, periodo, curso, logotipo, pdf_proyecto, fecha_presentacion, nota) 
    VALUES 
    (:titulo, :descripccion, :periodo, :curso, :logotipo, :pdf_proyecto, :fecha_presentacion, :nota)");
    $insertarProyectoSQL->bindParam(":titulo", $titulo, PDO::PARAM_STR);
    $insertarProyectoSQL->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
    $insertarProyectoSQL->bindParam(":periodo", $periodo, PDO::PARAM_STR);
    $insertarProyectoSQL->bindParam(":curso", $curso, PDO::PARAM_STR);
    $insertarProyectoSQL->bindParam(":logotipo", $logotipo, PDO::PARAM_LOB);
    $direccionPDF = "{$proximoID}.pdf";
    $insertarProyectoSQL->bindParam(":pdf_proyecto", $direccionPDF, PDO::PARAM_STR);
    $insertarProyectoSQL->bindParam(":fecha_presentacion", $fecha_presentacion, PDO::PARAM_STR);
    $insertarProyectoSQL->bindParam(":nota", $nota, PDO::PARAM_STR);
    $insertarProyectoSQL->execute();
    print_r($resInsertar);
    if($resInsertar){
        header("Location:../vistas/formulario_agregar_proyecto.php?info='Proyecto introducido correctamente'");
    } else {
        header("Location:../vistas/formulario_agregar_proyecto.php?error='Ha habido un error: {$insertarProyectoSQL->errorCode()}'");
    }