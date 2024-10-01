<?php 
    $valor = 5;
    $valor2 = 8;
    echo "<h1>Aritmetica</h1>";
    echo "Negacion de $valor: " . (-$valor) . "<br>"; 
    echo "Suma de {$valor} + $valor2: " . ($valor + $valor2) . "<br>";
    echo "Resta de $valor - $valor2: " . ($valor - $valor2) . "<br>";
    echo "Multiplicación de $valor * $valor2: " . ($valor * $valor2) . "<br>";
    echo "Division de $valor / $valor2: " . ($valor / $valor2) . "<br>";
    echo "Módulo de $valor % $valor2: " . ($valor % $valor2) . "<br>";
    echo "Potencia de $valor ** $valor2: " . ($valor ** $valor2);
    echo "<hr>";

    echo "<h1>Lógica</h1>";
    echo "<p>true y false: " . true&&false . "</p>";
    echo "<p>true o false: " . true||false . "</p>";
    echo "<p>true xor false: " . true xor true . "</p>";
    echo "<p>!true: " . !true . "</p>";
    echo "<hr>";

    echo "<h1>Asignación</h1>";
    echo 'Asignación: $valor3 = 50;' . "<br>";
    $valor3 = 50;
    echo 'Asignación de suma: $valor3 += 60;' . "<br>";
    $valor3 += 60;
    echo 'Asignación de resta: $valor3 -= 30;' . "<br>";
    $valor3 -= 30;
    echo 'Asignación del producto: $valor3 *= 9;' . "<br>";
    $valor3 *= 9;
    echo 'Asignación de división: $valor3 /= 18;' . "<br>";
    $valor3 /= 18;
    echo 'Asignación del resto: $valor3 %= 6;' . "<br>";
    $valor3 %= 6;
    echo 'Concatenación: $valor3 .= 2;' . "<br>";
    $valor3 .= 2;
    echo 'Incremento: $valor3++;' . "<br>";
    $valor3++;
    echo 'Decremento: $valor3--;' . "<br>";
    $valor3--;
    echo 'valor final $valor3 = ' . $valor3;
    
?>