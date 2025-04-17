<?php
include '../../../config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $id_admin = $_POST['id_admin'];
    $deskripsi = $_POST['deskripsi'];
    $level = $_POST['level'];
    $url_video = $_POST['url_video'];

    $query = "INSERT INTO tb_course (judul, deskripsi, level, url_video, id_admin) VALUES ('$judul', '$deskripsi', '$level', '$url_video', '$id_admin')";

    if (mysqli_query($conn, $query)) {
<<<<<<< HEAD
        header("Location: index.php");
=======
        header("Location: ../../index.php");
>>>>>>> 41e3296cd96ea046ad2b3e5e1f303c3fab58e77d
    } else {
        echo "Gagal menambahkan kursus: " . mysqli_error($conn);
    }
}
?>
