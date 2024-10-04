<?php

    function crear_tabla_pitagoras($filas, $columnas) {
        $tabla = "<table style='border: 1px black solid' rules='all'>";

        for($i = 0; $i < $columnas+1; $i++){
            $tabla .= "<tr>";
            for($j = 0; $j < $filas+1; $j++){
                if($j == 0){
                    if($i == 0){
                        $numero = 'x';
                    } else {
                        $numero = $i;
                    }
                } else if($i == 0){
                    $numero = $j;
                } else {
                    $numero = $i * $j;
                }
                $tabla .= "<td>{$numero}</td>";
            }
            $tabla .= "</tr>";
        }
        return $tabla;
    }