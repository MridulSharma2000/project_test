<?php

class Router
{

    protected $routes = [];


    public static function load($file)
    {
        $routes = new static;

        require $file;

        return $routes;
    }

    public function Define($routes)
    {
        $this->routes = $routes;
    }
    public function Direct($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->callAction(...explode('@', $this->routes[$uri]));
        } else {
            header('location:/Finalproject/pagenotfound');
        }
    }

    protected function callAction($controller, $action)
    {

        $controller = new $controller;

        if (!method_exists($controller, $action)) {

            die('PagesContollers Have Some Issue ');
        }

        return $controller->$action();
    }
}
