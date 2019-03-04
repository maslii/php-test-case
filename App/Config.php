<?php

namespace App;

class Config
{
    public static $database = [
        'server' => 'mysql',
        'host' => '127.0.0.1',
        'name' => 'test',
        'charset' => 'utf8',
        'user_name' => 'root',
        'user_password' => '',
        'options' => [
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]
    ];

    public static function setRuntimeParams()
    {
        error_reporting(E_ALL);
        ini_set('log_errors', 1);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        ini_set('default_charset', 'UTF-8');
    }
}