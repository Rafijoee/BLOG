<?php

include_once 'models/users.php';
include_once 'models/blogs.php';
include_once 'models/categories.php';
include_once 'models/comments.php';
include_once 'function/main.php';
include_once 'app/config/static.php';


class AuthController {
    static function index(){
        view('auth/landingpage', ['url' => 'index']);
    }
    static function restricted(){
        view('restricted',['url'=> 'restricted']);
    }
    static function blog(){
        view('resep',['url'=> 'resep', 'recipes' => Blog::finds($_GET['slug']), 'category' => Category::select(), 'comments' => Comment::select()]);
    }
    static function comment(){
        if (!isset($_SESSION['user'])) {
            header('Location: login');
        }else{
            $post = array_map('htmlspecialchars', $_POST);
            $comment = Comment::insert(
                $post['recipe_id'],
                $_SESSION['user']['id'],
                $post['komen'],
                date('Y-m-d H:i:s')
            );
            if ($comment) {
                header('Location: resep?slug='.$post['slug']);
                exit();
            }else{
                echo ('Terjadi Kesalahan');
            }
        }
    }
    static function login(){
        view('auth/login', ['url' => 'login']);
    }
    static function register(){
        view('auth/register', ['url' => 'register']);
    }
    static function sessionLogin(){
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::login([
            'email' => $post['email'], 
            'password' => $post['password']
        ]);
        if ($user) {
            unset($user['password']);
            if($user['role_id'] == '1'){
                $_SESSION['user'] = $user;
                header('Location: dashboard-admin');
            }
            elseif($user['role_id'] == '2'){
                $_SESSION['user'] = $user;
                header('Location: dashboard-writer');
            }
            elseif($user['role_id'] == '3'){
                $_SESSION['user'] = $user;
                header('Location: dashboard');
            }
        }
        else {
            header('Location: '.BASEURL.'login?failed=true');
        }
    }
}