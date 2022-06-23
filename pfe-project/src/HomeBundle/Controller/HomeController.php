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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

use HomeBundle\Entity\Contact;

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
    public function contactAction(Request $request)
    {
        $contact = new Contact;     
     # Add form fields
       $form = $this->createFormBuilder($contact)
       ->add('name', TextType::class, array('label'=> 'name', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
       ->add('email', EmailType::class, array('label'=> 'email','attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
       ->add('subject', TextType::class, array('label'=> 'subject','attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
       ->add('message', TextareaType::class, array('label'=> 'message','attr' => array('rows'=>'10','class' => 'form-control')))
       ->add('Save', SubmitType::class, array('label'=> 'Envoyer', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:15px')))
       ->getForm();
     # Handle form response
       $form->handleRequest($request);

       if($form->isSubmitted() &&  $form->isValid()){
        $name = $form['name']->getData();
        $email = $form['email']->getData();
        $subject = $form['subject']->getData();
        $message = $form['message']->getData(); 
  # set form data   
        $contact->setName($name);
        $contact->setEmail($email);          
        $contact->setSubject($subject);     
        $contact->setMessage($message);                
   # finally add data in database
        $sn = $this->getDoctrine()->getManager();      
        $sn -> persist($contact);
        $sn -> flush();}
        return  $this->render('@Home/Home/contact.html.twig',['form' => $form->createView()]);
    }

}