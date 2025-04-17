<?php 
include_once("../config.php"); // Koneksi database

if (isset($_GET['id'])) {
    $id_course = intval($_GET['id']);
    $query = "SELECT * FROM tb_course WHERE id_course = $id_course";
    $hasil = mysqli_query($conn, $query);
    $minicourse = mysqli_fetch_assoc($hasil);
} else {
    // Redirect atau tampilkan pesan error jika id tidak ada
    header("Location: index.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($minicourse['judul']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-5xl bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row">
        <div class="w-full md:w-2/3 p-6">
            <div class="relative w-full h-0 pb-[56.25%]">
                <iframe class="absolute top-0 left-0 w-full h-full rounded-lg" 
                    src="<?php echo htmlspecialchars($minicourse['url_video']); ?>" 
                    frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="w-full md:w-1/3 p-6 bg-gray-50 flex flex-col justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($minicourse['judul']); ?></h2>
                <p class="text-gray-600 mt-2 text-sm md:text-base">
                    <?php echo htmlspecialchars($minicourse['deskripsi']); ?>
                </p>
            </div>
            <div class="mt-4 space-y-2">
                <a href="../index.php"><button class="w-full bg-[#FFD700] text-white py-2 rounded-md hover:bg-[#918232] transition">
                    Selesai 
                </button></a>
                <a href="kuis.html" class="w-full">
                    <button class="bg-gray-300 py-2 my-4 rounded-md hover:bg-gray-400 transition w-full">
                        Kerjakan Quiz
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>