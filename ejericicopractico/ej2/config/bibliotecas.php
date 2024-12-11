<?php
    function ordenarRes(&$array) {
        $ordenado = 0;
        while($ordenado == 0){
            $ordenado = 1;
            for($row = 0; $row < count($array)-1; $row++){
                if($array[$row]['rebaja'] == '') $array[$row]['rebaja'] = 0;
                if($array[$row+1]['rebaja'] == '') $array[$row+1]['rebaja'] = 0;
                if($array[$row]['rebaja'] < $array[$row+1]['rebaja']){
                    $temp = $array[$row];
                    $array[$row] = $array[$row+1];
                    $array[$row+1] = $temp;
                    $ordenado = 0;
                }
            }
        }
    }

    function limpiarNombre($nombre){
        $nombre = trim($nombre);
        $nombre[0] = strtoupper($nombre[0]);
        for($letra = 1; $letra < strlen($nombre); $letra++){
            $nombre[$letra] = strtolower($nombre[$letra]);
        }
        return $nombre;
    }