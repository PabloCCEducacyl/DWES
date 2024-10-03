<?php
function tabla_multiplicar($numero) : string{
    $numeros = [];
    for($i = 1; $i <= 10; $i++){
        $numeros[$i] = $numero * $i;
    }
    return $numeros;
}