<?php

namespace PrestamoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PrestamoController extends Controller
{
    public function nuevoPrestamoAction()
    {
        return $this->render('PrestamoBundle:Default:nuevoPrestamo.html.twig');
    }
}
