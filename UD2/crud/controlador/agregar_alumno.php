<?php
    foreach($_GET as $GET => $valor){
        $$GET = $valor;
        //echo gettype($$GET);
    }
    require_once('../config/conexion.php');

    //$dni = "2314543V";
    //$nombre = "wwww";
    //$apellidos = "eqwewq";
    //$email = "aaaa@eeee.com";
    //$telefono = "2131313";
    //$curso = "3a";
    

    //print_r($GLOBALS);
    $buscarDNISQL = $mysqli->prepare('SELECT * FROM alumnos WHERE DNI=?');
    
    $buscarDNISQL->bind_param("s", $dni);

    $buscarDNISQL->execute();
    echo $buscarDNISQL->num_rows();
    //print_r($buscarDNISQL->get_result());
    if($buscarDNISQL->num_rows() > 0){
        //echo "a";
        header('Location: ../vistas/formulario_agregar_alumno.php?error=dni en uso');
    }

    $annadirAlumnoSQL = $mysqli->prepare('INSERT INTO alumnos(dni, nombre, apellidos, email, telefono, curso) 
    VALUES(?, ?, ?, ?, ?, ?)');
    //echo "$dni, $nombre, $apellidos, $email, $telefono, $curso";
    $annadirAlumnoSQL->bind_param("ssssss", $dni, $nombre, $apellidos, $email, $telefono, $curso);
    //echo "<br>a " . $annadirAlumnoSQL->error;
    $resannadir = $annadirAlumnoSQL->execute();
    if($resannadir){
        header('Location: ../vistas/formulario_agregar_alumno.php?info=Inserción correcta');
    } else {
        header('Location: ../vistas/formulario_agregar_alumno.php?error=Error al insertar');
    }
    
    