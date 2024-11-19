<?php
    include('../config/conexion.php');
    $viejodni = $_POST['viejodni'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $curso = $_POST['curso'];
    try {
        $modificarAlumnoSQL = $conexion->prepare('UPDATE alumnos SET DNI=:dni, nombre=:nombre, apellidos=:apellidos, email=:email, telefono=:telefono, curso=:curso WHERE DNI=:dniviejo');
        $modificarAlumnoSQL->bindParam(':dni', $dni, PDO::PARAM_STR);
        $modificarAlumnoSQL->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $modificarAlumnoSQL->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $modificarAlumnoSQL->bindParam(':email', $email, PDO::PARAM_STR);
        $modificarAlumnoSQL->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $modificarAlumnoSQL->bindParam(':curso', $curso, PDO::PARAM_STR);
        $modificarAlumnoSQL->bindParam(':dniviejo', $viejodni, PDO::PARAM_STR);
        $modificarAlumnoSQL->execute();
        $result = $modificarAlumnoSQL->fetch();
        $conexion = null;
        header("Location: ../vistas/formulario_modificar_alumno.php?info=Modificación correcta");
    } catch(PDOException $e){
        header("Location: ../vistas/formulario_modificar_alumno.php?error=Error al modificar " . $e->getMessage());
    }
?>