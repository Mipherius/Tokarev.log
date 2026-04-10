<?php
namespace src\controllers;
use src\models\User;
use src\exceptions\InvalidArgumentException;
use src\models\UsersAuthService;

class UsersController extends Controller{
    public function signUp(){
        if(!empty($_POST)){
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e){
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }
            if($user instanceof User) {
                $this->view->renderHtml('users/signUpSuccess.php');
                return;
            }
        }
        $this->view->renderHtml('users/signUp.php');
    }
    public function login(){
        if(!empty($_POST)){
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /Tokarev.log/');
                exit();
            } catch (InvalidArgumentException $e){
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }
        $this->view->renderHtml('users/login.php');
    }
    public function logout(){
        setcookie('token', '', -1, '/', '', false, true);
        var_dump($_SERVER);
        header("Location: /Tokarev.log/");
        exit();
    }
    public function index(){
        $users = User::findOpen();
        $this->view->renderHtml('users/index.php', ['users' => $users]);
    }
}