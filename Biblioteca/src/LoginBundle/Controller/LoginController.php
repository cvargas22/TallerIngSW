<?php

// src/LoginBundle/Controller/LoginController.php
namespace LoginBundle\Controller;
 

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
 
class LoginController extends Controller
{
    public function indexAction(Request $request)
    {
    	$session = $request->getSession();

    	//obtener, si existe, el error producido en el último intento de login
    	if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)){
    		$error = $request->attributes->get(
    			SecurityContext::AUTHENTICATION_ERROR
    		);
    	} else{
    		$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
    		$session->remove(SecurityContext::AUTHENTICATION_ERROR);
    	}

        return $this->render('LoginBundle:Default:index.html.twig', array(
        	'last_username' => $session->get(SecurityContext::LAST_USERNAME),
        	'error'			=> $error
        ));
    }
}