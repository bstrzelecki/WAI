<?php

include "Utility.php";


class Router
{
    protected $ruleset = [];
    protected $default;

    public function __construct()
    {
        $this->default = function () {
        };
    }

    public function bind($method, $path, $callback)
    {
        $this->ruleset[$method][$path] = $callback;
    }

    public function any($callback)
    {
        $this->default = $callback;
    }

    public function getCurrent()
    {
        if (@$this->ruleset[$_SERVER["REQUEST_METHOD"]][Utility::getPath($_SERVER["REQUEST_URI"])] != null) {
            echo call_user_func($this->ruleset[$_SERVER["REQUEST_METHOD"]][Utility::getPath($_SERVER["REQUEST_URI"])] ?? $this->default);
        } else {
            echo call_user_func($this->default);
        }

    }
}