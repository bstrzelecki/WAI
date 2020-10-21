<?php
require "Views/View.php";
require "Models/Model.php";

class Controller
{
    public $view;
    public $model;

    public function bindModel($model){
        $this->model = $this->get($model);
    }
    public function bindView($view){
        $this->view = $this->get($view);
    }

    public function init(){
        $this->model->init();
        $this->view->render();
    }

    private function get($obj){
        $path = explode('/', $obj);
        $name = $path[count($path)-1];
        $path = $obj.".php";
        if(is_file($path)) {
            require $path;
            $out = new $name();
            $out->parent = $this;
            return $out;
        } else {
            throw new Exception('Can not open view '.$name.' in: '.$path);
        }
    }
}