<?php

namespace App\Repository;

use App\Entity\Mascota;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mascota>
 */
class MascotaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mascota::class);
    }


    public function findByLetra($letra): array
{
    return $this->createQueryBuilder('m')
        ->where('m.nombre LIKE :letter')
        ->setParameter('letter', '%' . strtoupper($letra) . '%')
        ->orWhere('m.nombre LIKE :letter_javier')
        ->setParameter('letter_javier', '%' . strtolower($letra) . '%') 
        ->setMaxResults(100)
        ->getQuery()
        ->getResult();
}

//    /**
//     * @return Mascota[] Returns an array of Mascota objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Mascota
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
