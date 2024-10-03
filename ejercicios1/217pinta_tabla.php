<?php

    function crear_tabla($filas, $columnas) : string {
        $tabla = "<table>";
        for($i = 0; $i < $columnas; $i++){
            $tabla .= "<tr>";
            for($j = 0; $j < $filas; $j++){
                $tabla .= "<td>{$i}x{$j}</td>";
            }
            $tabla .= "</tr>";
        }
        return $tabla;
    }

