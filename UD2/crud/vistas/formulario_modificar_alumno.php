<?php 
        include('encabezado.php');
?>
    <h2>Modificar alumno</h2>
    <?php

        $formId = "<form method='POST'>
            <input type='hidden' name='buscar' value='1'>
            <label>DNI:
            <input type='text' name='dni'></label>
            <input type='submit' value='Enviar'>
            </form>";
        function crearFormularioModificar($dni, $nombre, $apellidos, $email, $telefono, $curso) {
            return "<form method='POST'>
            <input type='hidden' name='modificar' value='1'>
            <input type='hidden' name='viejodni' value={$dni}>
            <label>DNI:                                                                
            <input type='text' name='dni' placeholder={$dni} value={$dni}></label>
            <label>Nombre:
            <input type='text' name='nombre' placeholder={$nombre} value={$nombre}></label>
            <label>Apellidos:
            <input type='text' name='apellidos' placeholder={$apellidos} value={$apellidos}></label>
            <label>Email:
            <input type='email' name='email' placeholder={$email} value={$email}></label>
            <label>Telefono:
            <input type='string' name='telefono' placeholder={$telefono} value={$telefono}></label>
            <label>Curso:
            <input type='text' name='curso' placeholder={$curso} value={$curso}></label>
            <input type='submit' value='Enviar'>
            </form>";
        }
        //Podria ser peor
        if(isset($_POST['buscar'])){
            include('../config/conexion.php');
            $dni = $_POST['dni'];
            $buscarDNISQL = $mysqli->prepare('SELECT * FROM alumnos WHERE DNI=?');
            $buscarDNISQL->bind_param("s", $dni);
            $buscarDNISQL->execute();
            $resBuscar = $buscarDNISQL->get_result();
            $numBuscar = $resBuscar->num_rows;
            if($numBuscar == 0){
                $mysqli->close();
                header("Location: formulario_modificar_alumno.php?error=DNI no registrado");
            } else {
                $resBuscarassoc = $resBuscar->fetch_assoc();
                $nombre = $resBuscarassoc['nombre'];
                $apellidos = $resBuscarassoc['apellidos'];
                $email = $resBuscarassoc['email'];
                $telefono = $resBuscarassoc['telefono'];
                $curso = $resBuscarassoc['curso'];
                $mysqli->close();
                echo crearFormularioModificar($dni, $nombre, $apellidos, $email, $telefono, $curso);
            }
        }
        else if(isset($_POST['modificar'])){
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
                header("Location: formulario_modificar_alumno.php?error=Error al modificar " . $xd);
            } else {
                $mysqli->close();
                header("Location: formulario_modificar_alumno.php?info=Modificación correcta");
            }
        } else {
            echo $formId;
        }
    ?>

<?php include('footer.php');?>