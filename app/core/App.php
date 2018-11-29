<?php

class App
{
    private $controller = 'Home';
    private $method = 'index';
    private $params = [];

    public function __construct()
    {
        $uri = $this->parseUri();

        if(file_exists('app/controllers/' . ucfirst($uri[0]) . '.php')) {
            $this->controller = ucfirst($uri[0]);
            unset($uri[0]);
        }
        else {
            header('Location: /');
        }

        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();

        if(isset($uri[1]) && method_exists($this->controller, $uri[1])) {
            $this->method = $uri[1];
            unset($uri[1]);
        }

        if (count($uri) > 0) {
            $this->params = !empty($uri) ? array_values($uri) : [];
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUri()
    {
        $parsed = explode('/', $_SERVER['REQUEST_URI']);
        unset($parsed[0]);
        return array_values($parsed);
    }
}
