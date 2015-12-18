<?php

// src/LectorBundle/Controller/LectorController.php
namespace Acme\DiarioBundle\Controller;
 

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

            return $this->render('DiarioBundle:Default:nuevoLote.html.twig', 
            array('diario' => $diario)
            );
    	}

        return $this->render('DiarioBundle:Default:registroLote.html.twig'
            );
    }

    public function buscarLoteAction(Request $request)
    {
        $codLote = $request->get('CodLote');
        if($codLote){
            $em = $this->getDoctrine()->getManager();
            $lote = $em->getRepository('DiarioBundle:Diario')->find($codLote);
            if($lote){
                return $this->render('DiarioBundle:Default:EncuentraLote.html.twig',
                    array('lote' => $lote)
                );
            }
            else{
                return $this->render('DiarioBundle:Default:EncuentraLote.html.twig',
                    array('lote' => "No")
                );
            }
        }
        return $this->render('DiarioBundle:Default:buscarLote.html.twig');
    }
}