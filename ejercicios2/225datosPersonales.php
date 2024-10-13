<?php
    foreach($_GET as $clave => $valor){
        $$clave = $valor;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 225</title>
</head>
<body>
    <table rules='all' border="1">
        <tr>
            <td>Nombre</td>
            <td>Primer Apellido</td>
            <td>Segundo Apellido</td>
            <td>Email</td>
            <td>Año Nacimiento</td>
            <td>Teléfono</td>
        </tr>
        <tr>
            <?php
                echo "<td>$nombre</td>";
                echo "<td>$primerape</td>";
                echo "<td>$segunape</td>";
                echo "<td>$email</td>";
                echo "<td>$annonac</td>";
                echo "<td>$telefono</td>";
            
            ?>
        </tr>
    </table>
    <a href="ejercicios2.php">Volver</a>

</body>
</html>