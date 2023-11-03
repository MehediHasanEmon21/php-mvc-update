<?php

namespace App\Controllers;

use Core\View;

class Home extends \Core\Controller {

    public function before()
    {
        
    }

    public function after()
    {
        
    }

    public function indexAction()
    {
        View::render('Home/index.php', [
            'name' => 'Emon',
            'colors' => ['red', 'blue', 'green']
        ]);
    }


}