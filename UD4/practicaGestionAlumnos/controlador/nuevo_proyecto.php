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

    if (!file_exists('../archivos')) {
        mkdir('../archivos', 0777, true);
    }

    move_uploaded_file($pdf["tmp_name"], "../archivos/" . $proximoID . ".pdf");

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_presentacion = $_POST['fecha_presentacion'];
    $curso = $_POST['curso'];
    $nota = $_POST['nota'];
    $id_alumno = $_POST['alumno'];
    $id_tutor = $_POST['id_tutor'];

    $insertarProyectoSQL = $conexion->prepare("INSERT INTO proyecto 
    (titulo, descripcion, curso, logotipo, pdf_proyecto, fecha_presentacion, nota, id_alumno, id_tutor) 
    VALUES 
    (:titulo, :descripcion, :curso, :logotipo, :pdf_proyecto, :fecha_presentacion, :nota, :id_alumno, :id_tutor)");
    $insertarProyectoSQL->bindParam(":titulo", $titulo, PDO::PARAM_STR);
    $insertarProyectoSQL->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
    $insertarProyectoSQL->bindParam(":curso", $curso, PDO::PARAM_STR);
    $imagenlogotipo = file_get_contents($logotipo['tmp_name']);
    $base64logotipo = base64_encode($imagenlogotipo);
    $insertarProyectoSQL->bindParam(":logotipo", $base64logotipo, PDO::PARAM_LOB);
    $direccionPDF = "{$proximoID}.pdf";
    $insertarProyectoSQL->bindParam(":pdf_proyecto", $direccionPDF, PDO::PARAM_STR);
    $insertarProyectoSQL->bindParam(":fecha_presentacion", $fecha_presentacion, PDO::PARAM_STR);
    $insertarProyectoSQL->bindParam(":nota", $nota, PDO::PARAM_STR);
    $insertarProyectoSQL->bindParam(":id_alumno", $id_alumno, PDO::PARAM_INT);
    $insertarProyectoSQL->bindParam(":id_tutor", $id_tutor, PDO::PARAM_INT);
    $resInsertar = $insertarProyectoSQL->execute();
    if($resInsertar){
        header("Location:../index.php?info=Proyecto insertado correctamente");
    } else {
        header("Location:../index.php?info=Ha habido un error: {$insertarProyectoSQL->errorCode()}");
    }
    //(:titulo, :descripccion, :periodo, :curso, :logotipo, :pdf_proyecto, :fecha_presentacion, :nota)");