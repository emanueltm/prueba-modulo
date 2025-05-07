<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Usuario\Login::index');
$routes->get('login', 'Usuario\Login::index');
$routes->post('validar_usuario', 'Usuario\Login::validar_datos');
$routes->get('dashboard', 'Usuario\Dashboard::index');

