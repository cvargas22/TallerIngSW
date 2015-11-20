<?php

// src/LectorBundle/Controller/LectorController.php
namespace DiarioBundle\Controller;
 

use DiarioBundle\Entity\Diario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
 
class DiarioController extends Controller
{
    public function registroLoteAction(Request $request)
    {
    	$codLote = $request->get('CodLote');
    	$fecha = $request->get('Fecha');

    	if($codLote){
    		$diario = new Diario();
    		$diario->setCodigo($codLote);
    		$diario->setFechaIngreso($fecha);

    		$em = $this->getDoctrine()->getManager();
		    $em->persist($diario);
		    $em->flush();

		    echo "Diario creado";
    	}

        return $this->render('DiarioBundle:Default:registroLote.html.twig');
    }

    public function buscarLoteAction()
    {
        return $this->render('DiarioBundle:Default:buscarLote.html.twig');
    }
}