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

        $this->controllerExists($routeInfo['controller']);
        $this->actionExists($routeInfo['controller'], $routeInfo['action']);

        $controller = new $routeInfo['controller']();

        if(!is_null($routeInfo['model'])){
            $model = new $routeInfo['model'];
            $model->setDb($this->db);
            $controller->setModel($model);
        }

        $action = (string) $routeInfo['action'];

        $controller->$action($this->request);
    }
}
