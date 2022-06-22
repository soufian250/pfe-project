<?php

namespace ProjectBundle\ApiRestController;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use ProjectBundle\Entity\Car;
use ProjectBundle\Entity\Client;
use ProjectBundle\Entity\Reservation;
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
        $daysNumber = $request->query->get('daysNumber');

        $dateFrom = new \DateTime($form);
        $dateTo = new \DateTime($to);


        $formTime = $request->query->get('startTime');
        $toTime = $request->query->get('endTime');


        $arrFrom = array_map('intval', explode(':', $formTime));
        $time = mktime($arrFrom[0], $arrFrom[1], 1, date('m'), date('d'), date('Y'));

        $arrTo = array_map('intval', explode(':', $toTime));
        $time2 = mktime($arrTo[0], $arrTo[1], 1, date('m'), date('d'), date('Y'));

        $timeFrom = date("m/d/Y h:i:s A T",$time);
        $timeTo = date("m/d/Y h:i:s A T",$time2);

        $test = new \DateTime($timeFrom);
        $test2 = new \DateTime($timeTo);


        $em=$this->getDoctrine()->getManager();
        $reservation = new Reservation();
        $reservation->setStartDate($dateFrom);
        $reservation->setEndDate($dateTo);
        $reservation->setStartTime($test);
        $reservation->setEndTime($test2);
        $reservation->setDaysNumber(intval($daysNumber));


        $em->persist($reservation);
        $em->flush();

        $response = new Response(json_encode(['status'=>'OK']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}