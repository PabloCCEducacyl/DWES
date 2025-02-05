<?php

use Doctrine\ORM\EntityManager;

require_once 'Equipo.php';

class PartidoRepository extends \Doctrine\ORM\EntityRepository
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function getPartidosLocal($nombre_equipo){
        $dql = "SELECT p 
            FROM Partido p 
            JOIN p.equipoLocal el 
            WHERE el.nombre = :nombre";

        $consulta = $this->entityManager->createQuery($dql);
        $consulta->setParameter("nombre", $nombre_equipo);

        $partidos = $consulta->getResult();

        if(!empty($partidos)){
            return $partidos;
        } else {
            return -1;
        }
    }
    public function getPartidosVisitante($nombre_equipo){
        $dql = "SELECT p 
            FROM Partido p 
            JOIN p.equipoVisitante ev 
            WHERE ev.nombre = :nombre";

        $consulta = $this->entityManager->createQuery($dql);
        $consulta->setParameter("nombre", $nombre_equipo);

        $partidos = $consulta->getResult();

        if(!empty($partidos)){
            return $partidos;
        } else {
            return -1;
        }
    }

    public function getPartidos($nombre_equipo){
        $dql = "SELECT p 
            FROM Partido p 
            JOIN p.equipoLocal el 
            JOIN p.equipoVisitante ev 
            WHERE el.nombre = :nombre OR ev.nombre = :nombre";
        $consulta = $this->entityManager->createQuery($dql);
        $consulta->setParameter("nombre", $nombre_equipo);

        $partidos = $consulta->getResult();
        
        if(!empty($partidos)){
            return $partidos;
        } else {
            return -1;
        }
    }
}