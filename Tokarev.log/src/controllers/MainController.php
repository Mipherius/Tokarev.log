<?php
namespace src\controllers;
use src\services\Db;

class MainController extends ControllerFather{
    public function main(): void{
        $db = Db::getInstance();
        $articles = $db->query('SELECT * FROM `articles`;');
        
        $this->view->renderHtml("main/main.php", ['articles' => $articles]);
    }
    
    public function sayHello($name): void{
        echo "Здравствуй, " . $name;
    }
}

?>