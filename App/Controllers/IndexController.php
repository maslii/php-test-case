<?php

namespace App\Controllers;

use App\Models, Core\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $model = new Models\UserModel($this->database_connection);

        $this->view->renderLayout(
            [
                'index'
            ],
            'Home',
            [
                'users' => $model->getUsers()
            ]
        );
    }
}