<?php
require_once('bootstrap.php');
require_once('./src/Entity/Jugador.php');
require_once('./src/Entity/Equipo.php');
require_once('./src/Entity/Partido.php');
require_once('./src/Entity/EquipoRepository.php');
require_once('./src/Entity/PartidoRepository.php');
$jugadores = $entityManager->getRepository('Equipo')->getLista("Metin2");

if($jugadores === -1){
    echo "Equipo no encontrado";
} else {
    foreach($jugadores as $jugador){
        echo "Nombre: " . $jugador->getNombre() . " " . $jugador->getApellidos(). "<br>";
    }
}

$partidos = $entityManager->getRepository('Partido')->getPartidosLocal("madrid");
if($partidos === -1){
    echo "partidos no encontrados";
} else {
    foreach($partidos as $partido){
        echo $partido->getGolesLocal();
    }
}
