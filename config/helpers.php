<?php

use App\Views\UsuarioView;

function view( string $path, $data = null)
{
    $view = new UsuarioView();
    $view->render($path, $data);
}

function url()
{

    return "http://" . $_SERVER['HTTP_HOST'];
}