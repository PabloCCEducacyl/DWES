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
    <form method='POST' id="formularioEliminar" onsubmit="return confirmarEliminar()">
        <input type="hidden" name="eliminar" value="1">
        <label>DNI a borrar:
            <input type="text" required name="dni" 
            value="<?php if(isset($_GET['eliminar_de_lista'])){echo $_GET['eliminar_de_lista'];}?>">
            <!--si viene de listar se autocompleta--></label>
        <input type="submit" name="Enviar">
    </form>

    <script defer>
        function confirmarEliminar() {
            return confirm('¿Estás seguro de que deseas eliminar este alumno?');
        }

        <?php
            if(isset($_GET['eliminar_de_lista'])){ //si viene de listar se sube el formulario
                                                   //directamente con php
                echo "                             
                window.onload = function() {
                    if(confirmarEliminar()){
                        document.getElementById('formularioEliminar').submit();
                    }
                };";
            }
        ?>
    </script>
<?php
    include('footer.php')
?>