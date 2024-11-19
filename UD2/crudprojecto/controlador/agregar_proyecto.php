<?php
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        header("Location: ../vistas/formulario_agregar_proyecto.php?error='Error de petición'");
    }

    $titulo = $_POST['titulo'];
    $descripccion ? $_POST['descripccion'] : '';
    $periodo = $_POST['periodo'];
    $curso = $_POST['fecha_presentacion'];
    $nota = $_POST['nota'];
    $logotipo