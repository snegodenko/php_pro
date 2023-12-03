<?php

namespace core;

use core\Router;

class Application
{
    public Router $router;
    public View $view;
    public Request $request;
    public User $user;
    public static $app;



    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router();
        $this->user = new User();
        self::$app = $this;
    }



    public function run()
    {
        $this->router->build();
    }




}