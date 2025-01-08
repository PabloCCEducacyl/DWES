<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
    <script defer src="script.js"></script>
</head>
<body>
    <h1 class="titulo-login cuadrado-guay">Gestión Proyectos Alumnos</h1>
    <?php
        session_start();
        if(isset($_SESSION['correo'])){
            echo "<div class='cuadrado-guay cerrar' id='cerrarsesion'>Cerrar Sesión</div>";
        }
        // print_r($_SESSION);
        if(isset($_GET['info'])) {
            echo "<p class='info cuadrado-guay' id='info'>".$_GET['info']."</p>";
        }
        if(!isset($_SESSION['correo'])) {
            include "vistas\loginregistro";
        } else {
            include "vistas\usuario";  
        }
    ?>
</body>
</html>