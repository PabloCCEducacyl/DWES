<?php
    require_once('../config/conexion.php');
    
    $dni = isset($_POST['dni']) ? $_POST['dni'] : '';
    $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $curso = isset($_POST['curso']) ? $_POST['curso'] : '';
    
    //print_r($GLOBALS);
    $buscarDNISQL = $mysqli->prepare('SELECT * FROM alumno WHERE DNI=?');
    
    $buscarDNISQL->bind_param("s", $dni);

    $buscarDNISQL->execute();
    $numDNIres = $buscarDNISQL->get_result();
    $numDNI = $numDNIres->num_rows;
    $buscarDNISQL->close();
    if($numDNI > 0){
        header('Location: ../vistas/formulario_agregar_alumno.php?error=dni en uso&sesion_ya_iniciada');
        exit();
    }
    
    $annadirAlumnoSQL = $mysqli->prepare('INSERT INTO alumno(dni, nombre, apellidos, email, telefono, curso) 
    VALUES(?, ?, ?, ?, ?, ?)');
    $annadirAlumnoSQL->bind_param("ssssss", $dni, $nombre, $apellidos, $email, $telefono, $curso);
    $resannadir = $annadirAlumnoSQL->execute();
    if($resannadir){
        header('Location: ../vistas/formulario_agregar_alumno.php?info=Inserción correcta&sesion_ya_iniciada');
    } else {
        header('Location: ../vistas/formulario_agregar_alumno.php?error=Error al insertar&sesion_ya_iniciada');
    }
    