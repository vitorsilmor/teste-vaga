<?php

use App\Http\Route;

$routes = new Route();

$routes->get('/usuarios',                'UsuarioController',   'index',  'Usuario');
$routes->get('/usuarios/criar',          'UsuarioController',   'create', 'Usuario');
$routes->get('/usuarios/{id}/atualizar', 'UsuarioController',   'update', 'Usuario');
$routes->post('/usuarios',               'UsuarioController',   'store');
$routes->put('/usuarios/{id}',           'UsuarioController',   'update');
$routes->delete('/usuarios/{id}',        'UsuarioController',   'delete');

$routes->get('/login',  'DashboardController', 'login',   'Usuario');
$routes->post('/login', 'DashboardController', 'doLogin', 'Usuario');
$routes->post('/logout','DashboardController', 'logout',  'Usuario');

return $routes;