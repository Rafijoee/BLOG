<header style="position: fixed; top: 0; width: 100%; z-index: 1000;">
    <nav class="relative w-full z-20 top-0 left-0 bg-black border-gray-200 px-2 sm:px-4 rounded dark:border-gray-200 dark:bg-white m-0 mb-5 navbar-solid-bg">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center rtl:space-x-reverse">
                <img src="<?= urlpath('images/logo.png') ?>" alt="Logo" style="height: 50px;" />
                <p class="pl-1"></p>
            </a>
            <div class="flex md:order-2 space-x-3 rtl:space-x-reverse">
                <a href="<?= urlpath('login') ?>" type="button" class="text-white bulet bg-muda hover:text-white hover:bg-[#686868] focus:ring-4 font-medium rounded-lg text-sm px-6 py-2 text-center hover-button justify-center items-center">Keluar</a>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul class="flex font-medium text-white space-x-8 items-center text-sm">
                    <li>
                        <a href="#" class="block py-0 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-white md:dark:text-blue-500 custom-hover" aria-current="page">Blog</a>
                    </li>
                    <li>
                        <a href="#" class="block p-0 px-3 custom-hover md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Sports</a>
                    </li>
                    <li>
                        <a href="#" class="block p-0 px-3 md:p-0 text-white custom-hover rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Foods</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body class="bg-black">
    <main class="flex items-center justify-center min-h-screen my-24">
        <div class="bg-white shadow-md rounded-lg p-10 w-full max-w-3xl">
            <h1 class="text-4xl text-center font-bold mb-8 text-tua">Buat Postingan Untuk Blog Anda!</h1>
            <form action="<?= urlpath('dashboard-writer/create') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-6">
                    <label for="judul" class="block text-sm font-medium text-muda">Judul Resep Anda:</label>
                    <input type="text" name="judul" id="judul" placeholder="Judul Anda..." required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-6">
                    <label for="slug" class="block text-sm font-medium text-muda">Slug</label>
                    <input type="text" name="slug" id="slug" placeholder="judul-anda" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-6">
                    <label for="category" class="block text-sm font-medium text-muda">Kategori</label>
                    <select name="category_id" id="kategori" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category['id'] ?>"><?= $category['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-6">
                <label for="isi" class="block text-sm font-medium text-gray-300">Isi Postingan</label>
                    <input type="hidden" name="isi" id="isi">
                    <textarea input="isi" class="mt-1 w-full border rounded-md text-white trix-editor"></textarea>
                </div>
                <div class="mb-6">
                    <label for="gambar" class="block text-sm font-medium text-muda">Gambar</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="gambar" name="gambar" type="file">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-muda bulet text-white rounded-lg shadow-md hover-button focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">Buat Postingan</button>
                </div>
            </form>
        </div>
    </main>

<?php include 'resources/views/master/master.php'; ?>