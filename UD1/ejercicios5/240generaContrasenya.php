<?php
    function generarContrasena($num){
        $contrasena = "";
        for($i = 0; $i < $num; $i++){
            $siguiente_caracter = random_int(60, 116);
            //echo "<p>$siguiente_caracter // ";
            if($siguiente_caracter <= 64){
                $siguiente_caracter -= 12;
            } else if ($siguiente_caracter > 90){
                $siguiente_caracter += 6;
            }
            //echo "$siguiente_caracter</p>";
            $contrasena .= chr($siguiente_caracter);
        }
        return $contrasena;
    }

    echo "<p>" . generarContrasena(40) . "</p>";


?>