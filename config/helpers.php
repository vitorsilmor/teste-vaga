<?php

use App\Views\UsuarioView;

/**
 * Helper que renderiza a view.
 *
 * @param string $path
 * @param mixed $data
 * @return void
 */
function view( string $path, $data = null): void
{
    $view = new UsuarioView();
    $view->render($path, $data);
}

/**
 * Helper que retorna a url.
 *
 * @return string
 */
function url(): string
{
    return "http://" . $_SERVER['HTTP_HOST'];
}

/**
 * Helper de redirecionamento.
 *
 * @param string $route
 * @return void
 */
function redirect(?string $route = null)
{
    header('Location: ' . url() . $route);
}