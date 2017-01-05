<?php
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    public function testAddRoute()
    {
        $route = new RR\Route\Route();
        $path = '';
        $func = function (){};
        $bool = $route->addRoute($path, $func);

        $this->assertEquals(true, $bool);
    }

    public function testLoadRoute()
    {
        $route = new RR\Route\Route();
        $path = array();
        $bool = $route->loadRoute($path);

        $this->assertEquals(true, $bool);
    }
}