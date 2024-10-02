<?php 
    function descomponer_dinero($dinero_inicial) {
        $dinero_descompuesto = [
            500 => 0,
            200 => 0,
            100 => 0,
            50 => 0,
            20 => 0,
            10 => 0,
            5 => 0,
            2 => 0,
            1 => 0
        ];

        $denominaciones = [500, 200, 100, 50, 20, 10, 5, 2, 1];
        while($dinero_inicial > 0){
            foreach($denominaciones as $denominacion){
                if($dinero_inicial >= $denominacion){
                    $dinero_descompuesto[$denominacion]++;
                    $dinero_inicial = $dinero_inicial - $denominacion;
                }
            }
        }
        return $dinero_descompuesto;
    }