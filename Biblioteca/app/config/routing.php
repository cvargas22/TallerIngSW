<?php

// app/config/routing.php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
 
$collection = new RouteCollection();
$collection->addCollection(
    $loader->import('@LoginBundle/Resources/config/routing.php'),
    '/'
);
$collection->addCollection(
    $loader->import('@LectorBundle/Resources/config/routing.php'),
    '/'
);
$collection->addCollection(
    $loader->import('@DiarioBundle/Resources/config/routing.php'),
    '/'
);
$collection->addCollection(
    $loader->import('@AdministradorBundle/Resources/config/routing.php'),
    '/'
);
$collection->addCollection(
    $loader->import('@PrestamoBundle/Resources/config/routing.php'),
    '/'
);
 
return $collection;