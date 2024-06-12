<?php

include_once 'models/users.php';
include_once 'models/blogs.php';
include_once 'models/categories.php';
include_once 'models/comments.php';
include_once 'function/main.php';
include_once 'app/config/static.php';


class AuthController
{
    static function index()
    {
        view('auth/landingpage', ['url' => 'index', 'blogs' => Blog::select($_SESSION['user']['id'])]);
    }
    static function restricted()
    {
        view('restricted', ['url' => 'restricted']);
    }
    static function blog()
    {
        view('blog', ['url' => 'blog', 'blog' => Blog::finds($_GET['slug']), 'users' => User::select($_SESSION['user']['id']), 'category' => Category::select(), 'comments' => Comment::select()]);
    }
    static function comment()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: login');
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $comment = Comment::insert(
                $post['recipe_id'],
                $_SESSION['user']['id'],
                $post['komen'],
                date('Y-m-d H:i:s')
            );
            if ($comment) {
                header('Location: resep?slug=' . $post['slug']);
                exit();
            } else {
                echo ('Terjadi Kesalahan');
            }
        }
    }
    static function login()
    {
        view('auth/login', ['url' => 'login']);
    }
    static function register()
    {
        view('auth/register', ['url' => 'register']);
    }
    static function sessionLogin()
    {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::login([
            'email' => $post['email'],
            'password' => $post['password']
        ]);
        if ($user) {
            unset($user['password']);
            if ($user['role_id'] == '1') {
                $_SESSION['user'] = $user;
                header('Location: dashboard-admin');
            } elseif ($user['role_id'] == '2') {
                $_SESSION['user'] = $user;
                header('Location: dashboard-writer');
            } elseif ($user['role_id'] == '3') {
                $_SESSION['user'] = $user;
                header('Location: dashboard');
            }
        } else {
            header('Location: ' . BASEURL . 'login?failed=true');
        }
    }
    public static function newRegister()
    {
        $post = array_map('htmlspecialchars', $_POST);
        $requiredFields = ['username', 'password', 'email', 'role_id'];
        foreach ($requiredFields as $field) {
            if (empty(trim($post[$field]))) {
                http_response_code(400);
                echo json_encode(['message' => 'Harap isi semua kolom yang diperlukan!']);
                exit();
            }
        }
        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode(['message' => 'Email tidak valid!']);
            exit();
        }

        try {
            $existingUser = User::findUserByUsernameOrEmail($post['username'], $post['email']);

            if ($existingUser) {
                if ($existingUser['username'] === $post['username']) {
                    throw new Exception('Username already taken');
                }

                if ($existingUser['email'] === $post['email']) {
                    throw new Exception('Email already in use');
                }
            }

            // Hash the password before saving
            $hashedPassword = password_hash($post['password'], PASSWORD_DEFAULT);

            $register = User::register([
                'name' => $post['username'],
                'password' => $hashedPassword,  // Use the hashed password
                'email' => $post['email'],
                'role_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($register) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500); // Internal Server Error
                echo json_encode(['message' => 'Terjadi Kesalahan']);
            }
            exit();
        } catch (Exception $e) {
            http_response_code(400);

            if ($e->getMessage() === 'Username already taken') {
                echo json_encode(['message' => 'Username sudah digunakan. Silahkan gunakan username lainnya!']);
            } elseif ($e->getMessage() === 'Email already in use') {
                echo json_encode(['message' => 'Email sudah digunakan. Silahkan gunakan Email lainnya!']);
            } else {
                echo json_encode(['message' => 'Terjadi kesalahan, mohon coba lagi.']);
            }
            exit();
        }
    }


    static function back()
    {
        $user_role = $_SESSION['user']['role_id'];
        if ($user_role == '2') {
            header('Location:' . BASEURL . 'dashboard-writer');
        } elseif ($user_role == '1') {
            header('Location:' . BASEURL . 'dashboard-admin');
        } elseif ($user_role == '3') {
            header('Location:' . BASEURL . 'dashboard');
        } else {
            header('Location:' . BASEURL . 'index');
        }
    }
    static function logout()
    {
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }
        session_destroy();

        header('Location: index');
        exit();
    }
}
