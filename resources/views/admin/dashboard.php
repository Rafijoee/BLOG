<header style="position: fixed; top: 0; width: 100%; z-index: 1000;">
    <nav class="relative w-full z-20 top-0 left-0 bg-black border-gray-200 px-2 sm:px-4 rounded dark:border-gray-200 dark:bg-white m-0 mb-5 navbar-solid-bg">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="<?= urlpath('back') ?>" class="flex items-center rtl:space-x-reverse">
                <img src="<?= urlpath('images/logo.png') ?>" alt="Logo" style="height: 50px;" />
                <p class="pl-1"></p>
            </a>
            <div class="flex md:order-2 space-x-3 rtl:space-x-reverse">
                <a href="<?= urlpath('logout') ?>" type="button" class="text-white bulet bg-muda hover:text-white hover:bg-[#686868] focus:ring-4 font-medium rounded-lg text-sm px-6 py-2 text-center hover-button justify-center items-center">Log Out</a>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul class="flex font-medium text-white space-x-8 items-center text-sm">
                    <li>
                        <a href="<?= urlpath('back') ?>" class="block py-0 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-white md:dark:text-blue-500 custom-hover" aria-current="page">Blog</a>
                    </li>
                    <li>
                        <a href="<?= urlpath('laporan') ?>" class="block p-0 px-3 md:p-0 text-white custom-hover rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Laporan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php include 'resources/views/master/master.php'; ?>