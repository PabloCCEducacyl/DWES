<?php 

    $numerofactorial = $_GET["num"];
    
    function factorial($num){
        $resul =1;
        for($i = $num; $i>0; $i-- ){
            $resul *= $i;
        } 
        return $resul;
    }
    if($numerofactorial < 0){
        echo "no se pueden numeros negativos";
    } else {
        echo "factorial = " . factorial($numerofactorial);
    }
?>