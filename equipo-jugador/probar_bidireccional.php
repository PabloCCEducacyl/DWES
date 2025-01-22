<?php
require_once "bootstrap.php";
require_once './src/Entity/EquipoBidireccional.php';
require_once './src/Entity/JugadorBidireccional.php';

/* Buscar el equipo con el id indicado */
/* http://localhost:3000/probar_bidireccional.php?id=3 */
$id = $_GET['id'];
$equipo = $entityManager->find("EquipoBidireccional", $id);

if (!$equipo) {
    echo "Equipo no encontrado";
} else {
    // Mostrar todos los datos del equipo
    echo "<h1>Detalles del Equipo</h1>";
    echo "<strong>Nombre del equipo:</strong> " . $equipo->getNombre() . "<br>";
    echo "<strong>Socios:</strong> " . $equipo->getSocios() . "<br>";
    echo "<strong>Año de fundación:</strong> " . $equipo->getFundacion() . "<br>";
    echo "<strong>Ciudad:</strong> " . $equipo->getCiudad() . "<br><br>";

    // Obtener y mostrar todos los jugadores del equipo
    $jugadores = $equipo->getJugadores();
    if (count($jugadores) > 0) {
        echo "<h2>Lista de Jugadores</h2>";
        foreach ($jugadores as $jugador) {
            echo "<strong>Nombre:</strong> " . $jugador->getNombre() . "<br>";
            echo "<strong>Apellidos:</strong> " . $jugador->getApellidos() . "<br>";
            echo "<strong>Edad:</strong> " . $jugador->getEdad() . "<br><br>";
        }
    } else {
        echo "<p>Este equipo no tiene jugadores registrados.</p>";
    }
}
?>