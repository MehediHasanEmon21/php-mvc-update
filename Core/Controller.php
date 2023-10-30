<?php

namespace Core;

class Controller {

    public $route_params = [];

    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

}