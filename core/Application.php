<?php

namespace core;

use core\Router;

class Application
{
    public Router $router;
    public View $view;
    public static $request;



    public function __construct()
    {
        self::$request = new Request();
        $this->router = new Router();
    }



    public function run()
    {
        $this->router->build();
    }




}