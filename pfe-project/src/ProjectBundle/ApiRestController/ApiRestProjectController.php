<?php

namespace ProjectBundle\ApiRestController;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use ProjectBundle\Entity\Car;
use ProjectBundle\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiRestProjectController extends FOSRestController
{

    /**
     * @Rest\Get("/car/delete")
     */

    public function deleteCarAction(Request $request)
    {

        $idCar = $request->query->get('idCar');
        $em=$this->getDoctrine()->getManager();
        $car=$em->getRepository(Car::class)->find($idCar);
        $em->remove($car);
        $em->flush();

        $response = new Response(json_encode(['status'=>'OK']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Rest\Get("/client/delete")
     */

    public function deleteClientAction(Request $request)
    {

        $idClient = $request->query->get('idClient');
        dump($idClient);die;

        $em=$this->getDoctrine()->getManager();
        $client=$em->getRepository(Client::class)->find($idClient);
        $em->remove($client);
        $em->flush();

        $response = new Response(json_encode(['status'=>'OK']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Rest\GET("/reservation/add/date")
     */

    public function addReservationAction(Request $request)
    {


        $form = $request->query->get('from');
        $to = $request->query->get('to');

        dump($form,$to);die;

        $em=$this->getDoctrine()->getManager();
        $client=$em->getRepository(Client::class)->find($idClient);
        $em->remove($client);
        $em->flush();

        $response = new Response(json_encode(['status'=>'OK']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}