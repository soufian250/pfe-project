<?php

namespace DataFixtures;



use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserDataFixtures extends AbstractFixture implements ORMFixtureInterface, ContainerAwareInterface , OrderedFixtureInterface {


    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }


    public function load(ObjectManager $manager )
    {

        $user = new \UserBundle\Entity\User();

        $password = 'zineb';

        $user->setSalt(md5(uniqid()));
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        $user->setPassword($encoder->encodePassword($password, $user->getSalt()));


        $user->setUsername('zineb');
        $user->setEmail('zineb@gmail.com');

        $manager->persist($user);
        $manager->flush();

    }

    public function getOrder()
    {
        return 1;
    }
}