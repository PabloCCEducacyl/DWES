<?php
    function operandoValores(int ...$nums) : array {
        $suma = 0;
        $multiplicacion = 1;
        foreach($nums as $num){
            $suma += $num;
            $multiplicacion *= $num;
        }

        return [
            "suma" => $suma,
            "multiplicacion" => $multiplicacion,
        ];
    }
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);
    $num3 = rand(-10, 10);
    $num4 = rand(1, 10);
    $num5 = rand(1, 10);
    $num6 = rand(1, 10);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <meta name="author" content="Pablo Campuzano Cuadrado">
    </head>
    <body>
        <h1>Ejercicio 4</h1>
        <?php
            $res = operandoValores($num1,$num2,$num3,$num4,$num5,$num6);
            echo "<p>Para numeros: $num1, $num2, $num3, $num4, $num5, $num6 </p>";
            echo "<p>suma: " .$res["suma"]. ", multiplicacion: ". $res["multiplicacion"]."</p>";
        ?>
    </body>
    </html>