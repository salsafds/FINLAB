<?php 
    include_once("../config.php"); // Koneksi database
    $query = "SELECT * FROM tb_course";
    $hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kursus - FinLaB Admin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="alert alert-primary text-center">
            <h2>Manajemen Kursus</h2>
        </div>

        <!-- Tombol Tambah Kursus -->
        <a href="tambahcourse.php" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Tambah Kursus
        </a>

        <!-- Tabel Data Kursus -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Admin</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Link Video</th>
                    <th scope="col">Tingkat</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id_admin']); ?></td>
                        <td><?php echo htmlspecialchars($row['judul']); ?></td>
                        <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                        <td>
                            <a href="<?php echo htmlspecialchars($row['url_video']); ?>" target="_blank" class="btn btn-link">Tonton</a>
                        </td>
                        <td><?php echo htmlspecialchars($row['level']); ?></td>
                        <td class="text-center">
                            <a href="updatecourse.php?id=<?php echo $row['id_course']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapuscourse.php?id=<?php echo $row['id_course']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus kursus ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Tombol Kembali ke Dashboard -->
        <a href="../index.php" class="btn btn-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard Admin
        </a>
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
