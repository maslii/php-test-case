<?php

namespace App\Controllers;

use App\Models;

class IndexController extends \Core\Controller
{
    public function index()
    {
        $model = new Models\UsersModel($this->database_connection);

        $this->view->render(
            [
                'index'
            ],
            'Home',
            [
                'param1' => 'Lorem'
            ]
        );
    }
}