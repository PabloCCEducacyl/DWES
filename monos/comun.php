<?php
session_start(); //se inicia sesion
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>'; //no se si al final use jquery o no pero por si acaso lo dejo
$mysqli = new mysqli("localhost", "root", "", "tiendaweb"); // conexion a bb dd
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous" async></script>';
// bootstrap ↑
echo '<link href="quitos.css" rel="stylesheet">';
echo '<script src="scripts.js" async></script>';
// css y js propios ↑
?>
