<?php

namespace App\Repository;

use App\Entity\Recette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recette>
 */
class RecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recette::class);
    }

    /**
     * @return Article[] Returns an array of Article objects
     */
    public function findWithCommentaireBy(string $order): array
    {

        if(!in_array( $order , ["asc", "desc"])){
            $order =  "desc";
        }

        return $this->createQueryBuilder('r')
            ->select('r', 'c')
            ->leftJoin("r.commentaires", "c")
            ->orderBy('r.dt_creation', $order)
            ->getQuery()
            ->getResult()

            // SQL => TABLE  

            // SELECT * FROM
            // recette AS r
            // LEFT JOIN commentaire AS c
            // ON c.recette_id = r.id
            // ORDER BY r.dt_creation ASC
        ;
    }

    //    public function findOneBySomeField($value): ?Article
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
