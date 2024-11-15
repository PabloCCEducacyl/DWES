<?php
    include('encabezado.php');
    if(isset($_POST['eliminar'])){
        include('../config/conexion.php');
        $dni = $_POST['dni'];
        $listarDNISQL = $mysqli->prepare('SELECT * FROM alumnos WHERE DNI=?');
        $listarDNISQL->bind_param("s", $dni);
        $listarDNISQL->execute();
        $resListar = $listarDNISQL->get_result();
        $numListar = $resListar->num_rows;
        if($numListar == 0){
            header('Location: ../vistas/eliminar_alumno.php?error=No existe el DNI');
            exit();
        } else {
            $eliminarAlumnoSQL = $mysqli->prepare('DELETE FROM alumnos WHERE DNI=?');
            $eliminarAlumnoSQL->bind_param("s", $dni);
            $resEliminar = $eliminarAlumnoSQL->execute();
            $resEliminarTexto = $eliminarAlumnoSQL->error;
            if($resEliminar){
                header('Location: ../vistas/listar_alumno.php?info=Eliminación correcta');
            } else {
                header('Location: ../vistas/eliminar_alumno.php?error=Error al eliminar: '.$resEliminarTexto);            
            }
        }
    }
?>
    <h2>Eliminar alumno</h2>
    <form method='POST'>
        <input type="hidden" name="eliminar" value="1">
        <label>DNI a borrar:
            <input type="text" required name="dni"></label>
        <input type="submit" name="Enviar">
    </form>
<?php
    include('footer.php')
?>