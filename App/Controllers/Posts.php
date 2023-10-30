<?php

namespace App\Controllers;

class Posts extends  \Core\Controller {

    public function index()
    {
        echo 'Post Index';
    }

    public function addNew()
    {
        echo 'Post AddNew';
    }

    public function edit()
    {
        echo 'Post Edit';
        var_dump($this->route_params);
    }

}