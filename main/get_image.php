<?php
include_once("../Database/config.php"); // Koneksi database

if (isset($_GET['id'])) {
    $id_artikel = intval($_GET['id']);
    $query = "SELECT cover FROM tb_artikel WHERE id_artikel = $id_artikel";
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        $row = mysqli_fetch_assoc($hasil);
        if ($row) {
            header("Content-Type: image/jpeg"); // Atur header sesuai dengan tipe gambar
            echo $row['cover']; // Tampilkan gambar
        } else {
            // Jika gambar tidak ditemukan, tampilkan gambar default atau error
            header("HTTP/1.0 404 Not Found");
            echo "Gambar tidak ditemukan.";
        }
    } else {
        // Jika query gagal
        header("HTTP/1.0 500 Internal Server Error");
        echo "Terjadi kesalahan saat mengambil gambar.";
    }
} else {
    // Jika id tidak ada
    header("HTTP/1.0 400 Bad Request");
    echo "ID artikel tidak valid.";
}
?>