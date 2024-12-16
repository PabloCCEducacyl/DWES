<?php
    $conexion = mysqli_connect("localhost","root","","pruebas");
    if(mysqli_connect_errno()) { // if(!$conexion)
        echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
        exit();
    } else {
        echo "<h1>Bienvenid@ a MySQL! !< /h1>";
    }