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

<div class="container mx-auto mt-20">
    <canvas id="myChart" width="400" height="200"></canvas>
</div>

<?php
$kategori1 = [];
$kategori2 = [];
$kategori3 = [];
$kategori4 = [];
$kategori5 = [];
foreach ($blogs as $blog) {
    if ($blog['category_id'] == 1) {
        $kategori1[] = $blog;
    } elseif ($blog['category_id'] == 2) {
        $kategori2[] = $blog;
    } elseif ($blog['category_id'] == 3) {
        $kategori3[] = $blog;
    } elseif ($blog['category_id'] == 4) {
        $kategori4[] = $blog;
    } elseif ($blog['category_id'] == 5) {
        $kategori5[] = $blog;
    }
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Semua blogs', 'blogs "Sport"', 'blogs "Education"', 'blogs "News"', 'blogs "Fiture"', 'blogs "Lainnya"'],
                datasets: [{
                    label: 'Jumlah blogs',
                    data: [
                        <?php echo count($blogs); ?>,
                        <?php echo count($kategori1); ?>,
                        <?php echo count($kategori2); ?>,
                        <?php echo count($kategori3); ?>,
                        <?php echo count($kategori4); ?>,
                        <?php echo count($kategori5); ?>
                    ],
                    backgroundColor: [
                        'lightblue',
                        'lightgreen',
                        'lightyellow',
                        'lightcoral',
                        'rgba(238,130,238)',
                        'lightgray'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 182, 193, 1)',
                        'rgba(211, 211, 211, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Debugging: Log data to console
        console.log({
            labels: ['Semua blogs', 'blogs "Sport"', 'blogs "Education"', 'blogs "News"', 'blogs "Fiture"', 'blogs "Lainnya"'],
            data: [
                <?php echo count($blogs); ?>,
                <?php echo count($kategori1); ?>,
                <?php echo count($kategori2); ?>,
                <?php echo count($kategori3); ?>,
                <?php echo count($kategori4); ?>,
                <?php echo count($kategori5); ?>
            ]
        });
    });
</script>

<?php include 'resources/views/master/master.php'; ?>