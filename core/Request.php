<?php

namespace core;

class Request
{

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getPath(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function getBody(): array
    {
        return $_REQUEST;
    }

    public function isPost(): bool
    {
        if($this->getMethod() == 'POST') return true;

        return false;    }

    public function post(): mixed
    {
        if(isset($_POST) && $_POST){
            return $_POST;
        }

        return false;
    }


}