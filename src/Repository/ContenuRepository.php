<?php

namespace App\Repository;

use App\Entity\Contenu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contenu[]    findAll()
 * @method Contenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contenu::class);
    }



    /*
    public function findOneBySomeField($value): ?Contenu
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
