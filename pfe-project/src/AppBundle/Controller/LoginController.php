<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{

    public function loginAction(Request $request,AuthenticationUtils $authenticationUtils)
    {
        $errors = $authenticationUtils->getLastAuthenticationError();

        $lastUserName = $authenticationUtils->getLastUsername();
        return  $this->render('@App/Login/login.html.twig',[
            'errors'=>$errors,
            'username'=> $lastUserName,
        ]);
    }

}
