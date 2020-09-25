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
     * Seta a conexão com o banco.
     *
     * @param \PDO $db
     * @return IFrontController
     */
    public function setDb(\PDO $db): IFrontController;

    /**
     * Inicializa a aplicação.
     *
     * @return void
     */
    public function start();
}

