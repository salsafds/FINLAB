<?php
include '../../../../config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $id_admin = $_POST['id_admin'];
    $deskripsi = $_POST['deskripsi'];
    $level = $_POST['level'];
    $url_video = $_POST['url_video'];

    $query = "INSERT INTO tb_course (judul, deskripsi, level, url_video, id_admin) VALUES ('$judul', '$deskripsi', '$level', '$url_video', '$id_admin')";

    if (mysqli_query($conn, $query)) {
        header("Location: admin/FinLaB_Admin/index.php");
    } else {
        echo "Gagal menambahkan kursus: " . mysqli_error($conn);
    }
}
?>
