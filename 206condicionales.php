<?php
    $true = true;
    if($true == true){{
        echo '$true es true <br>';
    }}

    $edad = 16;
    $mayor_de_edad = ($edad >= 18) ? true : false;
    echo "$edad años es mayoria de edad: $mayor_de_edad <br>";
    $nota = 7;
    $evaluacion = match(true){
        $nota < 5 => 'Suspenso',
        $nota == 5 => 'Suficiente',
        $nota == 6  => 'Bien',
        $nota == 7 || $nota == 8  => 'Notable',
        $nota == 9 || $nota == 10 => 'Sobresaliente',
        $nota < 0 || $nota > 10 => 'Nota invalida'    
    };
    echo "Una nota de $nota equivale a un $evaluacion <br>";
    //match es como switch.
    //si pones una variable dentro de match() funciona como un switch
    //pero si pones true busca que caso devuelve true y asi
?>
