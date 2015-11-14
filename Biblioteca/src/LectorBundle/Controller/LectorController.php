<?php

// src/LectorBundle/Controller/LectorController.php
namespace LectorBundle\Controller;
 

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
 
class LectorController extends Controller
{
    public function registroLectorAction()
    {
        return $this->render('LectorBundle:Default:registroLector.html.twig');
    }

}