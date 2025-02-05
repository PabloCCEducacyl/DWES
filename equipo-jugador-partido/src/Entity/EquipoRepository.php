<?php

use Doctrine\ORM\EntityManager;

require_once 'Equipo.php';
require_once 'Jugador.php';

class EquipoRepository extends \Doctrine\ORM\EntityRepository
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getListaJugadores($nombre_equipo){
        $consulta = $this->entityManager->createQuery(
            "SELECT j FROM jugador j JOIN j.equipo e WHERE e.nombre = :nombre_equipo");
        $consulta->setParameter("nombre_equipo", $nombre_equipo);

        $jugadores = $consulta->getResult();

        if(!empty($jugadores)){
            return $jugadores;
        } else {
            return -1;
        }
    }

    public function getLista(){
        $consulta = $this->entityManager->createQuery("SELECT e FROM equipo e");
        $equipos = $consulta->getResult();

        if(!empty($equipos)){
            return $equipos;
        } else {
            return -1;
        }
    }
}