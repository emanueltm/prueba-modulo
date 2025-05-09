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

//Verificacion de permisos para Modulos
$routes->get('modulos', 'Modulos::index');
//Sesion
$routes->get('logout', 'Usuario\Login::logout');

// Modulo 1: Registro de tallas, medidas y hemoglabina en Niñas, niños de escuelas
$routes->get('registrar_alumnos', 'M1\Registrar::index');
$routes->post('escuelas', 'M1\Registrar::obtener_escuelas');
$routes->post('indicar_escuela', 'M1\Registrar::selecionar_escuela');
$routes->post('nuevo_alumno', "M1\Registrar::guardar");
$routes->get('cerrar_grupo', "M1\Registrar::cerrar_grupo");

$routes->get('registros', "M1\Registros::index");
$routes->post('buscar_datos', "M1\Registros::buscar");
$routes->get('generar_reporte', "M1\Registros::generar_reporte");

$routes->get('indicadores_homeglabina', "M1\Indicadores::index"); 

