<?php


abstract class Model
{
    public $parent;

    public function setParam($name, $data)
    {
        $this->parent->view->params[$name] = $data;
    }

    public abstract function init();
}