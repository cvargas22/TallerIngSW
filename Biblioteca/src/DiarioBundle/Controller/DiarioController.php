<?php

// src/LectorBundle/Controller/LectorController.php
namespace DiarioBundle\Controller;
 

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
 
class DiarioController extends Controller
{
    public function registroLoteAction()
    {
        return $this->render('DiarioBundle:Default:registroLote.html.twig');
    }

    public function buscarLoteAction()
    {
        return $this->render('DiarioBundle:Default:buscarLote.html.twig');
    }
}