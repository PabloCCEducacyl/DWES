<?php

    function numeros_pares_desordenados($numeromaximo){
        $numeros_pares = [];
        for($i = 1; $i <= $numeromaximo; $i++){
            if($i % 2 == 0){
                $numeros_pares[] = $i;
            }
        }
        shuffle($numeros_pares);
        return $numeros_pares;
    }