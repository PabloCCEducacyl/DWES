<?php

    function cani(string $frase) : string {
        $canistring = "";
        $letrasfrase = str_split($frase);
        for($i = 0; $i < count($letrasfrase); $i++){
            if($i %2 == 0){
                $canistring.= strtolower($letrasfrase[$i]);
            } else {
                $canistring.= strtoupper($letrasfrase[$i]);
            }
        }
        return $canistring;
    }

    $frase = 'El principio de la ciencia, casi la definición, es el siguiente: "La prueba de todo conocimiento es el experimento". El experimento es el único juez de la verdad científica';
    $frase2 = cani($frase);
    echo "<p>$frase2</p>";
