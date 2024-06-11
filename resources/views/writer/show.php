<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Postingan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <main class="flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-md rounded-lg p-10 w-full max-w-4xl">
            <!-- Data Dummy -->
            <?php
                $post = [
                    "judul" => "Resep Nasi Goreng Spesial",
                    "gambar" => "https://via.placeholder.com/800x400", // Link gambar dummy
                    "isi" => "Nasi goreng adalah makanan khas Indonesia yang sangat populer. Untuk membuat nasi goreng yang spesial, Anda memerlukan bahan-bahan seperti nasi putih, bawang merah, bawang putih, kecap manis, dan berbagai bumbu lainnya. Berikut adalah langkah-langkah untuk membuat nasi goreng yang lezat..."
                ];
            ?>
            
            <!-- Konten Postingan -->
            <h1 class="text-4xl font-bold mb-6"><?= $post['judul'] ?></h1>
            <img src="<?= $post['gambar'] ?>" alt="Gambar Postingan" class="w-full h-auto mb-6 rounded-lg shadow-md">
            <p class="text-lg text-gray-700 leading-relaxed"><?= $post['isi'] ?></p>
        </div>
    </main>
</body>
</html>
