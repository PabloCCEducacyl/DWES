<?php
    function numeros_desordenados(){
        $resultado = [
            "mayor" => -1,
            "menor" => 101,
            "media" => 0
        ];
        $numeros_aleatorios = [];
        $media_total = 0;
        for($i = 0; $i < 33; $i++){
            $numeros_aleatorios[$i] = random_int(0, 100);
            if($numeros_aleatorios[$i] > $resultado["mayor"]){
                $resultado["mayor"] = $numeros_aleatorios[$i];
            }
            if($numeros_aleatorios[$i] < $resultado["menor"]){
                $resultado["menor"] = $numeros_aleatorios[$i];
            }
            $media_total += $numeros_aleatorios[$i];
        }
        $resultado["media"] = $media_total / 33;
        return $resultado;
    }