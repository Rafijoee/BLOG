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
                        <a href="<?= urlpath('dashboard-admin/laporan') ?>" class="block p-0 px-3 md:p-0 text-white custom-hover rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Laporan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container mx-auto mt-20 flex justify-center">
    <div class="mx-40 bg-white bulet flex-col flex w-full">
        <h2 class="text-4xl font-bold mx-4 pt-10 text-center">Jumlah Blogs Keseluruhan Waktu</h2>
        <div class="gambar-pie flex justify-center items-center m-10">
            <canvas id="overallChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Overall Pie Chart
        var overallCtx = document.getElementById('overallChart').getContext('2d');
        var overallChart = new Chart(overallCtx, {
            type: 'pie', // Ubah tipe grafik menjadi 'pie'
            data: {
                labels: ['Semua blogs', 'Category: "Sport"', 'Category: "Education"', 'Category: "News"', 'Category: "Fiture"', 'Category: "Lainnya"'],
                datasets: [{
                    label: 'Jumlah blogs',
                    data: [
                        <?= count($blogs); ?>,
                        <?= count($kategori1); ?>,
                        <?= count($kategori2); ?>,
                        <?= count($kategori3); ?>,
                        <?= count($kategori4); ?>,
                        <?= count($kategori5); ?>
                    ],
                    backgroundColor: [
                        '#6CA4AD',
                        '#B0B0B0',
                        '#3A5A64',
                        '#85A8B2', // Warna netral lebih muda
                        '#344657', // Warna yang lebih gelap lagi dari '#415268'
                        '#9CAEBF' // Warna netral lebih muda lagi
                    ],
                    borderColor: [
                        '#3A4A5B', // Warna garis batas yang lebih gelap
                        '#52677D', // Warna garis batas yang lebih terang dari '#3A4A5B'
                        '#2B3C4D', // Warna garis batas yang lebih gelap lagi dari '#52677D'
                        '#6E7F91', // Warna garis batas netral lebih muda
                        '#273743', // Warna garis batas yang lebih gelap dari '#2B3C4D'
                        '#B2C1D0' // Warna garis batas netral lebih muda lagi
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'right', // Atur posisi legend di sebelah kanan
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.formattedValue; // Tampilkan label dan nilai data di tooltip
                            }
                        }
                    }
                }
            }
        });
    });
</script>

<?php include 'resources/views/master/master.php'; ?>


<?php include 'resources/views/master/master.php'; ?>