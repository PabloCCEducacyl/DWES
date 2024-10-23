<?php

function tabla_altura(){
    $alturas = [
        "Pepe" => 179,
        "Carlos" => 184,
        "Victoria" => 167,
        "Raquel" => 171,
        "Javier" => 176,
    ];
    $tabla = "<table rules='all' style='border: solid black 1px'>";
    $tabla .= "<tr><th>Nombre</th><th>Altura</th></tr>";
    $media = 0;
    foreach($alturas as $nombre => $altura){
        $media += $altura;
        $tabla .= "<tr><td>$nombre</td><td>$altura</td></tr>";
    }
    $media /= count($alturas); 
    $tabla .= "<tr><td>Media</td><td>$media</td></tr>";
    $tabla .= "</table>";
    return $tabla;
}