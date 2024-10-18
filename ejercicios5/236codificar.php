<?php
    function desplazar(string $frase, int $cantidad) : string {
        $letrasaz = range("a", "z");
        $letrasAZ = range("A", "Z");
        $letras = array_merge($letrasaz, $letrasAZ);
        while($cantidad > count($letras)){
            $cantidad -= count($letras);
        }
        $nuevafrase = "";
        foreach(str_split($frase) as $letra){
            if(ctype_alpha($letra)){
                $numeroletra = array_search($letra, $letras);
                if(($numeroletra + $cantidad) < count($letras)){
                    $nuevafrase .= $letras[$numeroletra+$cantidad];
                } else {
                    $nuevafrase .= $letras[$numeroletra+$cantidad-count($letras)];
                }
            } else {
                $nuevafrase .= $letra;
            }
        }
        return $nuevafrase;
    }
    $frase = "a holZ33";
    $frasedesplazada = desplazar($frase, 1);
    echo "<p>". $frasedesplazada. "</p>";