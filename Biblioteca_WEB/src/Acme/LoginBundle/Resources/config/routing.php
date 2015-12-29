<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('login', new Route('/login', array(
    '_controller' => 'LoginBundle:Login:index',
    //                 bundle:controller:metodo
)));

$collection->add('login_check', new Route('/login_check'));

$collection->add('logout', new Route('/logout', array()));

return $collection;
