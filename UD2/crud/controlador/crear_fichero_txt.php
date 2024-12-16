<?php
    require_once('../config/conexion.php');
    $selectsql = "SELECT * FROM alumnos";
    $resselect = $mysqli->query($selectsql);
    if(!file_exists('../archivos')){
        mkdir('../archivos');
    }
    $archivo = fopen('../archivos/alumno.txt', 'w');
    fwrite($archivo, 'DNI / Nombre / Apellidos / Email / Telefono / Curso' . "\n");
    while ($alumno = $resselect->fetch_assoc()) {
        $alumnoTexto = $alumno['dni'] . ' / ' . $alumno['nombre'] . ' / ' . $alumno['apellidos'] . ' / ' . $alumno['email'] . ' / ' . $alumno['telefono'] . ' / ' . $alumno['curso'] . "\n";
        fwrite($archivo, $alumnoTexto);
    }
    fclose($archivo);

    $mysqli->close();
    header("Location: ../vistas/listar_alumno.php?info=Fichero txt creado");
?>