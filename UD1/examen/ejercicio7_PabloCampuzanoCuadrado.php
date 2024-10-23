<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="author" content="Pablo Campuzano Cuadrado">
</head>
<body>
    <h1>Ejercicio 7</h1>
<?php
    $muebles_assoc = [
        "armario" => 50,
        "silla" => 2,
        "mesa" => 10,
        "puerta" => 20,
    ];
    $muebles = [];
    $pesos = [];
    foreach($muebles_assoc as $mueble => $peso){
        echo "<p>$mueble pesa $peso kilos</p>";
        $muebles[] = $mueble;
        $pesos[] = $peso;
    }
    $muebles_assoc = ordenarArrayAsociativo($muebles_assoc);//no ordena
    print_r($muebles_assoc);
    $nuevo_muebles_assoc = [];
    
    for($i = count($muebles_assoc)-1; $i >= 0; $i--){
        //array_push($nuevo_muebles_assoc, array_keys($muebles_assoc)[$i], array_values($muebles_assoc)[$i]);
    }
   // print_r($nuevo_muebles_assoc);

    function ordenarArrayAsociativo(array $array) : array {
        $ordenado = false;
        $claves = [];
        $valores = [];
        foreach($array as $clave => $valor){
            $claves[] = $clave;
            $valores[] = $valor;
        }
        do{
            $ordenado = true;
            for($i = 0; $i < count($valores)-1; $i++){
                if($valores[$i] > $valores[$i+1]){
                    $temp = $valores[$i];
                    $valores[$i] = $valores[$i+1];
                    $valores[$i+1] = $temp;

                    $temp = $claves[$i];
                    $claves[$i] = $claves[$i+1];
                    $claves[$i+1] = $temp;
                    $ordenado = false;
                }
            }
        } while(!$ordenado);
        $nuevoarray = array_combine($claves, $valores);
        return $nuevoarray;
        //return $array;
    }
?>
</body>
</html>
