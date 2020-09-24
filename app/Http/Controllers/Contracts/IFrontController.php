<?php 

namespace App\Http\Controllers\Contracts;

use App\Http\Route;

interface IFrontController
{
    /**
     * Seta as rotas dentro do frontcontroller.
     *
     * @param Route $routes
     * @return IFrontController
     */
    public function setRoutes(Route $routes): IFrontController;

    /**
     * Inicializa a aplicação.
     *
     * @return void
     */
    public function start();
}

