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

    public const PATH_CONTROLLERS = __DIR__ . 'Controllers';
    public const PATH_VIEWS = __DIR__ . 'Views';

    public static function setRuntimeParams()
    {
        error_reporting(E_ALL);
        ini_set('log_errors', 1);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        ini_set('default_charset', 'UTF-8');
    }

    public static function errorHandler($level, $message, $file, $line)
    {

        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler(\Throwable $exception)
    {
        if ($exception instanceof \Core\Exceptions\ResourceNotFoundException) {
            http_response_code(404);
            include_once $_SERVER['DOCUMENT_ROOT'] . '/App/Views/error/404.php';
            exit;
        }

        http_response_code(500);
        include_once $_SERVER['DOCUMENT_ROOT'] . '/App/Views/error/500.php';
        exit;
    }
}