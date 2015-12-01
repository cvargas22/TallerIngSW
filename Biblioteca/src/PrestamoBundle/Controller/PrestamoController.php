<?php

namespace PrestamoBundle\Controller;

use PrestamoBundle\Entity\Prestamo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PrestamoController extends Controller
{
    public function nuevoPrestamoAction(Request $request)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$rut = $request->get('RUN');
    	$codLote = $request->get('CodLote');
    	$fecha = $request->get('Fecha');
    	$estado = True;
    	if($rut){
    		$lector = $em->getRepository('LectorBundle:Lector')->find($rut);
    		$admin = $em->getRepository('AdministradorBundle:Administrador')->find('admin');
    		$diario = $em->getRepository('DiarioBundle:Diario')->find($codLote);
    		$prestamo = new Prestamo();
    		$prestamo->setAdministrador($admin);
    		$prestamo->setDiario($diario);
    		$prestamo->setLector($lector);
    		$prestamo->setEstado($estado);
    		$prestamo->setFechaPrestamo($fecha);

    		$em = $this->getDoctrine()->getManager();
		    $em->persist($prestamo);
		    $em->flush();

            return $this->render('PrestamoBundle:Default:nuevoPrestamo.html.twig', 
            array('prestamo' => $prestamo)
            );
    	}

        return $this->render('PrestamoBundle:Default:registroPrestamo.html.twig');
    }
}
