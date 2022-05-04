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

    /**
     * @Route("/store", name="store")
     */
    public function storeAction()
    {
        return  $this->render('@Project/Home/store.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {
        return  $this->render('@Project/Home/about.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return  $this->render('@Project/Home/contact.html.twig');
    }
}
