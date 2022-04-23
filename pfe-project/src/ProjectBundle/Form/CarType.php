<?php

namespace ProjectBundle\Form;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\DependencyInjection\Container;

class CarType extends AbstractType
{
    private $entityManager;
    private $container;


    public function __construct(EntityManagerInterface $entityManager,Container $container)
    {
        $this->entityManager = $entityManager;
        $this->container=$container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('matriclue', SubmitType::class);
    }

}