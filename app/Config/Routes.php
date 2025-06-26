<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rutas públicas
$routes->get('/', 'Home::index');
$routes->get('/principal', 'Home::index');
$routes->get('/quienes_somos', 'Home::quienes_somos');
$routes->get('/acercade', 'Home::acerca_de');
// $routes->get('/registro', 'Home::registro');
// $routes->get('/login', 'Home::login');
$routes->get('/contacto', 'Home::contacto');

/*Rutas del Registro de Usuarios */
$routes->get('/registro', 'usuario_controller::create');
$routes->post('/enviar-form', 'usuario_controller::formValidation');

/*Rutas del login */
$routes->get('/login', 'Login_controller::index');
$routes->post('/enviarlogin', 'Login_controller::auth');
$routes->get('/panel', 'Panel_controller::index', ['filter' => 'auth']);
$routes->get('/logout', 'Login_controller::logout');

/*Rutas del Contacto */
$routes->post('/contacto/enviar', 'consulta_controller::enviar');
$routes->get('/contacto', 'Home::contacto'); // vista

/*Rutas CRUD usuario*/
$routes->get('/usuarios', 'usuario_controller::index', ['filter' => 'auth']);
$routes->get('/usuarios/edit/(:num)', 'usuario_controller::edit/$1', ['filter' => 'auth']);
$routes->post('/usuarios/update/(:num)', 'usuario_controller::update/$1', ['filter' => 'auth']);
$routes->get('/usuarios/baja/(:num)', 'usuario_controller::baja/$1', ['filter' => 'auth']);
$routes->get('/usuarios/alta/(:num)', 'usuario_controller::alta/$1', ['filter' => 'auth']);
$routes->get('/usuarios/inactivos', 'usuario_controller::inactivos', ['filter' => 'auth']);

/*Rutas CLIENTE */
$routes->get('/mis-publicaciones', 'Panel_controller::publicaciones', ['filter' => 'auth']);
$routes->get('/mi-perfil', 'Panel_controller::perfil', ['filter' => 'auth']);
$routes->get('/soporte', 'Panel_controller::soporte', ['filter' => 'auth']);

$routes->get('/reportes', 'Panel_controller::reportes', ['filter' => 'auth']);
$routes->get('/configuracion', 'Panel_controller::configuracion', ['filter' => 'auth']);

/*RUTA ADMIN CREAR USUARIO */
$routes->get('usuarios/create', 'usuario_controller::createAdmin', ['filter' => 'auth']);
$routes->post('usuarios/store', 'usuario_controller::storeAdmin', ['filter' => 'auth']);

/*RUTA CONSULTA */
$routes->post('/contacto/enviar', 'consulta_controller::enviar');
