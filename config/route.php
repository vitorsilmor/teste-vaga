<?php

use App\Http\Route;

$routes = new Route();

$routes->get('/usuarios',                'UsuarioController',   'index',  'Usuario', 'LoginMiddleware');
$routes->get('/usuarios/(\d)',           'UsuarioController',   'show',  'Usuario', 'LoginMiddleware');
$routes->get('/usuarios/criar',          'UsuarioController',   'create', 'Usuario', 'LoginMiddleware');
$routes->get('/usuarios/(\d)/atualizar', 'UsuarioController',   'update', 'Usuario', 'LoginMiddleware');
$routes->post('/usuarios',               'UsuarioController',   'store',  'Usuario', 'LoginMiddleware');
$routes->put('/usuarios/(\d)',           'UsuarioController',   'update', 'Usuario', 'LoginMiddleware');
$routes->delete('/usuarios/(\d)',        'UsuarioController',   'delete', 'Usuario', 'LoginMiddleware');

$routes->get('/',       'DashboardController', 'login');
$routes->post('/login', 'DashboardController', 'doLogin', 'Usuario');
$routes->post('/logout','DashboardController', 'logout',  'Usuario', 'LoginMiddleware');

return $routes;