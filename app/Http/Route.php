<?php 

namespace App\Http;

class Route 
{
    /**
     * Define as rotas cadastradas.
     *
     * @var array
     */
    protected array $routes = [];

    /**
     * Define as rotas de GET.
     *
     * @param string $uri
     * @param string $controller
     * @param string $action
     * @return Route
     */
    public function get(string $uri, string $controller, string $action) : Route
    {
        $this->routes['get'][] = [
            'uri' => $uri, 'controller' => $controller, 'action' => $action
        ];

        return $this;
    }

    /**
     *  Define as rotas de POST.
     *
     * @param string $uri
     * @param string $controller
     * @param string $action
     * @return Route
     */
    public function post(string $uri, string $controller, string $action) : Route
    {
        $this->routes['post'][] = [
            'uri' => $uri, 'controller' => $controller, 'action' => $action
        ];

        return $this;
    }

    /**
     * Define as rotas de PUT.
     *
     * @param string $uri
     * @param string $controller
     * @param string $action
     * @return Route
     */
    public function put(string $uri, string $controller, string $action) : Route
    {
        $this->routes['put'][] = [
            'uri' => $uri, 'controller' => $controller, 'action' => $action
        ];

        return $this;
    }

    /**
     * Define as rotas de DELETE.
     *
     * @param string $uri
     * @param string $controller
     * @param string $action
     * @return Route
     */
    public function delete(string $uri, string $controller, string $action) : Route
    {
        $this->routes['delete'][] = [
            'uri' => $uri, 'controller' => $controller, 'action' => $action
        ];

        return $this;
    }

    public function getRoutes(?string $method = null)
    {
        if(!is_null($method))
            return $this->routes[strtolower($method)];
            
        return $this->routes;
    }
}