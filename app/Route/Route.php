<?php

namespace RR\Route;

class Route 
{
    public $route = array();

    public function __call($method, $args) 
    {
        if (is_callable($this, $method)) {
            return call_user_func_array($this->$method, $args);
        }
        return false;
    }

    public function addRoute($path, $function)
    {
        if (! is_string($path)) {
            return false;
        }

        if (! is_callable($function)) {
            return false;
        }

        $this->route[$path] = $function;
        return true;
    }

    public function loadRoute($path)
    {
        if (! is_string($path)) {
            return false;
        }

        if ($this->isRoute($path)) {
            return $this->route[$path]();
        } else {
            echo 'Error 404';
        }

        return true;
    }

    private function isRoute($method)
    {
        if (array_key_exists($method, $this->route)) {
            return true;
        }
            
        return false;        
    }
}