<?php

namespace Super\BlogBundle\Solid\Persister;

use Doctrine\Common\Persistence\ObjectManager;

class DoctrinePersister implements Persister
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function persist($data)
    {
        $this->manager->persist($data);

        return $this;
    }

    public function flush()
    {
        $this->manager->flush();
    }
}


