<?php
    $servidor = 'mysql:dbname=supermoda_hombre;host=localhost';
    $usuario = 'root';
    $pw = '';

    try {
        $conexionSQL = new PDO($servidor, $usuario, $pw);
        $conexionSQL->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo 'Falló la conexión: ' . $e->getMessage();
    }