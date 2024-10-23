<?php

    function crear_tabla($filas, $columnas) {
        $tabla = "<table style='border: 1px black solid' rules='all'>";
        for($i = 0; $i < $columnas; $i++){
            $tabla .= "<tr>";
            for($j = 0; $j < $filas; $j++){
                $tabla .= "<td>{$i},{$j}</td>";
            }
            $tabla .= "</tr>";
        }
        return $tabla;
    }

