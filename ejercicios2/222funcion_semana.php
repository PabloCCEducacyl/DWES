<?php
    function dia_semana(){
        $dia = rand(1,7);
        switch($dia){
            case 1:
                $dia_semana = "lunes";
                break;
            case 2:
                $dia_semana = "martes";
                break;
            case 3:
                $dia_semana = "miercoles";
                break;
            case 4:
                $dia_semana = "jueves";
                break;
            case 5:
                $dia_semana = "viernes";
                break;
            case 6:
                $dia_semana = "sabado";
                break;
            case 7:
                $dia_semana = "domingo";
                break;
        }
        return $dia_semana;
    }