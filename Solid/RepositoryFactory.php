<?php

namespace Super\BlogBundle\Solid;

use Doctrine\Common\Persistence\ObjectManager;

class RepositoryFactory
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function create($name)
    {
        return $this->manager->getRepository($name);
    }
}
