<?php

include_once 'app/config/conn.php';

class Blog
{
    static function select()
    {
        global $conn;
        $sql = "SELECT * FROM blog";

        $result = $conn->query($sql);
        $arr = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }
    static function finds($slug)
    {
        global $conn;

        // Menyiapkan query dengan placeholder untuk parameter
        $sql = "SELECT * FROM blog WHERE slug = ?";

        // Menyiapkan statement
        $stmt = $conn->prepare($sql);

        // Mengikat parameter ke statement
        $stmt->bind_param("s", $slug);

        // Menjalankan statement
        $stmt->execute();

        // Mendapatkan hasil
        $result = $stmt->get_result();
        $arr = [];

        // Memeriksa apakah ada hasil
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }

        // Menutup statement
        $stmt->close();

        return $arr;
    }
    static function show()
    {
        global $conn;

        // Query pertama untuk mendapatkan informasi user berdasarkan username dari sesi
        $sql1 = "SELECT * FROM users WHERE username = ?";

        // Menyiapkan statement untuk query pertama
        $stmt1 = $conn->prepare($sql1);

        // Mengikat parameter untuk query pertama
        $stmt1->bind_param('s', $_SESSION['user']['username']);

        // Menjalankan query pertama
        $stmt1->execute();

        // Mendapatkan hasil query pertama
        $result1 = $stmt1->get_result();

        // Memeriksa apakah hasil query pertama memiliki data
        if ($result1->num_rows > 0) {
            // Mendapatkan baris pertama dari hasil query pertama
            $user = $result1->fetch_assoc();
            $penulis_id = $user['id']; // Asumsi bahwa kolom 'id' adalah identifikasi penulis dalam tabel users
        } else {
            // Jika tidak ada hasil, tutup statement dan kembalikan array kosong
            $stmt1->close();
            return [];
        }

        // Menutup statement pertama
        $stmt1->close();

        // Query kedua untuk mendapatkan resep berdasarkan id penulis
        $sql = "SELECT * FROM blog WHERE penulis = ?";

        // Menyiapkan statement untuk query kedua
        $stmt = $conn->prepare($sql);

        // Mengikat parameter untuk query kedua
        $stmt->bind_param('s', $penulis_id);

        // Menjalankan query kedua
        $stmt->execute();

        // Mendapatkan hasil query kedua
        $result = $stmt->get_result();
        $arr = [];

        // Memeriksa apakah hasil query kedua memiliki data
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }

        // Menutup statement kedua
        $stmt->close();

        return $arr;
    }
    static function insert($judul, $slug, $penulis, $isi, $gambar, $category_id, $created_at)
    {
        global $conn;

        // $penulis = $_SESSION['user']['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "INSERT INTO blog (judul, slug, penulis, isi, gambar, category_id, created_at) VALUES ('$judul', '$slug', '$penulis', '$isi', '$gambar', '$category_id', '$created_at')";

            $hasil = mysqli_query($conn, $sql);

            if ($hasil) {
                return $hasil;
            } else {
                echo "Gagal menambahkan data";
            }
        }
    }
    static function update($judul, $slug, $penulis, $isi, $gambar, $category_id)
    {
        global $conn;

        $oldSlug = $_POST['oldSlug'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE blog SET judul = ?, slug = ?, penulis = ?, isi = ?, gambar = ?, category_id = ? WHERE slug = ?");

        // Bind the parameters to the SQL query
        $stmt->bind_param("sssssis", $judul, $slug, $penulis, $isi, $gambar, $category_id, $oldSlug);

        // Execute the query
        $hasil = $stmt->execute();

        if ($hasil) {
            return $hasil;
        } else {
            echo "Gagal mengupdate data";
        }

        // Close the statement
        $stmt->close();
    }

    static function destroy($id)
    {
        global $conn;

        $sql = "DELETE FROM blog WHERE id = $id";
        $hasil = $conn->query($sql);

        if ($hasil) {
            return $hasil;
        } else {
            echo "Gagal menghapus data";
        }
    }
    public static function getImageName($slug)
    {
        global $conn;

        $sql = "SELECT gambar FROM blog WHERE slug = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['gambar'];
    }
}
