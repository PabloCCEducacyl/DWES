<?php 
        include('encabezado.php');?>
    <h2>Modificar alumno</h2>
    <?php

        $formId = "<form method='POST'>
            <input type='hidden' name='buscar' value='1'>
            <label>DNI:
            <input type='text' name='dni'></label>
            <input type='submit' value='Enviar'>
            </form>";
        function crearFormularioModificar($dni, $nombre, $apellidos, $email, $telefono, $curso) {
            return "<form method='POST' action='../controlador/modificar_alumno.php'>
            <input type='hidden' name='modificar' value='1'>
            <input type='hidden' name='viejodni' value={$dni}>
            <label>DNI:                                                                
            <input type='text' name='dni' required placeholder={$dni} value={$dni}></label>
            <label>Nombre:
            <input type='text' name='nombre' required placeholder={$nombre} value={$nombre}></label>
            <label>Apellidos:
            <input type='text' name='apellidos' placeholder={$apellidos} value={$apellidos}></label>
            <label>Email:
            <input type='email' name='email' required placeholder={$email} value={$email}></label>
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
            $buscarDNISQL = $conexion->prepare('SELECT * FROM alumnos WHERE DNI=:dni');
            $buscarDNISQL->bindParam(':dni', $dni, PDO::PARAM_STR);
            $buscarDNISQL->setFetchMode(PDO::FETCH_ASSOC);
            $buscarDNISQL->execute();
            $resBuscar = $buscarDNISQL->fetchAll();
            $numBuscar = sizeof($resBuscar);
            if($numBuscar == 0){
                $conexion = null;
                header("Location: formulario_modificar_alumno.php?error=DNI no registrado <pre>{$dni}</pre>");
            } else {
                $resBuscar = $resBuscar[0]; //un poco guarro pero bueno
                $nombre = $resBuscar['nombre'];
                $apellidos = $resBuscar['apellidos'];
                $email = $resBuscar['email'];
                $telefono = $resBuscar['telefono'];
                $curso = $resBuscar['curso'];
                $conexion = null;
                echo crearFormularioModificar($dni, $nombre, $apellidos, $email, $telefono, $curso);
            }
        }
        else {
            echo $formId;
        }
    ?>

<?php include('footer.php');?>