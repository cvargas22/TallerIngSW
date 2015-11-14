<?php

// src/LectorBundle/Controller/LectorController.php
namespace AdministradorBundle\Controller;
 

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
 
class AdministradorController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdministradorBundle:Default:index.html.twig');
    }

    public function registroAdministradorAction()
    {
        return $this->render('AdministradorBundle:Default:registroAdministrador.html.twig');
    }
}