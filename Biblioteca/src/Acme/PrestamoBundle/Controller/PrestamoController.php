<?php

namespace Acme\PrestamoBundle\Controller;

use Acme\PrestamoBundle\Entity\Prestamo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PrestamoController extends Controller
{
    public function nuevoPrestamoAction(Request $request)
    {
        date_default_timezone_set('UTC');
        $hoy = date("Y-m-d");

    	$em = $this->getDoctrine()->getEntityManager();
    	$rut = $request->get('RUN_p');
    	$codLote = $request->get('CodLote_p');
    	$fecha = $request->get('Fecha');
    	if($rut){
    		$lector = $em->getRepository('LectorBundle:Lector')->find($rut);
    		$admin = $em->getRepository('AdministradorBundle:Administrador')->find('admin');
    		$diario = $em->getRepository('DiarioBundle:Diario')->find($codLote);
    		$prestamo = new Prestamo();
    		$prestamo->setAdministrador($admin);
    		$prestamo->setDiario($diario);
    		$prestamo->setLector($lector);
    		$prestamo->setFechaPrestamo($fecha);

    		$em = $this->getDoctrine()->getManager();
		    $em->persist($prestamo);
		    $em->flush();

            return $this->render('PrestamoBundle:Default:nuevoPrestamo.html.twig', array(
                'prestamo' => $prestamo, 
                'hoy' => $hoy
            ));
    	}

        return $this->render('PrestamoBundle:Default:registroPrestamo.html.twig', 
            array('hoy' => $hoy)
        );
    }
}
