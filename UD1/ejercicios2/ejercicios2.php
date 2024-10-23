<?php
    //require('219array_fm.php');
    require('222funcion_semana.php');
    require('223funcion_capital.php');
    require('224funcion_potencia.php');
    require('226arrayPar.php');
    require('228arrayFunciones.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 2</title>
    <meta name="author" content="Pablo Campuzano Cuadrado">
</head>
<body>
    <h1>Ejercicios 2</h1>
    <ul>
        <li><a href="#221">Ejercicio 221</a></li>
        <li><a href="#222">Ejercicio 222</a></li>
        <li><a href="#223">Ejercicio 223</a></li>
        <li><a href="#225">Ejercicio 225</a></li>
        <li><a href="#226">Ejercicio 226</a></li>
        <li><a href="#227">Ejercicio 227</a></li>
        <li><a href="#228">Ejercicio 228</a></li>
        <li><a href="#229">Ejercicio 229</a></li>
    </ul>
    <hr>
    <h2 id="222">Ejercicio 222</h2>
    <?php echo "Feliz " . dia_semana();?>
    <hr>
    <h2 id="223">Ejercicio 223</h2>
    <form>
        <label for="pais223">pais:</label>
        <input type="text" name="pais223">
        <input type="submit" value="Enviar"> 
    </form>
    <table>
    <?php
        if(!isset($_GET['pais223']) || $_GET['pais223'] == ""){
            $pais223 = "todos";
        } else {
            $pais223 = $_GET['pais223'];
        }
        $capital = capital($pais223);
        if(is_string($capital)){
            echo $capital;
        } else {
            print_r($capital);
        }
    ?>
    <hr>
    <h2 id="224">Ejercicio 224</h2>
    <form>
        <label for="base224">base:</label>
        <input type="text" name="base224" id="base224">
        <label for="exp224">exponente(opcional):</label>
        <input type="text" name="exp224" id="exp224">
        <input type="submit" value="Enviar"> 
    </form><br>
    <?php
        if(!isset($_GET['base224']) || $_GET['base224'] == ""){
            $base224 = "0";
        } else {
            $base224 = $_GET['base224'];
        }
        if(!isset($_GET['exp224']) || $_GET['exp224'] == ""){
            unset($exp224);
        } else {
            $exp224 = $_GET['exp224'];
        };
        if(isset($exp224)){
            echo "<p>".potencia($base224, $exp224)."</p>";
        } else {
            echo "<p>".potencia($base224)."</p>";
        }
    ?>
    <hr>
    <h2 id="225">Ejercicio 225</h2>
    <a href="225datosPersonales.html">Ir a Ejercicio 225</a>
    <hr>
    <h2 id="226">Ejercicio 226</h2>
    <form>
        <label for="num226">num:</label>
        <input type="text" name="num226" id="num226">
        <label for="min226">min:</label>
        <input type="text" name="min226" id="min226">
        <label for="max226">max:</label>
        <input type="text" name="max226" id="max226">
        <input type="submit" value="Enviar"> 
    </form>
    <?php
        if(!isset($_GET['num226']) || $_GET['num226'] == ""){
            $num226 = "5";
        } else {
            $num226 = $_GET['num226'];
        }
        if(!isset($_GET['min226']) || $_GET['min226'] == ""){
            $min226 = "1";
        } else {
            $min226 = $_GET['min226'];
        }
        if(!isset($_GET['max226']) || $_GET['max226'] == ""){
            $max226 = "10";
        } else {
            $max226 = $_GET['max226'];
        }
        echo"<br>";
        $array226 = arrayAleatorio($num226, $min226, $max226);
        print_r($array226);
        echo "<br>" . arrayPares($array226);
        echo "<br> array cambiado: " . print_r($array226);    ?>

    <hr>
    <h2 id="227">Ejercicio 227</h2>
    <a href="227parametrosVariables.php">Ir a ejercicio 227</a>
    <hr>
    <h2 id="228">Ejercicio 228</h2>
    <form>
        <label for="num1-228">num1:</label>
        <input type="text" name="num1-228" id="num-1228">
        <label for="num2-228">num2:</label>
        <input type="text" name="num2-228" id="num2-228">
        <input type="submit" value="Enviar">
    </form>
    <?php
        if(!isset($_GET['num1-228']) || $_GET['num1-228'] == ""){
            $num1 = "5";
        } else {
            $num1 = $_GET['num1-228'];
        }
        if(!isset($_GET['num2-228']) || $_GET['num2-228'] == ""){
            $num2 = "10";
        } else {
            $num2 = $_GET['num2-228'];
        }
        echo "<p>Para: $num1 y $num2:</p>";
        $resultados228 = cuentas228($num1, $num2);
        foreach($resultados228 as $cuenta => $res){
            echo "$cuenta: $res<br>";
        }
    ?>
    <hr>
    <h2 id="229">Ejercicio 229</h2>
    <a href="229matematicas.php">Ir a ejercicio 229</a>
</body>
</html>