<?php


abstract class View
{
    public $params = [];
    public $parent;

    public function getParam($name)
    {
        return $this->params[$name] ?? "";
    }

    public abstract function render();
}