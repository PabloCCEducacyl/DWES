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

    public function getLista($nombre_equipo){
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
}