<?php

namespace core;

class Controller
{
    public array $route;
    public string $template = 'main';
    public string $dir;

    public function __construct(array $route)
    {
        $this->route = $route;
        $this->dir();
    }

    public function render(string $fileName, array $params = [])
    {
        $view = new View($this);
        $view->include($fileName, $params);
    }


    public function action404()
    {
        $this->dir = 'errors';
        $this->render('404');
    }

    private function dir(): void
    {
        $this->dir = $this->route['controller'];
    }
}