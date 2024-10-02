<?php 
require('212descomposicion_dinero.php');
require('213ecuacion_2grado.php');
require('214numeros_desordenados.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 1</title>
    <meta name="author" content="Pablo Campuzano Cuadrado">
</head>
<body>
    <h1>Ejercicios 1</h1>
    <h2>Ejercicio 212</h2>
    <form>
        <label for="numero212">Dinero total:</label>
        <input type="number" name="numero212">
        <input type="submit" value="Enviar"> 
    </form>
    <?php
        if(!isset($_GET['numero212'])){
            $numero212 = 0;
        } else {
            $numero212 = $_GET['numero212'];
        }
        $array212 = descomponer_dinero($numero212);
        echo "<p>Para $numero212 euros:</p>
                <table>
                <tr><th>Denominación</th><th>Cantidad</th></tr>";
        foreach($array212 as $denominacion => $valor){
            echo "<tr>";
            echo "<td>$denominacion</td><td>$valor</td>";
            echo "<tr>";
        }
        echo "</table>"
    ?>
    <hr>
    <h2>Ejercicio 213</h2>
    <form>
        <h3>Ecuación segundo grado</h3>
        <label for="numero213a">a:</label>
        <input type="number" name="numero213a">
        <label for="numero213b">b:</label>
        <input type="number" name="numero213b">
        <label for="numero213c">c:</label>
        <input type="number" name="numero213c">
        <input type="submit" value="Enviar"> 
    </form>
    <?php
        if(!isset($_GET['numero213a']) || $_GET['numero213a'] == ""){
            $numero213a = 0;
        } else {
            $numero213a = $_GET['numero213a'];
        }
        if(!isset($_GET['numero213b']) || $_GET['numero213b'] == "") {
            $numero213b = 0;
        } else {
            $numero213b = $_GET['numero213b'];
        }
        if(!isset($_GET['numero213c']) || $_GET['numero213c'] == ""){
            $numero213c = 0;
        } else {
            $numero213c = $_GET['numero213c'];
        }
        echo "Para a=$numero213a, b=$numero213b, c=$numero213c";
        $resultados = ecuacion_2grado($numero213a, $numero213b, $numero213c);
        if($resultados[0] == 'NAN'){
            echo "<p>No tiene solución</p>";
        } else{
            if($resultados[0] == $resultados[1]){
                echo "<p>Una solucion: $resultados[0]</p>";
            } else {
                echo "<p>Dos soluciones: $resultados[0] y $resultados[1]</p>";
            }
        }
    ?>
    <hr>
    <h2>Ejercicio 213</h2>
    <form>
        <h3>Numeros pares desordenados</h3>
        <label for="numero214">Numeros:</label>
        <input type="number" name="numero214"> 
        <input type="submit" value="Enviar">
    </form>
    <?php
        if(!isset($_GET['numero214']) || $_GET['numero214'] == ""){
            $numero214 = 50;
        } else {
            $numero214 = $_GET['numero214'];
        }
        $numeros_pares214 = numeros_pares_desordenados($numero214);
        echo "<p>Números pares del 0 al $numero214:</p>
        <table>
        <tr><th>Números</th></tr>";
        foreach($numeros_pares214 as $numeropar){
            echo "<tr><td>$numeropar</td></tr>";
        }
        echo "</table>"
    ?>
</body>
</html>