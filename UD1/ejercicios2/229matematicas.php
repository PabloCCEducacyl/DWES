<?php

    function digitos(int $num) : int {
        return strlen((string) $num);
    }

    function digitosN(int $num, int $pos) : int {
        return str_split($num)[$pos-1];
        //divide el array y luego coge el que este en la posicion $pos-1 por que empieza en 0
    }

    function quitaPorDetras(int $num, int $cant) : int {
        $nuevoint = substr($num, 0, digitos($num) - $cant);
        return $nuevoint;
    }

    function quitaPorDelante(int $num, int $cant) : int {
        $nuevoint = substr($num, $cant);
        return $nuevoint;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 229</title>
</head>
<body>
    <h1>Ejercicio 229</h1>
    <h2>Función digitos()</h2>
    <?php
        $numero = 665564987651 ;
        echo "<p>num digitos en $numero: " . digitos($numero) . "</p>";
    ?>
    <h2>Función digitosN()</h2>
    <?php
        $pos = 5;
        echo "<p>num en pos $pos de $numero es: " . digitosN($numero, $pos) . "</p>";
    ?>
    <h2>Función quitaPorDetras()</h2>
    <?php
        $quitardetras = 3;
        echo "<p>quitando $quitardetras digitos de $numero por detras: " . quitaPorDetras($numero, $quitardetras) . "</p>";
    ?>
    <h2>Función quitaPorDelante()</h2>
    <?php
        $quitaradelante = 3;
        echo "<p>quitando $quitaradelante digitos de $numero por delante: " . quitaPorDelante($numero, $quitaradelante) . "</p>";
    ?>

</body>
</html>