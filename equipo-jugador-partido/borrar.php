<?php
require_once "bootstrap.php";
require_once './src/Entity/Equipo.php';
/* http://localhost:3000/equipo-jugador/borrar.php?idEquipo=10 */
$id = $_GET['idEquipo'];
/*buscar el jugador con el id indicado*/
$equipo = $entityManager->find("Equipo", $id);
if(!$equipo){
	echo "Equipo no encontrado";
}else{
	$entityManager->remove($equipo);
	$entityManager->flush();
	echo "Equipo borrado";
}
