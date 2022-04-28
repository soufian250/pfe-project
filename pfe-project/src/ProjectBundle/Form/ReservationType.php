<?php

namespace ProjectBundle\Form;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\DependencyInjection\Container;

class ReservationType extends AbstractType
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
        $builder ->add('startDate', DateTimeType::class, [
            'placeholder' => 'Select a value',
        ])
        ->add('endDate', DateTimeType::class, [
            'placeholder' => 'Select a value',
        ])->add('save', SubmitType::class, ['label' => 'Valider']);

    }

}