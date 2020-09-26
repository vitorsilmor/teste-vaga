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

    /**
     * Conexão com o banco de dados.
     *
     * @var \PDO
     */
    protected \PDO $db;

    public function __construct()
    {
        $request = new Request();

        $request->setUri($_SERVER['REQUEST_URI']);
        $request->setMethod($_SERVER['REQUEST_METHOD']);
        $request->setData($_REQUEST);

        $this->request = $request;
    }

    /**
     * Seta a conexão com o banco.
     *
     * @param \PDO $db
     * @return IFrontController
     */
    public function setDb(\PDO $db): IFrontController
    {
        $this->db = $db;

        return $this;
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
        
        $patternSent = $this->parseToUri($this->request->getUri());

        foreach($this->routes->getRoutes($method) as $route){
            if(preg_match($route['pattern'], $patternSent)){
                $this->setPaths($route);
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

    /**
     * Executa o middleware, caso ele exista.
     *
     * @param array $routeInfo
     * @return void
     */
    protected function executeMiddleware(array $routeInfo): void
    {
        if(!is_null($routeInfo['middleware'])){
            $middleware = new $routeInfo['middleware']();
            $middleware->handle();
        }
    }

    /**
     * Insere a model no controller, caso essa exista.
     *
     * @param Controller $controller
     * @param array $routeInfo
     * @return void
     */
    protected function insertModelInController(Controller &$controller, array $routeInfo): void
    {
        if(!is_null($routeInfo['model'])){
            $model = new $routeInfo['model'];
            $model->setDb($this->db);
            $controller->setModel($model);
        }
    }

    /**
     * Retorna uma string com o pattern.
     *
     * @param string $pattern
     * @return string
     */
    private function parseToUri(string $pattern): string
    {
        return implode('/', array_filter(explode('/', $pattern)));
    }

    /**
     * Seta os paths das variáveis de ambiente.
     *
     * @param array $route
     * @return void
     */
    private function setPaths(array &$route): void
    {
        $route['controller'] = getenv('path_controller') . $route['controller'];

        if(!is_null($route['model'])){
            $route['model'] = getenv('path_model') . $route['model'];
        }

        if(!is_null($route['middleware'])){
            $route['middleware'] = getenv('path_middleware') . $route['middleware'];
        }
    }

    /**
     * Retorna o parâmetro do recurso.
     *
     * @return integer|null
     */
    protected function getParam() : ?int
    {
        $pieces = explode("/",$this->request->getUri());
        
        foreach($pieces as $piece){
            if(is_numeric($piece)){
                return $piece;
            }
        }

        return null;
    }
}
