<?php

namespace Acme\PrestamoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PrestamoBundle:Default:index.html.twig', array('name' => $name));
    }
}
