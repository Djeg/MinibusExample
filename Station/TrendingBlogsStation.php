<?php

namespace Super\BlogBundle\Station;

use Knp\Minibus\Station;
use Super\BlogBundle\Article\TrendingArticleFinder;
use Knp\Minibus\Minibus;

class TrendingBlogsStation implements Station
{
    private $articleFinder;

    public function __construct(TrendingArticleFinder $articleFinder)
    {
        $this->articleFinder = $articleFinder;
    }

    public function handle(Minibus $minibus, array $configuration = [])
    {
        $minibus->addPassenger('articles', $this->articleFinder->findTrendings());
    }
}
