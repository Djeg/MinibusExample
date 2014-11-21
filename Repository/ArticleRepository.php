<?php

namespace Super\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Super\BlogBundle\Article\TrendingArticleFinder;

class ArticleRepository extends EntityRepository implements TrendingArticleFinder
{
    public function findTrendings()
    {
        return $this
            ->createQueryBuilder('a')
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
}
