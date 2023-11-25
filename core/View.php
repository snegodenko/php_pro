<?php

namespace core;

class View
{
    private array $route;
    private string $template;
    private string $dir;


    public function __construct(Controller $controller)
    {
        $this->route = $controller->route;
        $this->template = $controller->template;
        $this->dir = $controller->dir;
    }

    public function include(string $fileName, array $params = []): void
    {
        extract($params);

        $view = $this->path($fileName);

        if(file_exists($view)){
            ob_start();
            require $this->path($fileName);
            $content = ob_get_contents();
            ob_end_clean();
        } else {
            throw new \Exception("Не знайдено файл $view");
        }

        $template =  APP . "/views/templates/{$this->template}.php";

        if(file_exists($template)){
            require $template;
        } else {
            throw new \Exception("Не знайдено файл $template");
        }
    }

    private function path($fileName): string
    {
        return APP . '/views/' . $this->dir . "/$fileName.php";
    }
}