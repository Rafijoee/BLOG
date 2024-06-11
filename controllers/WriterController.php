<?php

include_once 'models/users.php';
include_once 'function/main.php';
include_once 'app/config/static.php';
include_once 'models/blogs.php';

class WriterController{
    static function index(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if($user_role == '2'){
            view('writer/index', ['url' => 'dashboard-writer']);
        }else{
            header('location: restricted');
        }
    }

    static function show(){
        view('writer/show', ['url' => 'dashboard-writer/show', 'shows' => Blog::show($_SESSION['user']['username']), 'category' => Category::select($_SESSION['user']['id'])]);
    }
    static function create(){
        view('writer/create', ['url' => 'dashboard-writer/create', 'categories' => Category::select($_SESSION['user']['id'])]);
    }

    static function store(){
        if (!isset($_SESSION['user'])) {
            header('Location: login');
        }else{
            $post = array_map('htmlspecialchars', $_POST);
            // var_dump($post);
            // echo "<script>console.log('Debug Objects:  test' );</script>";
            $recipe = Blog::insert(
                $post['judul'],
                $post['slug'],
                $_SESSION['user']['id'],
                $post['isi'],
                $post['gambar'],
                $post['category_id']
            );
            // urlpath('dashboard-writer/show');
            // view('writer/show', ['url' => 'dashboard-writer/show', 'shows' => Recipe::show($_SESSION['user']['username']), 'category' => Category::select($_SESSION['user']['id'])]);
            
            if ($recipe) {
                header('Location:' .BASEURL. 'dashboard-writer/show');
                // header('Location: dashboard-writer/show');
                exit();
            }else{
                echo ('Terjadi Kesalahan');
            }
        }
    }
    static function edit(){
        view('writer/edit', ['url' => 'dashboard-writer/edit', 'blog' => Blog::finds($_GET['slug']), 'users' => User::select($_SESSION['user']['id']), 'categories' => Category::select($_SESSION['user']['id'])]);
    }
    static function update(){
        if (!isset($_SESSION['user'])) {
            header('Location: login');
        }else{
            // var_dump($recipe['slug']);
            $post = array_map('htmlspecialchars', $_POST);
            $recipe = Blog::update(
                $post['judul'],
                $post['slug'],
                $_SESSION['user']['id'],
                $post['isi'],
                $post['gambar'],
                $post['category_id'],
            );
            if ($recipe) {
                header('Location:' .BASEURL. 'dashboard-writer/show');
                exit();
            } else {
                echo ('Terjadi Kesalahan');
            }
        }
    }
    static function delete(){
        $post = array_map('htmlspecialchars', $_POST);
        $id = $_GET['id'];
        $recipe = Blog::destroy($id);
        if ($recipe) {
            header('Location:' .BASEURL. 'dashboard-writer/show');
            exit();
        } else {
            echo ('Terjadi Kesalahan');
        }
    }
}