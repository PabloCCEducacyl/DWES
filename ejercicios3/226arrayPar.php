<?php
    declare(strict_types = 1);
    function esPar(int $num) : bool {
        return $num%2 == 0;
    }

    function arrayAleatorio(int $tam, int $min, int $max) : array {
        $array = [$tam];
        for($i = 0; $i < $tam; $i++){
            $array[$i] = rand($min, $max);
        }
        return $array;
    }

    function arrayPares(&$array) : int {
        $cuentaPares = 0;
        foreach($array as $numero){
            if(esPar($numero)){
                $cuentaPares++;
                $numero = 0;
            };
        };
        return $cuentaPares;
    }   