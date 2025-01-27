<?php 
require('212descomposicion_dinero.php');
require('213ecuacion_2grado.php');
require('214numeros_desordenados.php');
require('215numeros_aleatorios.php');
require('216tabla_multiplicar.php');
require('217pinta_tabla.php');
require('218tabla_pitagoras.php');
require('219array_fm.php');
require('220alturas.php');
require('221alturas2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 1</title>
    <meta name="author" content="Pablo Campuzano Cuadrado">
    <style>
        input {
            margin-bottom: 8pt;
        }
    </style>
</head>
<body>
    <h1 id="titulo">Ejercicios 1</h1>
    <ul>
        <li><a href="#212">Ejercicio 212</a></li>
        <li><a href="#213">Ejercicio 213</a></li>
        <li><a href="#214">Ejercicio 214</a></li>
        <li><a href="#215">Ejercicio 215</a></li>
        <li><a href="#216">Ejercicio 216</a></li>
        <li><a href="#217">Ejercicio 217</a></li>
        <li><a href="#218">Ejercicio 218</a></li>
        <li><a href="#219">Ejercicio 219</a></li>
        <li><a href="#220">Ejercicio 220</a></li>
        <li><a href="#221">Ejercicio 221</a></li>
    </ul>
    <hr>
    <h2 id="212">Ejercicio 212</h2>
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
    <h2 id="213">Ejercicio 213</h2>
    <form>
        <h3>Ecuación segundo grado</h3>
        <math xmlns="http://www.w3.org/1998/Math/MathML"> <!-- copiado de google -->
        <mrow>
            <mi>x</mi>
            <mo>=</mo>
            <mfrac>
            <mrow>
                <mo>-</mo>
                <mi>b</mi>
                <mo>&#x00B1;</mo>
                <msqrt>
                <mrow>
                    <msup>
                    <mi>b</mi>
                    <mn>2</mn>
                    </msup>
                    <mo>-</mo>
                    <mn>4</mn>
                    <mi>a</mi>
                    <mi>c</mi>
                </mrow>
                </msqrt>
            </mrow>
            <mrow>
                <mn>2</mn>
                <mi>a</mi>
            </mrow>
            </mfrac>
        </mrow>
        </math><br><br>

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
        $resultados2grado = ecuacion_2grado($numero213a, $numero213b, $numero213c);
        if($resultados2grado == "no solucion"){
            echo "<p>No hay soluciones</p>";
        } else if(count($resultados2grado) == 1){
            echo "<p>Una solución</p>";
            echo "<p>Solución: $resultados2grado[0]</p>";
        } else {
            echo "<p>Solucion 1: $resultados2grado[0]</p>";
            echo "<p>Solucion 2: $resultados2grado[1]</p>";
        }
    ?>
    <hr>
    <h2 id="214">Ejercicio 214</h2>
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
    <hr>
    <h2 id="215">Ejercicio 215</h2>
    <?php
        $resultado215 = numeros_desordenados();
        echo "<table style='border: 1px black solid' rules='all'>";
        echo "<tr><th>Mayor</th><th>Media</th><th>Menor</th></tr>";
        echo "<tr><td>{$resultado215['mayor']}</td>";
        echo "<td>{$resultado215['media']}</td>";
        echo "<td>{$resultado215['menor']}</td></tr>";
        echo "</table>"
    ?>
    <hr>
    <h2 id="216">Ejercicio 216</h2>
    <form>
        <label for="numero216">Número:</label>
        <input type="number" name="numero216">
        <input type="submit" value="Enviar"> 
    </form>
    <table style='border: 1px black solid' rules='all'>
    <?php
        if(!isset($_GET['numero216']) || $_GET['numero216'] == ""){
            $numero216 = 1;
        } else {
            $numero216 = $_GET['numero216'];
        }
        $resultado216 = tabla_multiplicar($numero216);
        echo "<tr><th colspan='2'>Tabla del $numero216</th></tr>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr><td>$numero216 * $i</td><td>{$resultado216[$i]}</td></tr>";
        }
    ?> 
    </table>
    <hr>
    <h2 id="217">Ejercicio 217</h2>
    <form>
        <label for="filas217">filas:</label>
        <input type="number" name="filas217">
        <label for="columnas217">columnas:</label>
        <input type="number" name="columnas217">
        <input type="submit" value="Enviar"> 
    </form>
    <table>
    <?php
        if(!isset($_GET['columnas217']) || $_GET['columnas217'] == ""){
            $columnas217 = 3;
        } else {
            $columnas217 = $_GET['columnas217'];
        }
        if(!isset($_GET['filas217']) || $_GET['filas217'] == ""){
            $filas217 = 4;
        } else {
            $filas217 = $_GET['filas217'];
        }
        echo crear_tabla($filas217, $columnas217);
    ?> 
    </table>
    <hr>
    <h2 id="218">Ejercicio 218</h2>
    <form>
        <label for="filas218">filas:</label>
        <input type="number" name="filas218">
        <label for="columnas218">columnas:</label>
        <input type="number" name="columnas218">
        <input type="submit" value="Enviar"> 
    </form>
    <?php 
        if(!isset($_GET['columnas218']) || $_GET['columnas218'] == ""){
            $columnas218 = 10;
        } else {
            $columnas218 = $_GET['columnas218'];
        }
        if(!isset($_GET['filas218']) || $_GET['filas218'] == ""){
            $filas218 = 10;
        } else {
            $filas218 = $_GET['filas218'];
        }
        echo crear_tabla_pitagoras($filas218,$columnas218) ?>
    <hr>
    <h2 id="219">Ejercicio 219</h2>
    <table rules='all' border="solid black 1px">
    <tr>
        <th>g</th><th>val</th>
    </tr>
        <?php 
        $array_fm = crear_array_fm();
        foreach($array_fm as $fm => $valor){
            echo "<tr><td>$fm</td><td>$valor</td><tr>";
        }
        ?>
    </table>
    <hr>
    <h2 id="220">Ejercicio 220</h2>
    <?php echo tabla_altura()?>
    <hr>
    <h2 id="221">Ejercicio 221</h2>
    <form>
        <label for="altura221">altura:</label>
        <input type="number" name="altura221" placeholder="Si 175 => media = 175">
        <input type="submit" value="Enviar"> 
    </form>
    <?php 
        $media = true;
        if(isset($_GET['altura221'])){
            if(!is_numeric($_GET['altura221'])){
                $altura221 = 0;
            } else{
                $altura221 = $_GET['altura221'];
            }
        } else {
            $altura221 = 0;
            $media = false;
        } 
        $res221 = tabla_altura2($altura221);
        echo $res221["tabla"];
        if($media){
            $textomedia = match($res221["media"]){
                2 => "El usuario es mas alto que la media",
                1 => "El usuario es mas bajo que la media",
                0 => "El usuario es igual de alto que la media",
            };
            echo "<p>$textomedia</p>";
        }
    ?>
    <a href="#titulo">Subir</a>
</body>
</html>