<?php

namespace AppBundle\DataFixtures\LoadUserData;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserDataFixtures implements FixtureInterface, ContainerAwareInterface {

    private $container;

    public function load(ObjectManager $manager)
    {
        dump(767);die;
        $user = new User();

        $user->setUserName('soufian');
        $user->setUserEmail('soufian@gmail.com');
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword('soufian');
        $user->setUserPassword($password);

        $manager->persist($user);
        $manager->flush();

    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}