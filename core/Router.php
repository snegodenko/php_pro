<?php

namespace core;

class Router
{
    public array $routes;
    public array $route = [];

    public function __construct()
    {
        $this->getRoutes();
        $this->getRoute();;
    }


    public function build(): void
    {
        if($this->route){

            $controller = "app\controllers\\" . ucfirst($this->route['controller']) . 'Controller';
            if(class_exists($controller)){

                $controllerObj = new $controller($this->route);

            } else {
                $this->getErrors("Не існує $controller", 404);
            }


            $action = 'action' . $this->nameAction($this->route['action']);
            if(method_exists($controller, $action)){
                $controllerObj->$action();
            } else {
                $this->getErrors("Не існує метод $action в класі $controller", 404);
            }
        } else {
            $this->getErrors("Не існує такого маршрута!", 404);
        }
    }

    private function getRoutes(): void
    {
        $routes = require CONFIG . '/routes.php';
        $this->routes = $routes;
    }


    private function getRoute(): void
    {
        $url = parse_url($_SERVER['REQUEST_URI'],  PHP_URL_PATH);
        if($url != '/'){
            $url = trim($url, '/');
        }
        foreach ($this->routes as $pattern => $route){

            if(preg_match("#^$pattern$#", $url)){

                $this->route = $route;

                break;
            }
        }

    }


    public function getErrors(string $error, int $code)
    {
        http_response_code($code);
        if(DEBUG === true){
            throw new \Exception($error, 404);
        } else {
            $this->route = ['controller' => 'Controller', 'action' => '404'];
            (new Controller($this->route))->action404();
        }

    }

    private function nameAction(string $action): string
    {
       return $str = str_replace(' ', '', ucwords(preg_replace("#\-#", ' ', $action)));
    }



}