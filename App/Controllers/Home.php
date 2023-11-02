<?php

namespace App\Controllers;

class Home extends \Core\Controller {

    public function before()
    {
        echo '(before) ';
    }

    public function after()
    {
        echo ' (after)';
    }

    public function indexAction()
    {
        echo 'This is Home';
    }


}