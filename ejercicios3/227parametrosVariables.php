<?php
    declare(strict_types = 1);
    
    function mayor() : int {
        $nums = func_get_args();
        $res = -PHP_INT_MAX;
        if(count($nums) == 0){
            return 0;
            
        } else {
            for($i = 0; $i < count($nums); $i++){
                if($nums[$i] > $res){
                    $res = $nums[$i];
                }
            }
            return $res;
        }
    }

    function concatenar(...$palabras) : string {
        $res = "";
        foreach($palabras as $palabra){
           $res = $res . " " . $palabra;
        }
        return $res;
    }

    echo concatenar("pepe", "juan", "gabino");