<?php

    function devolver_impares(string $frase) : string {
        $nuevafrase = "";
        for($i = 0; $i < strlen($frase); $i++){
            if(!($i % 2 === 0)){
                $nuevafrase .= $frase[$i];
            }
        }
        return $nuevafrase;
    }