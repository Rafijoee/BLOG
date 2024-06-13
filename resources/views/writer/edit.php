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



<div class="mt-20 mx-20 pt-10 bg-white bulet">
    <p class="text-4xl font-bold text-center"> Edit Blogs</p>
    <hr class="border-2 mt-2 bg-black">
    <div class="container mt-6 flex flex-col mx-auto gap-6 px-4 py-8">
        <form action="<?= urlpath('dashboard-writer/edit') ?>" method="post" enctype="multipart/form-data">
            <div class="flex flex-col gap-4">
                <label for="gambar" class="text-center text-2xl font-bold">Gambar</label>
                <input type="hidden" name="oldGambar" id="oldGambar" value="<?= $blog[0]['gambar'] ?>">
                <?php if ($blog[0]['gambar']) { ?>
                    <div class="flex justify-center">
                        <img src="<?= urlpath('assets/images/' . $blog[0]['gambar']) ?>" id="frame" class="flex self-center rounded-lg gambar-h shadow-md shadow-gray-700  object-cover">
                    </div>
                <?php } ?>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="file" name="gambar" id="gambar" onchange="preview()">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="judul" id="judul" placeholder="judul anda" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $blog[0]['judul'] ?>" required>
                </div>
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="hidden" name="oldSlug" id="oldSlug" placeholder="judul-anda" value="<?= $blog[0]['slug'] ?>">
                    <input type="text" name="slug" id="slug" placeholder="judul-anda" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $blog[0]['slug'] ?>" required>
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="category_id" id="kategori" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                        <?php foreach ($categorys as $category) { ?>
                            <option value="<?= $category['id'] ?>" <?php if ($category['id'] == $blog[0]['category_id']) {
                                                                        echo 'selected';
                                                                    } ?>><?= $category['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="isi" class="block text-sm font-medium text-gray-700">Isi Blog</label>
                    <input type="hidden" name="isi" id="isi" value="<?= $blog[0]['isi'] ?>">
                    <?php $cleanText = html_entity_decode($blog[0]['isi']);
                    $cleanText = strip_tags($cleanText) ?>
                    <trix-editor input="isi" class="mt-1 p-2 w-full border border-gray-300 rounded-md"><?= $cleanText ?></trix-editor>
                    <!-- <textarea id="ingredients" name="ingredients" rows="2"  required></textarea> -->
                </div>
                <button type="submit" class="py-2 hover-button px-4 bg-muda custom-hover text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                    Perbarui Blog
                </button>
            </div>
        </form>
    </div>
</div>

<?php include 'resources/views/master/master.php'; ?>