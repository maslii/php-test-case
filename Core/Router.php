<?php

namespace Core;

use App\Config;

class Router
{
    private $controller_name;
    private $action_name;
    private $action_params;

    public function __construct($uri)
    {
        $controller = null;
        $controller_path = rtrim(\App\Config::PATH_CONTROLLERS, '/\\') . '/';
        $this->splitUri($uri);

        if (class_exists($controller_path . $this->controller_name)) {
            $controller = $controller_path . $this->controller_name;
        } else {
            throw new \Core\Exceptions\ResourceNotFoundException();
        }

        $controller = new $controller();

        if (method_exists($controller, $this->action_name)) {
            \call_user_func_array([$controller, $this->action_name], $this->action_params);
        } else {
            throw new \Core\Exceptions\ResourceNotFoundException();
        }
    }

    private function splitUri($uri)
    {
        $uriArray = trim($uri, '/');
        $uriArray = filter_var($uriArray, FILTER_SANITIZE_URL);
        $uriArray = explode('/', $uriArray);

        $this->controller_name = isset($uriArray[0]) ? $uriArray[0] : 'index';
        $this->action_name = isset($uriArray[1]) ? $uriArray[1] : 'index';
        unset($uriArray[0], $uriArray[1]);

        $this->action_params = array_values($uriArray);

        $this->controller_name = ucfirst($this->controller_name) . 'Controller';
    }
}