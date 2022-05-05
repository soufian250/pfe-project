<?php

namespace ProjectBundle\ApiRestController;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use ProjectBundle\Entity\Car;
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

}