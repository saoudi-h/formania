<?php


namespace Formania\App;

use Formania\Controllers;
use Formania\Controllers\ErrorController;

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => []
    ];

    /**
     * add get route
     * @param string $url
     * @param string $controller
     */
    public function get($url, $controller)
    {
        $this->routes['GET'][$url] = $controller;
    }

    /**
     * add post route
     * @param string $url
     * @param string $controller
     */
    public function post($url, $controller)
    {
        $this->routes['POST'][$url] = $controller;
    }

    /**
     * add put route
     * @param string $url
     * @param string $controller
     */
    public function put($url, $controller)
    {
        $this->routes['PUT'][$url] = $controller;
    }



    /**
     * add delete route
     * @param string $url
     * @param string $controller
     */
    public function delete($url, $controller)
    {
        $this->routes['DELETE'][$url] = $controller;
    }


    public function handleRequest($method, $url)
    {
        $segments = explode('/', trim($url, '/'));

        $segments[0] = '/' . $segments[0];
        $numSegments = count($segments);


        $slug = '';
        // Vérifier si l'URL correspond à une route avec un seul mot de demande
        if ($numSegments === 1 && isset($this->routes[$method][$segments[0]])) {
            $controller = $this->routes[$method][$segments[0]];
        }

        // Vérifier si l'URL correspond à une route avec deux mots service + slug
        else if ($numSegments === 2 && isset($this->routes[$method][$segments[0] . '/{slug}'])) {

            $controller = $this->routes[$method][$segments[0] . '/{slug}'];
            $slug = $segments[1];
        }

        else {
            $controller = $this->routes['GET']['/404'];
        }
        $this->callControllerMethod($controller, $slug);
    }


    public function callControllerMethod($controller, $slug = '')
    {
        $parts = explode('@', $controller);
        $controllerName = $parts[0];
        $methodName = $parts[1];


        // $controllerClassName = 'Formania\\Controllers\\'.$controllerName;
        // class_alias($controllerClassName, 'AliasController');


        require '../controllers/' . $controllerName . '.php';
        // $controllerAliassed = new $controllerName();
        $controllerClassName = "\\Formania\\Controllers\\" . $controllerName;

        if (class_exists($controllerClassName)) {
            $controllerInstance = new $controllerClassName();

            if (method_exists($controllerInstance, $methodName)) {

                $params = [$slug];
                call_user_func_array([$controllerInstance, $methodName], $params);
            } else {
                $this->showError("Method not found");
            }
        } else {
            $this->showError("Controller not found");
        }
    }


    private function showError($message)
    {

        require '../controllers/ErrorController.php';
        $errorController = new ErrorController();
        call_user_func_array([$errorController, 'show'], [$message]);
    }
}
