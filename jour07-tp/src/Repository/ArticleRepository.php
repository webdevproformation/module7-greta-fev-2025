<?php 

namespace App\Repository ;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArticleRepository extends ServiceEntityRepository{

    public function __construct(ManagerRegistry $manager)
    {
        parent::__construct($manager , Article::class);
    }

}