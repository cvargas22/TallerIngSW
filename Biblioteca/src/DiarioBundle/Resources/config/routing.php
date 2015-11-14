<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('registroLote', new Route('/registroLote', array(
    '_controller' => 'DiarioBundle:Diario:registroLote',
)));
$collection->add('buscarLote', new Route('/buscarLote', array(
    '_controller' => 'DiarioBundle:Diario:buscarLote',
)));
return $collection;
