<?php
    require('219array_fm.php');
    require('222funcion_semana.php');
    require('223funcion_capital.php');
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
    <h2 id="219">Ejercicio 219</h2>
    <table rules='all' border="solid 1px black">
    <tr>
        <td>g</td><td>val</td>
    </tr>
        <?php 
        $array_fm = crear_array_fm();
        foreach($array_fm as $fm => $valor){
            echo "<tr><td>$fm</td><td>$valor</td><tr>";
        }
        ?>
    </table>
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
</body>
</html>