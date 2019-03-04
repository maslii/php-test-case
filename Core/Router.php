<?php

namespace Core;

use App\Config, Core\Exceptions;

class Router
{
    private $controller_name;
    private $action_name;
    private $action_params;

    public function __construct($uri)
    {
        $controller = null;
        $this->splitUri($uri);

        if (class_exists(Config::NAMESPACE_CONTROLLERS . $this->controller_name)) {
            $controller = Config::NAMESPACE_CONTROLLERS . $this->controller_name;
        } else {
            throw new Exceptions\ResourceNotFoundException();
        }

        $controller = new $controller();

        if (method_exists($controller, $this->action_name)) {
            \call_user_func_array([$controller, $this->action_name], $this->action_params);
        } else {
            throw new Exceptions\ResourceNotFoundException();
        }
    }

    private function splitUri($uri)
    {
        $uriArray = trim($uri, '/');
        $uriArray = filter_var($uriArray, FILTER_SANITIZE_URL);
        $uriArray = $uriArray === '' ? [] : explode('/', $uriArray);

        $this->controller_name = isset($uriArray[0]) ? $uriArray[0] : 'index';
        $this->action_name = isset($uriArray[1]) ? $uriArray[1] : 'index';
        unset($uriArray[0], $uriArray[1]);

        $this->action_params = array_values($uriArray);

        $this->controller_name = ucfirst($this->controller_name) . 'Controller';
    }
}