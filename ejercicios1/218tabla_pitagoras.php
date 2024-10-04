<?php

    function crear_tabla_pitagoras($filas, $columnas) {
        $tabla = "<table style='border: 1px black solid' rules='all'>";

        for($i = 0; $i < $columnas+1; $i++){
            $tabla .= "<tr>";
            for($j = 0; $j < $filas+1; $j++){
                if($j == 0){
                    if($i == 0){
                        $numero = '<b><u>x</u></b>';
                    } else {
                        $numero = "<b><u>$i</u></b>";
                    }
                } else if($i == 0){
                    $numero = "<b><u>$j</u></b>";
                } else {
                    $numero = $i * $j;
                }
                $tabla .= "<td>{$numero}</td>";
            }
            $tabla .= "</tr>";
        }
        return $tabla;
    }