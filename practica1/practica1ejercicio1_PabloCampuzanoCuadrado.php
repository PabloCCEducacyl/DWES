<?php
    foreach($_GET as $get => $value){
        if(is_numeric($value)){ //si suben cosas como ?num_min='33abc' no lo coge
            $$get = $value; //cada cosa del get la metemos en una variable con su nombre
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <meta name="author" content="Pablo Campuzano Cuadrado">
</head>
<body>
    <h1>Ejercicio 1</h1>
    <h4>Pablo Campuzano Cuadrado</h4>
    <form>
        <label>num_numeros:<input type="text" name="num_numeros"></label>
        <label>num_min:<input type="text" name="num_min"></label>
        <label>num_max:<input type="text" name="num_max"></label>
        <input type="submit" value="enviar">
    </form>
    <?php
        if(isset($num_numeros) && isset($num_min) && isset($num_max)){
            //if(!is_integer($num_numeros) || !is_integer($num_numeros) || !is_integer($num_numeros)){
            //    echo "<p>todos los numeros deben ser enteros</p>";
            //} //no se como castear las variables del get que llegan como strings a int. is_interger siempre da falso por que es un string de "3" pero no es un int.
            /*else*/if($num_numeros < 0){
                echo "<p>num_numeros debe ser mayor que 0</p>";
            }else if($num_min > $num_max){
                echo "<p>num_min debe ser menor que num_max</p>";
            } else {
                $resultados = arrayAleatorio($num_numeros, $num_min, $num_max);
                $resultados2 = arrayAleatorio($num_numeros, $num_min, $num_max);
                echo "<p>contados primer array: {$resultados['contados']['mayor']}</p>";
                echo "<p>contados segundo array: {$resultados2['contados']['mayor']}</p>";
                if($resultados2["contados"]["mayor"] > $resultados["contados"]["mayor"]){
                    $resultados = $resultados2;
                }
                unset($resultados2);
                echo "<p>array final:</p>";
                echo "<table border='1' rules='all'><tr>";
                foreach($resultados["numeros"] as $numero){
                    echo "<td>$numero</td>";
                }
                echo "</tr><table>";
            }
        }
        function arrayAleatorio(int $num_numeros, int $num_min, int $num_max) {
            $numeros = [];
            $punto_medio = ($num_max + $num_min) / 2;
            $contados = [
                "menor" => 0,
                "mayor" => 0
            ];
            for($i = 0; $i < $num_numeros; $i++){
                $numeros[$i] = rand($num_min, $num_max);
                if($numeros[$i] < $punto_medio){
                    $contados["menor"]++;
                } else if($numeros[$i] > $punto_medio){
                    $contados["mayor"]++;
                }
            }

            return [
                "numeros" => $numeros,
                "contados" => $contados];
        }
        
    ?>
</body>
</html>