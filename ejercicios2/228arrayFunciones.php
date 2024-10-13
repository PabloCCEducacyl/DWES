<?php
    require '228biblioteca.php';
    $funciones = [
        "sumar",
        "restar",
        "multiplicar",
        "dividir",
    ];

    function cuentas228(int $num1, int $num2) : array {
        global $funciones;
        $res = [];
        foreach ($funciones as $cuenta) {
            if($cuenta == "dividir" && $num2 == 0) {
                $res[$cuenta] = "No se puede dividir por 0"; 
            } else {
                $res[$cuenta] = $cuenta($num1, $num2); //crea array asociativo
            }
        }
        return $res;
    }
    
