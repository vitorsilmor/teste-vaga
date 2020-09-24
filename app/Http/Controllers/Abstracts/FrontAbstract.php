<?php 

namespace App\Http\Controllers\Abstracts;

use App\Http\Controllers\Contracts\IFrontController;
use App\Http\Request;
use App\Http\Route;

abstract class FrontAbstract implements IFrontController
{
    /**
     * Rotas do sistema
     *
     * @var Route
     */
    protected Route $routes;

    /**
     * Request atual.
     *
     * @var Request
     */
    protected Request $request;

    public function __construct()
    {
        $request = new Request();

        $request->setUri($_SERVER['REQUEST_URI']);
        $request->setMethod($_SERVER['REQUEST_METHOD']);
        $request->setData(['teste' => 'teste', 'teste2' => 'teste3']);

        $this->request = $request;
    }

    /**
     * Seta as rotas dentro do frontcontroller.
     *
     * @param Route $routes
     * @return IFrontController
     */
    public function setRoutes(Route $routes): IFrontController
    {
        $this->routes = $routes;

        return $this;
    }

    /**
     * Retorna a rota para a URI solicitada.
     *
     * @return array
     */
    protected function getRoute(): array
    {
        $method = $this->request->getMethod();
        
        foreach($this->routes->getRoutes($method) as $route){
            if($route['uri'] == $this->request->getUri()){
               
                $route['controller'] = getenv('path_controller') . $route['controller'];
                return $route;
            }
        }

        throw new \Exception("Esta rota não existe", 1);
    }

    /**
     * Verifica se o controller existe.
     *
     * @param string $controller
     * @return void
     */
    protected function controllerExists(string $controller)
    {
        if(!class_exists($controller))
            throw new \Exception("O controller " . $controller . " não existe.");
    }

    /**
     * Verifica se uma action existe no controller.
     *
     * @param string $controller
     * @param string $action
     * @return void
     */
    protected function actionExists(string $controller, string $action)
    {
        if(!method_exists ($controller, $action))
            throw new \Exception("A action " . $action . " não existe em " . $controller);
    }
}
