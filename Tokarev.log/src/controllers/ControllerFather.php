<?php
namespace src\controllers;
use src\views\View;

class ControllerFather{
    public $view;
    public $layout =  'default';
    public function __construct(){
        $this->view = new View($this->layout);
    }
}







