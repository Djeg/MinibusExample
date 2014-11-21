<?php

namespace Super\BlogBundle\Solid\Notifier;

interface Notifier
{
    public function notify($type, $message);
}
