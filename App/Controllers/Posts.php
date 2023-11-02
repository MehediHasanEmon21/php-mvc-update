<?php

namespace App\Controllers;

class Posts extends  \Core\Controller {

    public function indexAction()
    {
        echo 'Post Index';
    }

    public function addNewAction()
    {
        echo 'Post AddNew';
    }

    public function editAction()
    {
        echo 'Post Edit';
        var_dump($this->route_params);
    }

}