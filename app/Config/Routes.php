<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('kategori', 'Kategori::index');
$routes->get('kategori/create', 'Kategori::create');
$routes->post('kategori/store', 'Kategori::store');
$routes->get('kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->post('kategori/update/(:num)', 'Kategori::update/$1');
$routes->get('kategori/delete/(:num)', 'Kategori::delete/$1');

$routes->get('berita', 'Berita::index');
$routes->get('berita/create', 'Berita::create');
$routes->post('berita/store', 'Berita::store');
$routes->get('berita/edit/(:num)', 'Berita::edit/$1');
$routes->post('berita/update/(:num)', 'Berita::update/$1');
$routes->get('berita/delete/(:num)', 'Berita::delete/$1');
