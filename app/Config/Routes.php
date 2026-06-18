<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/kategori', 'Kategori::index');
$routes->get('/kategori/(:segment)', 'Kategori::detail/$1');
