<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Abstracts\FrontAbstract;

class FrontController extends FrontAbstract
{
    /**
     * Inicializa a aplicação.
     *
     * @return FrontController
     */
    public function start()
    {
      
        $routeInfo  = $this->getRoute();

        $this->executeMiddleware($routeInfo);
        $this->controllerExists($routeInfo['controller']);
        $this->actionExists($routeInfo['controller'], $routeInfo['action']);
        
        $param = $this->getParam();

        $controller = new $routeInfo['controller']();

        $this->insertModelInController($controller, $routeInfo);

        $action = (string) $routeInfo['action'];

        $controller->$action($this->request, $param);
    }
}
