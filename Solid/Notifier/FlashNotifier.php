<?php

namespace Super\BlogBundle\Solid\Notifier;

use Symfony\Component\HttpFoundation\Session\Session;

class FlashNotifier implements Notifier
{
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function notify($type, $message)
    {
        $this->session->getFlashBag()->add($type, $message);
    }
}
