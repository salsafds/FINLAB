<?php 
include_once("../Database/config.php"); // Koneksi database

if (isset($_GET['id'])) {
    $id_artikel = intval($_GET['id']);
    $query = "SELECT * FROM tb_artikel WHERE id_artikel = $id_artikel";
    $hasil = mysqli_query($conn, $query);
    $artikel = mysqli_fetch_assoc($hasil);

    if (!$artikel) {
        // Jika artikel tidak ditemukan, redirect atau tampilkan pesan error
        header("Location: index.php");
        exit();
    }
} else {
    // Jika id tidak ada, redirect atau tampilkan pesan error
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Tambahkan gaya khusus di sini */
        .bg-accent {
            background-color: #FFD700; /* Emas premium */
        }
        .text-primary {
            color: #111827; /* Hitam solid */
        }
        .text-secondary {
            color: #6B7280; /* Abu modern */
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                container: {
                    center: true,
                    padding: '16px',
                },
                extend: {
                    fontFamily: {
                        inter:['Inter'],
                    },
                    colors: {
                        primary: '#111827', //hitam solid
                        secondary: '#6B7280', //abu modern
                        accent: '#FFD700', //emas premium
                        background: '#F9FAFB', //putih netral
                        text:'374151', //abu gelap
                    },
                    screens: {
                        '2xl': '1320px',
                    },
                },
            },
        };
    </script>
    <title><?php echo htmlspecialchars($artikel['judul']); ?></title>
</head>
<body class="bg-gray-100">
    <!-- Header Start -->
    <header class="bg-white fixed top-0 left-0 w-full flex items-center z-50 shadow-md">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="index.php" class="font-bold text-xl text-accent block py-6">FINLAB</a>
                </div>
                <nav class="hidden lg:flex">
                    <ul class="flex space-x-4">
                        <li><a href="#home" class="text-primary hover:text-accent">Beranda</a></li>
                        <li><a href="#about" class="text-primary hover:text-accent">Tentang FINLAB</a></li>
                        <li><a href="#artikel" class="text-primary hover:text-accent">Artikel</a></li>
                        <li><a href="#minicourse" class="text-primary hover:text-accent">Kursus Mini</a></li>
                        <li><a href="#contact" class="text-primary hover:text-accent">Kontak</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <div class="container mx-auto p-4 pt-36">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="get_image.php?id=<?php echo $artikel['id_artikel']; ?>" alt="<?php echo htmlspecialchars($artikel['judul']); ?>" class="w-full h-64 object-cover" />
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-2"><?php echo htmlspecialchars($artikel['judul']); ?></h1>
            <h2 class="text-md text-gray-600 mb-4">Oleh: <?php echo htmlspecialchars($artikel['penulis']); ?></h2>
            <p class="text-gray-700 mb-4"><?php echo nl2br(htmlspecialchars($artikel['konten'])); ?></p>
            <a href="index.php" class="text-white bg-accent py-2 px-4 rounded-lg hover:opacity-80">Kembali ke Beranda</a>
        </div>
    </div>
</div>

    <!-- Footer Start -->
    <footer class="bg-primary pt-24 pb-12">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-12 text-slate-300 font-medium md:w-1/3">
                    <h2 class="font-bold text-4xl text-background mb-5">FINLAB</h2>
                    <h3 class="font-bold text-2xl mb-2">Hubungi Kami</h3>
                    <p>finlabs@gmail.com</p>
                    <p>Jl. Rungkut Madya, Gn. Anyar, Surabaya, Jawa Timur 60294</p>
                </div>
                <div class="w-full px-4 mb-12 md:w-1/3">
                    <h3 class="font-semibold text-xl text-background mb-5">Fitur</h3>
                    <ul class="text-slate-300">
                        <li>
                            <a href="#artikel" class="inline-block text-base hover:text-accent mb-3">Artikel</a>
                        </li>
                        <li>
                            <a href="#minicourse" class="inline-block text-base hover:text-accent mb-3">Kursus Mini</a>
                        </li>
                        <li>
                            <a href="#simulasi" class="inline-block text-base hover:text-accent mb-3">Simulasi Anggaran</a>
                        </li>
                    </ul>
                </div>
                <div class="w-full px-4 mb-12 md:w-1/3">
                    <h3 class="font-semibold text-xl text-background mb-5">Tautan</h3>
                    <ul class="text-slate-300">
                        <li>
                            <a href="#home" class="inline-block text-base hover:text-accent mb-3">Beranda</a>
                        </li>
                        <li>
                            <a href="#about" class="inline-block text-base hover:text-accent mb-3">Tentang FINLAB</a>
                        </li>
                        <li>
                            <a href="#artikel" class="inline-block text-base hover:text-accent mb-3">Artikel</a>
                        </li>
                        <li>
                            <a href="#minicourse" class="inline-block text-base hover:text-accent mb-3">Kursus Mini</a>
                        </li>
                        <li>
                            <a href="#contact" class="inline-block text-base hover:text-accent mb-3">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="w-full pt-10 border-t border-slate-700">
                <div class="flex items-center justify-center mb-5">
                    <!-- Gmail -->
                    <a 
                        href="mailto:finlabs@gmail.com"
                        target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center 
                        border border-slate-300 text-slate-300 *:hover:border-accent hover:bg-accent hover:text-white"
                    >
                        <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Gmail</title><path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/></svg>
                    </a>
                    <!-- Instagram -->
                    <a 
                        href="https://instagram.com/salsasdh"
                        target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center 
                        border border-slate-300 text-slate-300 *:hover:border-accent hover:bg-accent hover:text-white"
                    >
                        <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"/></svg>
                    </a>
                </div>
                <p class="font-medium text-xs text-slate-400 text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
</body>
</html>