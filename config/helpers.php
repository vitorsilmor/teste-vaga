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

/**
 * Insere na página o verificador de método da requisição.
 *
 * @param string $method
 * @return string
 */
function form_method(string $method): string
{
    return  "<input type='text' class='hidden' name='method' value='{$method}'>";
}


/**
 * Exibe o modal conforme a string.
 *
 * @return void
 */
function call_modal(string $modal,  $data = null): void
{
    view($modal, $data);
}