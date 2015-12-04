<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('registroLector', new Route('/registroLector', array(
    '_controller' => 'LectorBundle:Lector:registroLector',
)));

$collection->add('buscarLector', new Route('/buscarLector', array(
    '_controller' => 'LectorBundle:Lector:buscarLector',
)));


return $collection;
