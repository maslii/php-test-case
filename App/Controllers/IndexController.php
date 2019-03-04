<?php

namespace App\Controllers;

class IndexController extends \Core\Controller
{
    public function index()
    {
        $this->view->render(
            [
                'user/index'
            ],
            'Home'
        );
    }
}