<?php
function tabla_altura2($altura = 0){
    $alturas = [
        "Pepe" => 179,
        "Carlos" => 184,
        "Victoria" => 167,
        "Raquel" => 171,
        "Javier" => 176,
    ];
    if($altura != 0){
        $alturas["Usuario"] = $altura;
    }
    $tabla = "<table rules='all' style='border: solid black 1px'>";
    $tabla .= "<tr><th>Nombre</th><th>Altura</th></tr>";
    $media = 0;
    foreach($alturas as $nombre => $altura){
        $media += $altura;
        $tabla .= "<tr><td>$nombre</td><td>$altura</td></tr>";
    }
    $media = floor($media / count($alturas)); 
    $tabla .= "<tr><td>Media</td><td>$media</td></tr>";
    $tabla .= "</table>";
    if($altura > $media){
        $mediacompara = 2;
    } elseif($altura < $media){
        $mediacompara = 1;
    } else {
        $mediacompara = 0;
    }
    $res = [
        "tabla" => $tabla,
        "media" => $mediacompara,
    ];
    return $res;
}