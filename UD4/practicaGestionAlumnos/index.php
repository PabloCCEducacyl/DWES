<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
    <script defer src="script.js"></script>
</head>
<body>
    <?php
        if(isset($_GET['info'])) {
            echo "<p class='info cuadrado-guay'>".$_GET['info']."</p>";
        }
        session_start();
        if(!isset($_SESSION['id_usuario']) || $_SESSION['id_usuario'] == "") {
            include "vistas\loginregistro";
        } else {
            include "vistas\usuario";  
        }
    ?>
</body>
</html>