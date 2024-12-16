<?php
    $conexion = mysqli_connect("localhost","root","","pruebas");
    if(mysqli_connect_errno()) {
        echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
        exit();
    }

    $consulta = "select * from `personas`";

    $listaPersonas = mysqli_query($conexion, $consulta);

    if($listaPersonas){
        foreach($listaPersonas as $persona){
            echo "
            $persona[nombre]
            $persona[apellidos]
            $persona[edad]
            $persona[telefono]
            <br>
            ";
        }
    }