<?php

// src/LectorBundle/Controller/LectorController.php
namespace Acme\AdministradorBundle\Controller;
 
use Acme\AdministradorBundle\Entity\Administrador;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
 
class AdministradorController extends Controller
{

    public function registroAdministradorAction(Request $request) //por el metodo POST al enviar formularios, se envian datos a traves del Request...
    {
    	$nombre = $request->get('Nombre');  //en $nombre se guarda el valor de ´Nombre' que viene del formulario
    	$idadmin = $request->get('Usuario');
    	$pass = $request->get('pass');

    	if($nombre){ //si es que se enviaron datos, se meten en la base de datos
    		$admin = new Administrador();
    		$admin->setNombre($nombre);
    		$admin->setIdadmin($idadmin);

            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($admin);

            //generate password
            $password = $encoder->encodePassword($pass, $admin->getSalt());

            if (!$encoder->isPasswordValid($password, $pass, $admin->getSalt())) {
                throw new \Exception('Falló codificación de contraseña');
            } else {
                $admin->setPass($password);
            }

    		$em = $this->getDoctrine()->getManager();
		    $em->persist($admin);
		    $em->flush();

            return $this->render('AdministradorBundle:Default:nuevoAdministrador.html.twig',   //se le pasa a la vista el nuevo administrador creado, ahí se encarga de mostrar el dato
            array('admin' => $admin)
            );
    	}

        return $this->render('AdministradorBundle:Default:registroAdministrador.html.twig'); //sino se ingresa nada, se muestra la vista para ingresar un nuevo administrador :)
    }
}