<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('prestamo', new Route('/nuevoPrestamo', array(
    '_controller' => 'PrestamoBundle:Prestamo:nuevoPrestamo',
)));

return $collection;
