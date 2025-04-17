<?php
include '../../../config.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_course WHERE id_course = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Jika data tidak ditemukan
if (!$data) {
    die("Kursus tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursus - FinLaB</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="alert alert-info text-center">
            <h2>Edit Kursus</h2>
        </div>

        <form action="prosesupdatecourse.php" method="POST">
            <input type="hidden" name="id_course" value="<?= $data['id_course'] ?>">

            <!-- Judul -->
            <div class="form-group">
                <label>Judul Kursus</label>
                <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']) ?>" required>
            </div>

            <!-- Deskripsi -->
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
            </div>

            <!-- Level -->
            <div class="form-group">
                <label>Tingkat</label>
                <select name="level" class="form-control" required>
                    <option value="Pemula" <?= ($data['level'] == 'Pemula') ? "selected" : "" ?>>Pemula</option>
                    <option value="Menengah" <?= ($data['level'] == 'Menengah') ? "selected" : "" ?>>Menengah</option>
                    <option value="Keatas" <?= ($data['level'] == 'Keatas') ? "selected" : "" ?>>Keatas</option>
                </select>
            </div>

            <!-- URL Video -->
            <div class="form-group">
                <label>URL Video</label>
                <input type="url" name="url_video" class="form-control" value="<?= htmlspecialchars($data['url_video']) ?>" required>
            </div>

            <!-- Tombol -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="../../index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            crossorigin="anonymous"></script>
</body>
</html>
