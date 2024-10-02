<?php 
    
    function calcula_factorial($num){
        $resul =1;
        for($i = $num; $i>0; $i-- ){
            $resul *= $i;
        } 
        return $resul;
    }
?>