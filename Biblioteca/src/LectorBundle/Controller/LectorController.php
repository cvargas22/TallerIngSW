<?php

// src/LectorBundle/Controller/LectorController.php
namespace LectorBundle\Controller;
 
use LectorBundle\Entity\Lector;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
 
class LectorController extends Controller
{
    public function registroLectorAction(Request $request)
    {
    	$rut = $request->get('RUN');
    	$nombre = $request->get('Nombre');
    	$sexo = $request->get('Sexo');
    	$fnac = $request->get('FechaNac');
    	$direccion = $request->get('Direccion');
    	$telefono = $request->get('Telefono');
    	$eMail = $request->get('eMail');

    	if($rut){
    		$lector = new Lector();
    		$lector->setRut($rut);
    		$lector->setNombre($nombre);
    		$lector->setSexo($sexo);
    		$lector->setFnac($fnac);
    		$lector->setDireccion($direccion);
    		$lector->setTelefono($telefono);
    		$lector->setEmail($eMail);

    		$em = $this->getDoctrine()->getManager();
		    $em->persist($lector);
		    $em->flush();

            return $this->render('LectorBundle:Default:nuevoLector.html.twig', 
            array('lector' => $lector)
            );
    	}

        return $this->render('LectorBundle:Default:registroLector.html.twig');
    }

}