<?php

namespace ProjectBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use ProjectBundle\Entity\Car;
use ProjectBundle\Form\CarType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
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

    public function addAction(Request $request): ?Response
    {


        $car = new Car();

        $form = $this->createForm(CarType::class,$car);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $car = $form->getData();

             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($car);
             $entityManager->flush();

            return $this->redirectToRoute('index_page');
        }


        return $this->render('@Project/Car/add.html.twig', [
            'form' => $form->createView(),
        ]);


    }
}
