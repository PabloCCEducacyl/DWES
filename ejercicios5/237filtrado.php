<?php

    function str_a_pares(string $string) : array {
        $numerosstring = explode(" ", $string);
        $numeros = [];
        foreach($numerosstring as $palabra){
            if(ctype_digit($palabra)){
                if($palabra % 2 == 0){
                    $numeros[] = $palabra;
                }
            }
        }
        return $numeros;
    }
    $frase = "1232 23123 123 1231 23 123 123123 123 hola xd2 1010 12312 20 1230 0 31230";
    $numerosfrase = str_a_pares($frase);
    echo "<p>";
    for($i = 0; $i < count($numerosfrase); $i++){
        echo "{$numerosfrase[$i]} ";
    }