<?php

namespace Core;

use App\Config;

class Controller
{
    protected $view;
    protected $database_connection;

    public function __construct()
    {
        $adapter = new AdapterPDO(
            Config::$database['server'],
            Config::$database['host'],
            Config::$database['name'],
            Config::$database['charset'],
            Config::$database['user_name'],
            Config::$database['user_password'],
            Config::$database['options']
        );
        $this->database_connection = $adapter->getConnection();
        $this->view = new View();
    }
}