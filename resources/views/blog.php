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
                        <a href="#" class="block p-0 px-3 custom-hover md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Sports</a>
                    </li>
                    <li>
                        <a href="#" class="block p-0 px-3 md:p-0 text-white custom-hover rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Foods</a>
                    </li>
                    <li>
                        <a href="#" class="block p-0 px-3 md:p-0 text-white custom-hover rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">News</a>
                    </li>
                    <li>
                        <a href="#" class="block p-0 px-3 md:p-0 text-white custom-hover rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Future</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>



<div class="mt-40 m-20 pt-20 bg-white bulet">
    <a href="<?= urlpath('back') ?>" class="text-blue-500 absolute top-[14vh]">
        < Kembali</a>
            <div class="container mt-6 flex flex-col mx-auto gap-6 px-4 py-8">
                <div class="flex flex-col gap-4">
                    <header class="px-14">
                        <h1 class="text-4xl font-bold text-black text-center"><?= $blog[0]['judul'] ?></h1>
                        <div class="mt-2 flex flex-col items-start">
                            <p class="text-sm text-black mt-2">Ditulis Oleh: <?= $users[$blog[0]['penulis'] - 1]['username'] ?></p>
                            <p class="text-sm text-black mt-2">Kategori: <?= $category[$blog[0]['category_id'] - 1]['nama'] ?></p>
                            <p class="text-sm text-black mt-2">Tanggal Publikasi: <?= date("l, d F Y\nH:i", strtotime($blog[0]['created_at'])) . ' WIB' ?></p>
                        </div>
                    </header>
                    <img src="<?= urlpath('assets/images/' . $blog[0]['gambar']) ?>" alt="" class="flex self-center rounded-lg gambar-h shadow-md shadow-gray-700  object-cover">
                </div>
                <div class="flex-col flex gap-4">
                    <div class=" text-gray-300 self-center">
                        <div id="alatbahan" class="text-justify w-[90vw] indent-14"><?php
                                                                                    $isi = html_entity_decode($blog[0]['isi']);
                                                                                    ?>
                            <p class="text-black"> <?= strip_tags($isi) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <section class="mt-8 px-14">
                <h2 class="text-2xl font-semibold mb-4">Komentar</h2>
                <form action="" method="POST" class="mb-8">
                    <input type="hidden" id="slug" name="slug" value="<?= $blog[0]['slug'] ?>">
                    <input type="hidden" id="recipe_id" name="recipe_id" value="<?= $blog[0]['id'] ?>">
                    <div class="mb-4">
                        <label for="komen" class="block text-sm font-medium text-gray-700">Berikan Komentar Anda!</label>
                        <textarea id="komen" name="komen" rows="4" class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Komentar Anda..!"></textarea>
                    </div>
                    <button type="submit" class="text-white bg-muda bulet hover-button focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5">Kirim</button>
                </form>

                
                
                <?php
                $commentPost = [];

                foreach ($comments as $comment) {
                    if ($comment['blog_id'] == $blog[0]['id']) {
                        $commentPost[] = $comment;
                    }
                }

                if (count($commentPost) == 0) {
                    echo "<p class='text-gray-500'>Belum ada komentar!</p>";
                } else {
                    foreach ($commentPost as $komen) {
                        $dateString = $komen['created_at'];
                        $date = new DateTime($dateString);
                        $formattedDate = $date->format('l, d-m-Y H:i');
                ?>
                        <div class="my-4 p-4 bg-gray-100 rounded-lg shadow mb-10">
                            <p class="font-semibold"><?= $users[$komen['user_id'] - 1]['username'] ?></p>
                            <p class="text-sm text-gray-500"><?= $formattedDate ?></p>
                            <p class="mt-2"><?= $komen['comment'] ?></p>
                        </div>
                <?php
                    }
                }
                ?>
            </section>



            <?php include 'resources/views/master/master.php'; ?>