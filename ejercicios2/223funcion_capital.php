<?php 
    function capital($pais = "todos"){
        $pais_capital = [
            "España" => "Madrid",
            "Francia" => "París",
            "Alemania" => "Berlín",
            "Italia" => "Roma",
            "Reino Unido" => "Londres",
            "Japón" => "Tokio",
            "México" => "Ciudad de México",
            "Brasil" => "Brasilia",
            "Argentina" => "Buenos Aires",
            "Australia" => "Canberra",
        ];
        $capitales = [];
        foreach($pais_capital as $pais => $capital){
            $capitales[] = $capital;
        }
        if($pais == "todos"){
            return $capitales;
            } else {
            if(array_key_exists($pais, $pais_capital)){
                return $pais_capital[$pais];
            } else {
                return $capitales;
            }
        }
            
    }
