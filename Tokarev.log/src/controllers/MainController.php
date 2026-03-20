<?php
namespace src\controllers;
use src\views\View;

class MainController{
    public $view;
    public $layout =  'default';
    public function __construct(){
        $this->view = new View($this->layout);
    }
    public function main(): void{
        echo "main/main.php";
    }
    public function sayHello($name): void{
        echo "Здравствуй, " . $name;
    }
}

?>