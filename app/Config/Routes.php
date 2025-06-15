<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/principal', 'Home::index');
$routes->get('/quienes_somos', 'Home::quienes_somos');
$routes->get('/acercade', 'Home::acerca_de');
$routes->get('/registro', 'Home::registro');
$routes->get('/login', 'Home::login');
$routes->get('/contacto', 'Home::contacto');

/*Rutas del Registro de Usuarios */
$routes->get('/registro', 'usuario_controller::create');
$routes->post('/registro', 'usuario_controller::formValidation');

/*Rutas del login */
$routes->get('/login', 'Login_controller');
$routes->post('/enviarlogin', 'Login_controller::auth');
$routes->get('/panel', 'Panel_controller::index',['filter'=>'auth']);
$routes->get('/logout', 'Login_controller::logout');