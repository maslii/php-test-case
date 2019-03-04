<?php

namespace Core;

class Controller
{
    protected $view;
    protected $database_connection;

    public function __construct()
    {
        $this->view = new \Core\View(\App\Config::PATH_VIEWS);
        $this->database_connection = new \Core\AdapterPDO(
            \App\Config::$database['server'],
            \App\Config::$database['host'],
            \App\Config::$database['name'],
            \App\Config::$database['charset'],
            \App\Config::$database['user_name'],
            \App\Config::$database['user_password'],
            \App\Config::$database['options']
        );
    }
}