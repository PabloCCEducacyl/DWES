<?php
    function calculaSueldo($edad, $sueldo) : int {
        $nuevoSueldo = 0;
        if($sueldo > 3000){
            $nuevoSueldo = $sueldo;
        }
        else if($sueldo >= 2000){
            if($edad > 40){
                $nuevoSueldo =  $sueldo * 1.2;
            } else {
                $nuevoSueldo =  $sueldo * 1.13;
            }
        }
        else if($edad < 30){
            $nuevoSueldo =  2030;
        } else if($edad <= 40){
            $nuevoSueldo = $sueldo * 1.04;
        } else {
            $nuevoSueldo = $sueldo * 1.15;
        }
        return $nuevoSueldo;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
    <meta name="author" content="Pablo Campuzano Cuadrado">
</head>
<body>
    <h1>Ejercicio 6</h1>
    <?php
        $edad = rand(16, 65);
        $sueldo = rand(1800, 5000);
        echo "<p>Para sueldo: " . $sueldo ."€ y " . $edad . " años de edad: </p>";
        echo "<p>Nuevo sueldo: " . calculaSueldo($edad, $sueldo) . "</p>";
        echo "<p>Generado en: " . date(DATE_RFC7231). "</p>";
    ?>
</body>
</html>