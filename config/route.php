<?php

use App\Http\Route;

$routes = new Route();

$routes->get('/usuarios',                'UsuarioController',   'index',  'Usuario', 'LoginMiddleware');
$routes->get('/usuarios/criar',          'UsuarioController',   'create', 'Usuario', 'LoginMiddleware');
$routes->get('/usuarios/{id}/atualizar', 'UsuarioController',   'update', 'Usuario', 'LoginMiddleware');
$routes->post('/usuarios',               'UsuarioController',   'store',  'Usuario', 'LoginMiddleware');
$routes->put('/usuarios/{id}',           'UsuarioController',   'update', 'Usuario', 'LoginMiddleware');
$routes->delete('/usuarios/{id}',        'UsuarioController',   'delete', 'Usuario', 'LoginMiddleware');

$routes->get('/',       'DashboardController', 'login');
$routes->post('/login', 'DashboardController', 'doLogin', 'Usuario');
$routes->post('/logout','DashboardController', 'logout',  'Usuario', 'LoginMiddleware');

return $routes;