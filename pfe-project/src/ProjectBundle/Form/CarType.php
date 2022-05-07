<?php

namespace ProjectBundle\Form;

use Doctrine\ORM\EntityManagerInterface;
use ProjectBundle\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Validator\Constraints\File;

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
            ->add('seat', TextType::class)
            ->add('door', TextType::class)
            ->add('transmission', TextType::class)
            ->add('fuel', TextType::class)
            ->add('air_conditioner', CheckboxType::class)
            ->add('type',EntityType::class,array(
                'class'=>Type::class,
                'choice_label'=>'name',
                'required'=>false

            ))
            ->add('imageName', FileType::class, [
                'label' => 'Image',
                'mapped' => false,
                'required' => false,
                'attr'=>[
                    'class'=>'form-control mb-2'
                ]
            ])
            ->add('save', SubmitType::class, ['label' => 'Valider']);
    }

}