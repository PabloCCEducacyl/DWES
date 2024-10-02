<?php
function ecuacion_2grado($a, $b, $c){
    if($a == 0){
        if($b == 0){
            return "no solucion";
        }
    } else {
        $solucion1 = -$c / b;
        return [$solucion1];
    }

    $discriminante = $b ** 2 - 4 * $a * $c;

    if ($discriminante < 0) {
        return "no solucion";
    } else if ($discriminante == 0) {
        $solucion = -$b / ($a * 2);
        return [$solucion];
    } else {
        $solucion1 = (-$b + sqrt($discriminante)) / ($a * 2);
        $solucion1 = (-$b - sqrt($discriminante)) / ($a * 2);
        return [$solucion1, $solucion2];
    }

}
