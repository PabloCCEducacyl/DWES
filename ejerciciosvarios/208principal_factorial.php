<?php 
    require("208calcula_factorial.php");

    $numero_a_calcular = 10;
    
    if($numero_a_calcular < 0){
        echo "no se pueden numeros negativos";
    } else {
        echo "factorial = " . calcula_factorial($numero_a_calcular);
    }
?>