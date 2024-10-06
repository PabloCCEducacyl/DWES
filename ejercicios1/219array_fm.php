<?php
    function crear_array_fm(){
        $array_fm = [];
        for($i = 0; $i < 100; $i++){
            switch (rand(1,2)){
            case 1:
                $array_fm[$i] = 'F';
                break;
            case 2:
                $array_fm[$i] = 'M';
                break;
            }
        }
        $array_fm_assoc = [
            'M' => 0,
            'F' => 0,
        ];
        for($i = 0; $i < count($array_fm); $i++){
            $array_fm_assoc[$array_fm[$i]]++;
        }
        return $array_fm_assoc;
    }