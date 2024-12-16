<?php
    include_once("conexion.php");
    if($mysqli_conexion->connect_errno) {
        echo "Error de conexion con la base de datos: " . $mysqli_conexion->connect_errno;
        exit;
    }

    $consulta = "select * from persona";
    $resultado = $mysqli_conexion->query($consulta);
    $numRegistros=$resultado->num_rows;

    $listaPersonas=$resultado->fetch_all(MYSQLI_ASSOC);
    echo "Numero de registros: ".$numRegistros. "<br>";

    if ($numRegistros > 0){
        foreach ($listaPersonas as $persona) {
        echo "ID: " . $persona["id"] . "<br>";
        }
    }else{
        echo "Error";
    }

    $resultado->free();
    $mysqli_conexion->close();