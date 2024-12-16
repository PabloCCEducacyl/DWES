<?php 
    session_start();
    if(!isset($_SESSION['tipo_usu']) || $_SESSION['tipo_usu'] != '1'){
        header('Location: ../index.php?info=No tienes permisos para acceder a esta página');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Página de usuario</h1>
    <?php echo "<p>Bienvenido {$_SESSION['usuario']}</p>";?>
    <a href="controlador/cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>