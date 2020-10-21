<?php
include "Router.php";

class Context
{
    public $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function apply(){
        $this->router->getCurrent();
    }
}