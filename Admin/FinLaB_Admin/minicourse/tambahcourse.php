<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login_admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kursus - FinLaB Admin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="alert alert-success text-center">
            <h2>Tambah Kursus Baru</h2>
        </div>

        <form action="prosestambahcourse.php" method="POST">
            <!-- ID Admin -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Admin</label>
                <div class="col-sm-6">
                    <input type="text" name="id_admin" class="form-control" value="<?php echo $_SESSION['admin_id']; ?>" readonly>
                </div>
            </div>

            <!-- Judul Kursus -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Kursus</label>
                <div class="col-sm-6">
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Kursus" required>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-6">
                    <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan Deskripsi" required></textarea>
                </div>
            </div>

            <!-- Level -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-6">
                    <select name="level" class="form-control" required>
                        <option value="">-- Pilih Level --</option>
                        <option value="Pemula">Pemula</option>
                        <option value="Menengah">Menengah</option>
                        <option value="Keatas">Keatas</option>
                    </select>
                </div>
            </div>

            <!-- URL Video -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">URL Video</label>
                <div class="col-sm-6">
                    <input type="url" name="url_video" class="form-control" placeholder="https://contoh.com/video" required>
                </div>
            </div>

            <!-- Tombol -->
            <div class="form-group row">
                <div class="col-sm-6 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Tambah Kursus</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap & jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
            crossorigin="anonymous"></script>
</body>
</html>
