<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('login', 'Auth::index');
$routes->get('list-invoice', 'Invoice::index');
$routes->get('list-invoice/tambah', 'Invoice::create');




