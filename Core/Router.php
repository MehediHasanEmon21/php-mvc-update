<?php

namespace Core;

class Router {

    protected $routes = [];

    protected $params = [];

    public function add($route, $params = []): void
    {
        // Convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    public function match(string $url): bool
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    public function dispatch(string $url): void
    {   
        $url = $this->removeQueryStringVariables($url);

        if($this->match($url)){

            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = "App\Controllers\\$controller";
            
;            if(class_exists($controller)){
                $controller_object = new $controller($this->params);
                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);
    
                if(is_callable([$controller_object, $action])){
                    $controller_object->$action();
                }else{
                    echo "$action method not exists in $controller";
                }

            }else{
                echo "$controller not exists";
            }

        }else{
            echo 'url not found';
        }
    }

    private function convertToStudlyCaps(string $string): string
    {
        return str_replace(' ','',ucwords(str_replace('-', ' ', $string)));

    }

    private function convertToCamelCase(string $string): string
    {
        return lcfirst($this->convertToStudlyCaps($string));

    }

    private function removeQueryStringVariables(string $url): string
    {   

        if($url != ''){
            $parts = explode('&', $url, 2);
            if(strpos($parts[0], '=') == false ){
                $url = $parts[0];
            }else{
                $url = '';
            }

        }

        return $url;

    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function getParams(): array
    {
        return $this->params;
    }

}