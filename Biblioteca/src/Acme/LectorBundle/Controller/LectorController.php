<?php

// src/LectorBundle/Controller/LectorController.php
namespace Acme\LectorBundle\Controller;
 
use Acme\LectorBundle\Entity\Lector;
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
        $profesion = $request->get('Profesion');
        $institucion = $request->get('Instituto');
    	$telefono = $request->get('Telefono');
    	$eMail = $request->get('eMail');

    	if($rut){
    		$lector = new Lector();
    		$lector->setRut($rut);
    		$lector->setNombre($nombre);
    		$lector->setSexo($sexo);
    		$lector->setFnac($fnac);
    		$lector->setDireccion($direccion);
            $lector->setProfesion($profesion);
            $lector->setInstitucion($institucion);
    		$lector->setTelefono($telefono);
    		$lector->setEmail($eMail);

    		$em = $this->getDoctrine()->getManager();
		    $em->merge($lector);
		    $em->flush();

            return $this->render('LectorBundle:Default:nuevoLector.html.twig', 
            array('lector' => $lector)
            );
    	}

        return $this->render('LectorBundle:Default:registroLector.html.twig');
    }

    public function buscarLectorAction(Request $request){
        $run = $request->get('RUN_b');
        if($run){
            $em = $this->getDoctrine()->getManager();
            $lector = $em->getRepository('LectorBundle:Lector')->find($run);
            if($lector){
                return $this->render('LectorBundle:Default:EncuentraLector.html.twig',
                    array('lector' => $lector)
                );
            }
            else{
                return $this->render('LectorBundle:Default:EncuentraLector.html.twig',
                    array('lector' => "No")
                );
            }
        }
        return $this->render('LectorBundle:Default:buscarLector.html.twig');
    }

}
