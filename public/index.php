<?php


/**
 * IMPORTAÇÃO DA CLASSE DE CONEXÃO COM O BANCO DE DADOS.
 */
use App\Connection\Connection;

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

$conn = new Connection();
$db = $conn->connect();

/**
 * Realiza a instancia do FrontController.
 * Faz a setagem de rotas.
 * Faz a setagem da conexão com o banco de dados.
 * Inicializa a aplicação.
 */
try {
   
    $app = new FrontController();

    $app->setRoutes($routes)
        ->setDb($db)
        ->start();

} catch (\Throwable $th) {
    echo $th->getMessage();
}
