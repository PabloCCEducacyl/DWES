<?php
    include_once("conexion.php");
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];
    $telefono = $_POST["telefono"];
    $sql = "insert into persona (nombre, apellido, edad, telefono) values ('$nombre', '$apellido', $edad, '$telefono')";
    if($mysqli_conexion->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli_conexion->error;
    }