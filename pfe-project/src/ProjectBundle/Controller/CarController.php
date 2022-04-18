<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\Car;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarController extends Controller
{


    public function indexAction()
    {
        return  $this->render('@Project/Default/index.html.twig');
    }

    public function showAction(): ?Response
    {
        return  $this->render('@Project/Car/show.html.twig');
    }

    public function addAction(): ?Response
    {


        return  $this->render('@Project/Car/add.html.twig');
    }
}
