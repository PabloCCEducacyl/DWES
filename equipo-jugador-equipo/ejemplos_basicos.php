<?php
// ejemplo_basicos.php
require_once "bootstrap.php";
require_once 'src/Entity/Equipo.php';
// buscar por clave primaria
$eq = $entityManager->find("Equipo", 1);
// mostrar datos
echo "Número de socios para el ID 1: ".$eq->getSocios();
// cambiar el número de socios
$eq->setSocios(70000);
$entityManager->flush();
// si el equipo no existe devuelve null
$eq = $entityManager->find("Equipo", 4);
if(!$eq){
	echo "Equipo no encontrado";
}