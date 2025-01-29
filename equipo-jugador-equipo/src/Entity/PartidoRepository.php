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

    public function getpA($nombre_equipo){
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
    public function getPartidosLocal($nombre_equipo){
        $consulta = $this->entityManager->createQuery(
            "SELECT p FROM Partido p JOIN p.");
        // $consulta->setParameter("nombre_equipo", $nombre_equipo);

        $partidos = $consulta->getResult();

        if(!empty($partidos)){
            return $partidos;
        } else {
            return -1;
        }
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

    public function getPartidosVisitante($nombre_equipo){
        $consulta = $this->entityManager->createQuery(
            "SELECT p FROM partido p JOIN p.equipovisitante e WHERE e.nombre = :nombre_equipo");
        $consulta->setParameter("nombre_equipo", $nombre_equipo);

        $partidos = $consulta->getResult();

        if(!empty($partidos)){
            return $partidos;
        } else {
            return -1;
        }
    }

    public function getPartidos($nombre_equipo){
        $consulta = $this->entityManager->createQuery(
            "SELECT p FROM partido p JOIN p.equipolocal AND JOING p.equipovisitante e WHERE e.nombre = :nombre_equipo");
        $consulta->setParameter("nombre_equipo", $nombre_equipo);

        $partidos = $consulta->getResult();

        if(!empty($partidos)){
            return $partidos;
        } else {
            return -1;
        }
    }
}