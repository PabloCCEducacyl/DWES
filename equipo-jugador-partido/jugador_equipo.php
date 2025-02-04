<?php
  require_once "bootstrap.php";
  require_once './src/Entity/Equipo.php';
  require_once './src/Entity/Jugador.php';
  /* http://localhost:3000/equipo-jugador/jugador_equipo.php?idJugador=5 */
  $id = $_GET['idJugador'];
  /*buscar el jugador con el id indicado*/
  $jugador = $entityManager->find("Jugador", $id);
  if(!$jugador){
 	echo "Jugador no encontrado";
  }else{
	echo "Nombre del jugador: ". $jugador->getNombre()."<br>";
	$equipo = $jugador->getEquipo();
	echo "Nombre del equipo: ". $equipo->getNombre();
  }