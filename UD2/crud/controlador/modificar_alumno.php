<?php
    include('../config/conexion.php');
    $viejodni = $_POST['viejodni'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $curso = $_POST['curso'];
    $modificarAlumnoSQL = $mysqli->prepare('UPDATE alumnos SET DNI=?, nombre=?, apellidos=?, email=?, telefono=?, curso=? WHERE DNI=?');
    $modificarAlumnoSQL->bind_param("sssssss", $dni, $nombre, $apellidos, $email, $telefono, $curso, $viejodni);
    $modificarAlumnoSQL->execute();
    $resModificar = $modificarAlumnoSQL->affected_rows;
    if($resModificar == 0){
        $mysqli->close();
        header("Location: ../vistas/formulario_modificar_alumno.php?error=Error al modificar " . $xd);
    } else {
        $mysqli->close();
        header("Location: ../vistas/listar_alumno.php?info=Modificación correcta");
    }
?>