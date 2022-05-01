<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function indexAction()
    {
        return  $this->render('@Project/Home/index.html.twig');
    }
}
