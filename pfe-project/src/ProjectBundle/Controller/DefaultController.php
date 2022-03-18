<?php

namespace ProjectBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $response = new Response();
        $response->setContent(json_encode([
            'data' => 123,
        ]));

        return $response;
    }
}
