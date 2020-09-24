<?php

/**
 * IMPORTA O FRONTCONTROLLER, RESPONSÁVEL POR INICIALIZAR A 
 * APLICAÇÃO.
 */
use App\Http\Controllers\FrontController;

/**
 * INCLUI O AUTOLOAD CONFORME ESPECICAÇÃO DA PSR-4
 */
include "../vendor/autoload.php";


include "../config/env.php";

/**
 * IMPORTA A SETAGEM DE ROTAS.
 */
$routes = include "../config/route.php";


try {
    /**
     * INSTANCIA O FRONTCONTROLLER
     */
    $app = new FrontController();

    /**
     * FAZ A SETAGEM DAS ROTAS NA APLICAÇÃO
     */
    $app->setRoutes($routes);

    $app->start();
} catch (\Throwable $th) {
    echo $th->getMessage();
}
