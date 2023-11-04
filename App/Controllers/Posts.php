<?php

namespace App\Controllers;

use App\Models\Post;
use Core\View;

class Posts extends  \Core\Controller {

    public function indexAction()
    {   
        $posts = Post::getAll();
        
        View::renderTemplate('Post/index.html',[
            'posts' => $posts
        ]);
    }

    public function addNewAction()
    {
        echo 'Post AddNew';
    }

    public function editAction()
    {
        var_dump($this->route_params);
    }

}