<?php
require_once('bootstrap.php');
require_once('./src/Entity/Jugador.php');
require_once('./src/Entity/Equipo.php');
require_once('./src/Entity/Partido.php');
require_once('./src/Entity/EquipoRepository.php');
require_once('./src/Entity/PartidoRepository.php');
$equipos = $entityManager->getRepository('Equipo')->getLista();

echo "Lista de Equipos: <br>";
foreach($equipos as $equipo){
    echo "<b>-- Equipo {$equipo->getNombre()} -- </b><br>";
    echo "Ciudad: " . $equipo->getCiudad() . "<br>";
    echo "Fundación: " . $equipo->getFundacion() . "<br>";
    echo "Socios: " . $equipo->getSocios() . "<br>";
    echo "------<br>";
}
echo "<br><hr><br>";

$partidos = $entityManager->getRepository('Partido')->getPartidosLocal("Real madri");
if($partidos === -1){
    echo "partidos no encontrados";
} else {
    foreach($partidos as $partido){
        echo "-- Partido {$partido->getEquipoLocal()->getNombre()} - {$partido->getEquipoVisitante()->getNombre()} -- <br>";
        echo "Fecha: " . $partido->getFecha()->format('Y-m-d') . "<br>";
        echo "Goles: " . $partido->getGolesLocal() . " - " . $partido->getGolesVisitante() . "<br>";
        echo "------<br>";
    }
}
?>
<hr>
<h4>Buscar jugadores y partidos de equipo:</h4>
<form method="get">
    <input type="text" name="nombre" placeholder="Nombre del equipo">
    <input type="submit" value="Buscar">
</form>


<?php
    if(isset($_GET['nombre'])){
        $id = $_GET['nombre'];
        $jugadores = $entityManager->getRepository('Equipo')->getListaJugadores($id);
        if($jugadores === -1){
            echo "Equipo no encontrado";
            die();
        } else {
            echo "Jugadores del equipo $id: <br>";
            foreach($jugadores as $jugador){
                echo "<b>-- Jugador {$jugador->getNombre()} {$jugador->getApellidos()}-- </b><br>";
                echo "Edad: " . $jugador->getEdad() . "<br>";
                echo "------<br>";
            }
        }
        $partidos = $entityManager->getRepository('Partido')->getPartidos($id);

        foreach($partidos as $partido){
            echo "-- Local: <b>{$partido->getEquipoLocal()->getNombre()}</b> - Visitante: <b>{$partido->getEquipoVisitante()->getNombre()} </b>-- <br>";
            echo "Fecha: " . $partido->getFecha()->format('Y-m-d') . "<br>";
            echo "Goles: " . $partido->getGolesLocal() . " - " . $partido->getGolesVisitante() . "<br>";
            echo "------<br>";
        }
    }