<?php
namespace src\controllers;
use src\models\Article;
use src\models\Users;
use src\exceptions\NotFoundException;
use src\exceptions\InvalidArgumentException;
use src\exceptions\UnauthorizedException;

class ArticlesController extends Controller{
    public function index(){
        $articles = Article::findAll();
        $this->view->renderHtml('articles/index.php', ['articles' => $articles]);
    }
    public function view($id){
        $article = Article::getById($id);
        if($article !== null){
            $this->view->renderHtml('articles/view.php', ['article' => $article]);
        }else{
           throw new NotFoundException();
        }
    }
    public function edit($id){
        $article = Article::getById($id);
        if($article === null){
            throw new NotFoundException();
        }
        if($this->user === null){
            throw new UnauthorizedException();
        }
        if(!empty($_POST)){
            try {
                $article->updateFromArray($_POST, $_FILES['img']);
                header("Location: /Tokarev.log/article/{$article->getId()}");
                exit;
            } catch (InvalidArgumentException $e){
                $this->view->renderHtml('users/add.php', ['error' => $e->getMessage()]);
                return;
            }
        }
        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }
    public function add(): void{
        if($this->user === null){
            throw new UnauthorizedException();
        }
        if(!empty($_POST)){
            try {
                $article = Article::create($_POST, $this->user, $_FILES['img']);
                header("Location: /Tokarev.log/article/{$article->getId()}");
                exit;
            } catch (InvalidArgumentException $e){
                $this->view->renderHtml('users/add.php', ['error' => $e->getMessage()]);
                return;
            }
        }
        $this->view->renderHtml('articles/add.php');
    }
    public function delete($id){
        $article = Article::getById($id);
        if($article === null){
            throw new NotFoundException();
        }
        if($this->user === null){
            throw new UnauthorizedException();
        }
        $article->delete();
        header("Location: /Tokarev.log/articles");
        exit;
    }
    public function search(){
        if(empty($_GET['q'])){
        $this->view->renderHtml('articles/search.php');
        } else{
            $articles = Article::searchByName($_GET['q']);
            $this->view->renderHtml('articles/search.php', $articles);
        }
    }
}