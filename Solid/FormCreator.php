<?php

namespace Super\BlogBundle\Solid;

use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RequestStack;

class FormCreator
{
    private $formFactory;

    private $stack;

    public function __construct(FormFactory $formFactory, RequestStack $stack)
    {
        $this->formFactory = $formFactory;
        $this->stack       = $stack;
    }

    public function create($name, $data = null, array $options = [])
    {
        $request = $this->stack->getCurrentRequest();

        if (null === $request) {
            throw new \RuntimeException('If you wan\'t to create a form with the form creator you need to be in an http scope.');
        }

        $form = $this->formFactory->create($name, $data, $options);

        $form->handleRequest($request);

        return $form;
    }
}
