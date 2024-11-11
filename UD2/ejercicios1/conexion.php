<?php
    $mysqli = new mysqli('localhost', 'root', '', 'prueba');

    if(mysqli_connect_errno()){
        echo "Fallo al conectar a MySQL: " . mysqli_connect_errno();
    } else {
        echo "<h1>Bienvenid@ a MySQL</h1>";
    }
