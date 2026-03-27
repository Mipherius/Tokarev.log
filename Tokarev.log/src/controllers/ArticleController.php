<?php
namespace src\controllers;
use src\models\Article;

class ArticleController extends ControllerFather{
    public function index(): void{
        $articles = Article::findAll();
        $this->view->renderHtml("articles/index.php", ['articles' => $articles]);
    }
    public function view($id): void{
        $article = Article::getById($id);
        if($article !== null){
            $this->view->renderHtml("articles/view.php", ['article' => $article]);
        } else{
            $this->view->renderHtml("errors/404.php", [], 404);
        }
    }
    public function edit($id): void{
        $article = Article::getById($id);
        if(!empty($_POST)){
            $article->updateFromArray($_POST);
        }
        if($article === null){
            $this->view->renderHtml("errors/404.php", [], 404);
        } else{
            $this->view->renderHtml("articles/edit.php", ['article' => $article]);
        }
    }
    public function create(): void{
        $article = new Article();
        $article->setAutorId(2);
        $article->setName('Новая статья');
        $article->setText('Новый текст');
        $article->save();
    }
    public function delete($id): void{
        
    }
}