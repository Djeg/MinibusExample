<?php

namespace Super\BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Routing\Router;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EditArticleType extends AbstractType
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function buildForm(FormBuilderInterface $builder, array $configuration)
    {
        $builder
            ->add('name', 'text')
            ->add('preview', 'text')
            ->add('content', 'textarea')
            ->add('send', 'submit')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults([
                'action' => $this->router->generate('super_blog_create')
            ])
        ;
    }

    public function getName()
    {
        return 'edit_article';
    }
}
