    <?php

    include_once 'models/users.php';
    include_once 'models/blogs.php';
    include_once 'function/main.php';
    include_once 'app/config/static.php';


    class AdminController
    {
        static function index()
        {
            $user = $_SESSION['user'];
            $user_role = $user['role_id'];
            if ($user_role == '1') {
                view('admin/dashboard', ['url' => 'dashboard-admin', 'blog' => Blog::select($_SESSION['user']['id']), 'users' => User::select($_SESSION['user']['id'])]);
            } else {
                header('location: restricted');
            }
        }
        static function laporan()
        {
            $user = $_SESSION['user'];
            $user_role = $user['role_id'];
            if ($user_role == '1') {
                $blogs = Blog::select($_SESSION['user']['id']);
                $users = User::select($_SESSION['user']['id']);

                // Menghitung jumlah blog per kategori
                $kategori1 = array_filter($blogs, fn ($blog) => $blog['category_id'] == 1);
                $kategori2 = array_filter($blogs, fn ($blog) => $blog['category_id'] == 2);
                $kategori3 = array_filter($blogs, fn ($blog) => $blog['category_id'] == 3);
                $kategori4 = array_filter($blogs, fn ($blog) => $blog['category_id'] == 4);
                $kategori5 = array_filter($blogs, fn ($blog) => $blog['category_id'] == 5);

                // Menghitung jumlah blog per hari

                // Menghitung jumlah blog per hari
                $dailyCounts = [];
                foreach ($blogs as $blog) {
                    $date = date('Y-m-d', strtotime($blog['created_at']));
                    if (!isset($dailyCounts[$date])) {
                        $dailyCounts[$date] = 0;
                    }
                    $dailyCounts[$date]++;
                }

                view('admin/laporan', [
                    'url' => 'dashboard-admin/laporan',
                    'blogs' => $blogs,
                    'users' => $users,
                    'kategori1' => $kategori1,
                    'kategori2' => $kategori2,
                    'kategori3' => $kategori3,
                    'kategori4' => $kategori4,
                    'kategori5' => $kategori5,
                    'dailyCounts' => $dailyCounts
                ]);
            } else {
                header('location: restricted');
            }
        }
    }
