<?php

namespace Super\BlogBundle\Terminus;

use Knp\Minibus\Terminus\Terminus;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Knp\Minibus\Minibus;

class RedirectionTerminus implements Terminus
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function terminate(Minibus $minibus, array $configuration = [])
    {
        if (!isset($configuration['route'])) {
            throw new \Exception('Ho noooooooooooooooo !');
        }

        $route = $this->router->generate($configuration['route']);

        return new RedirectResponse($route);
    }
}
