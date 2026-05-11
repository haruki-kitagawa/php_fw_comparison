<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// http://localhost:8002/products
$routes->get('products', 'Product::index');
