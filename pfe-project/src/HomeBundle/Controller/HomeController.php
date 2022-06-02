<?php

namespace HomeBundle\Controller;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Knp\Component\Pager\PaginatorInterface;
//use Nette\Application\Request;
use ProjectBundle\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\QueryBuilder;

class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cars =$em->getRepository('ProjectBundle:Car')->createQueryBuilder('c')->setMaxResults(6)->getQuery()->getResult();
        return  $this->render('@Home/Home/index.html.twig' ,['cars'=>$cars]);
    }

    /**
     * @Route("/store", name="store")
     */
    public function storeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $listeReservations = $em->getRepository('ProjectBundle:Car')->findAll();
        $cars  = $this->get('knp_paginator')->paginate($listeReservations,$request->query->get('page', 1), 6);
        return  $this->render('@Home/Home/store.html.twig',['cars'=>$cars]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {
        return  $this->render('@Home/Home/about.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return  $this->render('@Home/Home/contact.html.twig');
    }
}
