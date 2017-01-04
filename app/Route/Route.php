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
        $this->route[$path] = $function;
    }

    public function isRoute($method)
    {
        if (array_key_exists($method, $this->route)) {
            return true;
        }
            
        return false;        
    }
}