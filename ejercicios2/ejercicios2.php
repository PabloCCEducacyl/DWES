<?php
    //require('219array_fm.php');
    require('222funcion_semana.php');
    require('223funcion_capital.php');
    require('226arrayPar.php');
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
        <li><a href="#219">Ejercicio 219</a></li>
        <li><a href="#220">Ejercicio 220</a></li>
        <li><a href="#221">Ejercicio 221</a></li>
        <li><a href="#222">Ejercicio 222</a></li>
    </ul>
    <hr>
    <!--<h2 id="219">Ejercicio 219</h2>
    <table rules='all' border="solid 1px black">
    <tr>
        <td>g</td><td>val</td>
    </tr>
        <?php 
        /**$array_fm = crear_array_fm();
        foreach($array_fm as $fm => $valor){
            echo "<tr><td>$fm</td><td>$valor</td><tr>";
        }**/
        ?>
    </table>
    <hr> -->
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
</body>
</html>