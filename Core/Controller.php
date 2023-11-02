<?php

namespace Core;

class Controller {

    public $route_params = [];

    public function __call($name, $arguments)
    {
        $method = $name . "Action";

        if(method_exists($this, $method)){

            if($this->before() !== false){
                call_user_func_array([$this, $method], $arguments);
                $this->after();
            }

        }else{
            echo "$method not found";
        }
    }

    public function before()
    {

    }

    public function after()
    {
        
    }

    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

}