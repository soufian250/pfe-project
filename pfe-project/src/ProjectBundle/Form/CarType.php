<?php

namespace ProjectBundle\Form;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
        $builder ->add('matriclue', TextType::class)
            ->add('name', TextType::class)
            ->add('carimage',FileType::class,[
                'mapped'=> false,
                'required'=>false,
                'label'=> 'upload image please'

            ])
            ->add('save', SubmitType::class, ['label' => 'Valider']);
    }

}