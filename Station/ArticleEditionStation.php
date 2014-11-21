<?php

namespace Super\BlogBundle\Station;

use Knp\Minibus\Station;
use Knp\Minibus\Minibus;
use Super\BlogBundle\Entity\Article;
use Super\BlogBundle\Solid\Persister\Persister;
use Super\BlogBundle\Solid\FormCreator;
use Super\BlogBundle\Solid\Notifier\Notifier;

class ArticleEditionStation implements Station
{
    private $creator;

    private $persister;

    private $notifier;

    public function __construct(
        FormCreator $formCreator,
        Persister $persister,
        Notifier $notifier
    ) {
        $this->creator   = $formCreator;
        $this->persister = $persister;
        $this->notifier  = $notifier;
    }

    public function handle(Minibus $minibus, array $configuration = [])
    {
        $article = $minibus->getPassenger('article', new Article);
        $form    = $this->creator->create('edit_article', $article);

        if ($form->isValid()) {
            $this->persister->persist($article)->flush();
            $this->notifier->notify('success', 'You did it well !');
        }

        $minibus->addPassenger('edition_form', $form->createView());
    }
}
