<?php

namespace Super\BlogBundle\Solid\Persister;

interface Persister
{
    public function persist($data);

    public function flush();
}
