<?php
function ecuacion_2grado($a, $b, $c){
    if($a == 0){
        if($b == 0){
            $solucion1 = 0;
            $solucion2 = 0;
        } else {
            $solucion1 = -($c/$b);
            $solucion2 = $solucion1;
        }
    }
    else if($c == 0){
        if($b > 0){
            $solucion1 = -($b / $a);
            $solucion2 = 0;
        } else {
            $solucion1 = 0;
            $solucion2 = -($b / $a);
        }
    } else {
        if(sqrt(-$b**2 - (4 * $a * $c)) < 0){
            return 'no solucion';
        }
        if(sqrt(-$b**2 - (4 * $a * $c)) == 0){
            $solucion1 = (-$b / (2 * $a));
            $solucion2 = $solucion1;
        }
        if($a == 0){
            $solucion1 = (-$b + sqrt($b**2 - (4 * $a * $c))) / (2 * $a);
            $solucion2 = (-$b - sqrt($b**2 - (4 * $a * $c))) / (2 * $a);
                
        }
        $solucion1 = (-$b + sqrt($b**2 - (4 * $a * $c))) / (2 * $a);
        $solucion2 = (-$b - sqrt($b**2 - (4 * $a * $c))) / (2 * $a);
    }
    return [$solucion1, $solucion2];
}
