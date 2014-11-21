<?php

namespace Super\BlogBundle\Station;

use Knp\Minibus\Station;
use Super\BlogBundle\Repository\ArticleRepository;
use Knp\Minibus\Minibus;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FetchArticleStation implements Station
{
    private $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(Minibus $minibus, array $configuration = [])
    {
        $article = $this->repository->find($minibus->getRequest()->attributes->get('id', null));

        if (!$article) {
            throw new NotFoundHttpException;
        }

        $minibus->addPassenger('article', $article);
    }
}
