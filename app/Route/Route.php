<?php

namespace RR\Route;

class Route 
{
    public $route = array();

    private $name, $path, $args;

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

        $this->namePath($path);

        $this->route[$this->name] = array(
            'path' => $path,
            'function' => $function
        );
        return true;
    }

    private function namePath($path)
    {
        $arr_path = explode('/', $path);

        if (sizeof($arr_path) == 1) {
            if ($arr_path[0] == '') {
                $this->name = '';
                return true;
            }
        }

        for ($i = 0; $i < sizeof($arr_path); $i++) {
            if ($arr_path[$i] != '') {
               $this->name = trim($arr_path[$i], '\\');
               break;
           }
        }
        return true;
    }

    public function loadRoute($path)
    {
        if (! is_string($path)) {
            return false;
        }

        if ($this->isRoute($path)) {
            $this->getArgsFromPath($path);

            if ($this->args != "") {
                return $this->route[$this->name]['function']($this->args);
            } else {
                return $this->route[$this->name]['function']();
            }
        } else {
            redirect('404');
        }

        return true;
    }

    private function isRoute($path)    {
        $this->namePath($path);

        if ($this->name == '') {
            return true;
        }

        if (array_key_exists($path, $this->route)) {
            return true;
        }

        if (preg_match($this->route[$this->name]['path'], $path)) {
            return true;
        }

        return false;        
    }

    private function getArgsFromPath($path)
    {
        $arr_path = explode('/', $path);

        if ($arr_path[0] == "") {
            return false;
        }

        if (sizeof($arr_path) < 2) {
            return false;
        }

        $this->args = array();

        for ($i = 0; $i < sizeof($arr_path); $i++) {
            $this->args[$arr_path[$i]] = $arr_path[$i + 1];
            $i++;
        }

        return true;
    }
}