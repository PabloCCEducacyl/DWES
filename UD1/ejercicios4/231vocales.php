<?php

    function devolver_vocales(string $frase) : array {
        $letras = [
            "a" => 0,
            "e" => 1,
            "i" => 0,
            "o" => 0,
            "u" => 0,
            
        ];
        
        for($i = 0; $i < strlen($frase); $i++){
            if(array_key_exists(strtolower($frase[$i]), $letras)){
                $letras[strtolower($frase[$i])]++;
            }
            
        }

        return $letras;
    }
    echo "audio<br>";
    print_r(devolver_vocales("audio"));