<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('administrador', new Route('/administrador', array(
    '_controller' => 'AdministradorBundle:Administrador:index',
)));
$collection->add('registroAdministrador', new Route('/registroAdministrador', array(
    '_controller' => 'AdministradorBundle:Administrador:registroAdministrador',
)));

return $collection;
