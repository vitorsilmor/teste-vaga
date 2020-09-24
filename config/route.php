<?php

use App\Http\Route;

$routes = new Route();

$routes->get('/usuarios',                'UsuarioController',   'index');
$routes->get('/usuarios/criar',          'UsuarioController',   'create');
$routes->get('/usuarios/{id}/atualizar', 'UsuarioController',   'update');
$routes->post('/usuarios',               'UsuarioController',   'store');
$routes->put('/usuarios/{id}',           'UsuarioController',   'update');
$routes->delete('/usuarios/{id}',        'UsuarioController',   'delete');

return $routes;