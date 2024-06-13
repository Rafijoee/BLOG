<header style="position: fixed; top: 0; width: 100%; z-index: 1000;">
    <nav class="relative w-full z-20 top-0 left-0 bg-black border-gray-200 px-2 sm:px-4 rounded dark:border-gray-200 dark:bg-white m-0 mb-5 navbar-solid-bg">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="<?= urlpath('back') ?>" class="flex items-center rtl:space-x-reverse">
                <img src="<?= urlpath('images/logo.png') ?>" alt="Logo" style="height: 50px;" />
                <p class="pl-1"></p>
            </a>
            <div class="flex md:order-2 space-x-3 rtl:space-x-reverse">
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul class="flex font-medium text-white space-x-8 items-center text-sm">
                    <li>
                        <a href="<?= urlpath('back') ?>" class="block py-0 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-white md:dark:text-blue-500 custom-hover" aria-current="page">Blog</a>
                    </li>
                    <li>
                        <a href="<?= urlpath('my-blog') ?>" class="block py-0 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-white md:dark:text-blue-500 custom-hover" aria-current="page">My Blogs</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="pt-32 px-20 bulet">
        <?php
        foreach ($blogs as $blog) {
        ?>
            <div class="container p-4 bg-white border border-show rounded-lg mt-4">
                <a href="<?= urlpath('blog?slug=' . $blog['slug']) ?>" class="flex flex-row w-full h-auto min-h-24">
                    <div class="flex flex-row bg-tua">
                        <!-- Bagian Kiri -->
                        <div class="w-40 p-4 flex justify-center items-center">
                            <img src="<?= urlpath('assets/images/' . $blog['gambar']) ?>" alt="" class="w-20 h-20 rounded-sm">
                        </div>

                        <!-- Bagian Tengah -->
                        <div class="w-full flex flex-col justify-center bg-muda">
                            <div class="p-4">
                                <?= $blog['judul'] ?>
                            </div>
                            <div class="p-4">
                                <?= $blog['created_at'] ?>
                            </div>
                        </div>

                        <!-- Bagian Kanan -->
                        <div class="w-44 flex flex-col items-center justify-center p-4 bg-tua rounded-lg shadow-md">
                            <div class="flex flex-row items-center h-10 mb-4 ml-4">
                                <p class="mx-4"><?= $users[$blog['penulis'] - 1]['username'] ?></p>
                                <img src="<?= urlpath('images/auth.png') ?>" alt="" class="w-10 h-10 rounded-full">
                            </div>
                            <div class="flex flex-row space-x-4 mr-6">
                                <a href="<?= urlpath('dashboard-writer/edit?slug=' . $blog['slug']) ?>" class="text-blue-500 hover:text-blue-700"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="<?= urlpath('dashboard-writer/delete?id=' . $blog['id']) ?>" class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        <?php } ?>
    </div>
</main>




<?php include 'resources/views/master/master.php'; ?>