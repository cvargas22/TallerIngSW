<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('estadistica/sexo', new Route('/estadistica/sexo', array(
    '_controller' => 'EstadisticaBundle:Default:sexo',
)));

$collection->add('estadistica/edad', new Route('/estadistica/edad', array(
    '_controller' => 'EstadisticaBundle:Default:edad',
)));

$collection->add('estadistica/fecha', new Route('/estadistica/fecha', array(
    '_controller' => 'EstadisticaBundle:Default:fecha',
)));

return $collection;
