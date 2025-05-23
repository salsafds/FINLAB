<?php 
include_once("config.php"); // Koneksi database

// Query untuk mengambil data minicourse
$query_minicourse = "SELECT * FROM tb_course ORDER BY id_course DESC LIMIT 3"; 
$hasil_minicourse = mysqli_query($conn, $query_minicourse);

// Query untuk mengambil data artikel
$query_artikel = "SELECT * FROM tb_artikel ORDER BY id_artikel DESC LIMIT 3"; 
$hasil_artikel = mysqli_query($conn, $query_artikel);
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hamburger-active #line1 {
            transform: rotate(45deg) translateY(8px);
        }
        .hamburger-active #line2 {
            opacity: 0;
        }
        .hamburger-active #line3 {
            transform: rotate(-45deg) translateY(-8px);
        }
        .truncate-3-lines {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3; /* Batasi menjadi 3 baris */
            overflow: hidden;
            text-overflow: ellipsis; /* Tampilkan elipsis (...) jika teks terpotong */
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
    <title>FINLAB (Financial Literacy and Budgeting)</title>
</head>
<body>
    <!-- Tambahkan tepat setelah <body> -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>
    <!-- Header Start -->
    <header class="bg-white fixed top-0 left-0 w-full flex items-center z-50 shadow-md">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="#home" class="font-bold text-xl text-accent block py-6 ml-4 md:ml-8 lg:ml-0">FINLAB</a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute left-0 lg:hidden">
                        <span id="line1" class="w-[20px] h-[2px] my-1 block bg-primary transition-all duration-300 ease-in-out origin-top-left"></span>
                        <span id="line2" class="w-[20px] h-[2px] my-1 block bg-primary transition-all duration-300 ease-in-out"></span>
                        <span id="line3" class="w-[20px] h-[2px] my-1 block bg-primary transition-all duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                    

                    <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg 
                    max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full
                    lg:shadow-none lg:rounded-none"
                    >
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="#home" class="text-base text-primary py-2 mx-8 flex group-hover:text-accent">Beranda</a>
                            </li>
                            <li class="group">
                                <a href="#about" class="text-base text-primary py-2 mx-8 flex group-hover:text-accent">Tentang FINLAB</a>
                            </li>
                            <li class="group">
                                <a href="#artikel" class="text-base text-primary py-2 mx-8 flex group-hover:text-accent">Artikel</a>
                            </li>
                            <li class="group">
                                <a href="#minicourse" class="text-base text-primary py-2 mx-8 flex group-hover:text-accent">Kursus Mini</a>
                            </li>
                            <li class="group">
                                <a href="#simulasi" class="text-base text-primary py-2 mx-8 flex group-hover:text-accent">Simulasi Anggaran</a>
                            </li>
                            <li class="group">
                                <a href="#contact" class="text-base text-primary py-2 mx-8 flex group-hover:text-accent">Kontak</a>
                            </li>
                            <li class="group">
                                <a href="page_akun.php" class="text-base font-semibold text-white bg-accent py-2 px-6 rounded-lg hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Daftar</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Sidebar Start -->
<aside id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-white shadow-lg z-40 transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden">
    <div class="p-6">
        <a href="#home" class="font-bold text-xl text-accent block mb-6">FINLAB</a>
        <ul>
            <li><a href="#home" class="block py-2 text-primary hover:text-accent">Beranda</a></li>
            <li><a href="#about" class="block py-2 text-primary hover:text-accent">Tentang FINLAB</a></li>
            <li><a href="#artikel" class="block py-2 text-primary hover:text-accent">Artikel</a></li>
            <li><a href="#minicourse" class="block py-2 text-primary hover:text-accent">Kursus Mini</a></li>
            <li><a href="#simulasi" class="block py-2 text-primary hover:text-accent">Simulasi Anggaran</a></li>
            <li><a href="#contact" class="block py-2 text-primary hover:text-accent">Kontak</a></li>
        </ul>
    </div>
</aside>
<!-- Sidebar End -->


    <!-- Hero Section Start -->
    <section id="home" class="pt-36">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 lg:w-1/2">
                    <h1 class="text-base font-semibold text-secondary lg:text-xl">Selamat Datang di <span class="block font-bold text-accent text-6xl mt-1 lg:text-7xl">FINLAB</span></h1>
                    <h2 class="font-medium text-primary text-lg mb-5 lg:text-2xl">Financial Literacy & Budgeting</h2>
                    <p class="font-medium text-secondary mb-10 leading-relaxed max-w-sm">Membantu Anda mengambil keputusan finansial yang lebih baik.</p>

                    <a href="#about" class="text-base font-semibold text-white bg-accent py-2 px-6 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Jelajahi FINLAB</a>
                </div>
                <div class="w-full self-end px-4 lg:w-1/2">
                    <div class="relative mt-10 lg:mt-9 lg:right-0">
                        <img src="Assets/img/modelhomepage.png" alt="Foto Model Home Page" class="max-w-full mx-auto" />
                        <span class="absolute bottom-0 -z-10 left-1/2 -translate-x-1/2 md:scale-125">
                            <svg width="270" height="270" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FFD700" d="M53.4,-36.2C66.5,-26.1,72.5,-4.1,67.5,14.5C62.5,33.1,46.5,48.2,28.5,55.4C10.5,62.6,-9.5,61.9,-30.2,54.9C-50.9,47.9,-72.3,34.7,-78.5,15.6C-84.6,-3.4,-75.6,-28.2,-60,-38.9C-44.3,-49.5,-22.2,-45.9,-1,-45.1C20.1,-44.3,40.3,-46.2,53.4,-36.2Z" transform="translate(100 100)" />
                              </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Start -->
    <section id="about" class="pt-36 pb-32">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold uppercase text-accent text-lg mb-3">Tentang FINLAB</h4>
                    <h2 class="font-bold text-primary text-3xl mb-5 max-w-md lg:text-3xl">Kelola keuangan dengan lebih cerdas di FINLAB</h2>
                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit tempore sint rerum quia architecto, dolores aspernatur!</p>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <h3 class="font-semibold text-primary text-xl mb-4 lg:text-2xl lg:pt-10">Hubungi Kami</h3>
                    <p class="font-medium text-base text-secondary mb-6 lg:text-lg">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sed incidunt odit labore omnis iusto numquam odio doloribus.</p>
                    <div class="flex items-center">
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
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Artikel Section Start -->
<section id="artikel" class="pt-36 pb-32 bg-slate-100">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-semibold text-2xl text-accent mb-2">Artikel</h4>
                <h2 class="font-bold text-primary text-3xl mb-4 sm:text-4xl lg:text-5xl">Berita Terkini</h2>
                <p class="font-medium text-md text-secondary md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt necessitatibus asperiores repellendus aliquid!</p>
            </div>
        </div>

        <div class="flex flex-wrap justify-center">
            <?php 
            while ($row = mysqli_fetch_assoc($hasil_artikel)) { 
            ?>
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                    <div class="bg-background rounded-xl shadow-lg overflow-hidden mb-10">
                        <img src="main/get_image.php?id=<?php echo $row['id_artikel']; ?>" alt="gambar artikel <?php echo $row['id_artikel']; ?>" class="w-full h-64 object-cover" />
                        <div class="py-8 px-6">
                            <h3>
                                <a href="main/artikel.php?id=<?php echo $row['id_artikel']; ?>" class="block mb-3 font-semibold text-xl text-primary hover:text-accent truncate"><?php echo htmlspecialchars($row['judul']); ?></a>
                            </h3>
                            <h2 class="mb-1 font-medium text-md text-secondary"><?php echo htmlspecialchars($row['penulis']); ?></h2>         
                            <p class="font-medium text-base text-gray-400 truncate-3-lines mb-6"><?php echo htmlspecialchars($row['konten']); ?></p>
                            <a href="main/artikel.php?id=<?php echo $row['id_artikel']; ?>" class="font-medium text-sm text-white bg-accent py-2 px-5 rounded-lg hover:opacity-80">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Artikel Section End -->

    <!-- Mini Course Start -->
<section id="minicourse" class="pt-36 pb-32">
    
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-semibold text-2xl text-accent mb-2">Video Singkat</h4>
                <h2 class="font-bold text-primary text-3xl mb-4 sm:text-4xl lg:text-5xl">Mini Course</h2>
                <p class="font-medium text-md text-secondary md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt necessitatibus asperiores repellendus aliquid!</p>
            </div>
        </div>

        <div class="flex flex-wrap justify-center">
            <div class="grid md:grid-cols-3 gap-6">
                <?php while ($row = mysqli_fetch_assoc($hasil_minicourse)) { 
                    // Ambil ID video dari URL
                    $videoId = null;
                    if (strpos($row['url_video'], 'embed/') !== false) {
                        $videoId = explode('embed/', $row['url_video'])[1];
                        $videoId = explode('?', $videoId)[0]; // Mengambil ID video
                    }

                    if ($videoId) {
                        $thumbnailUrl = "https://img.youtube.com/vi/$videoId/maxresdefault.jpg"; // URL thumbnail
                    } else {
                        $thumbnailUrl = "path/to/default-thumbnail.jpg"; // Ganti dengan path thumbnail default jika ID tidak ditemukan
                    }
                ?>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <a href="main/minicourse.php?id=<?php echo $row['id_course']; ?>">
                            <img src="<?php echo $thumbnailUrl; ?>" class="w-full h-56 object-cover" alt="<?php echo htmlspecialchars($row['judul']); ?>" />
                        </a>
                        <div class="p-4">
                            <h2>
                                <a href="main/minicourse.php?id=<?php echo $row['id_course']; ?>" class="text-xl font-semibold text-secondary hover:text-accent truncate"><?php echo htmlspecialchars($row['judul']); ?></a>
                            </h2>
                            <p class="text-sm text-secondary truncate-3-lines"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                            <span class="text-sm font-semibold text-accent">#<?php echo htmlspecialchars($row['level']); ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- Mini Course End -->

    <!-- Contact Section Start -->
    <section id="contact" class="pt-36 pb-32">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-3xl text-accent mb-2">Kontak</h4>
                    <h2 class="font-bold text-primary text-3xl mb-4 sm:text-4xl lg:text-5xl">Hubungi Kami</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, quis?</p>
                </div>
            </div>

            <form>
                <div class="w-full lg:w-2/3 lg:mx-auto">
                    <div class="w-full px-4 mb-8">
                        <label for="name" class="text-base font-bold text-primary">Nama</label>
                        <input type="text" id="name" class="w-full bg-slate-200 text-text p-3 rounded-md focus:outline-none focus:ring-accent focus:ring-1 focus:border-accent"/>
                    </div>
                    <div class="w-full px-4 mb-8">
                        <label for="email" class="text-base font-bold text-primary">Email</label>
                        <input type="email" id="email" class="w-full bg-slate-200 text-text p-3 rounded-md focus:outline-none focus:ring-accent focus:ring-1 focus:border-accent"/>
                    </div>
                    <div class="w-full px-4 mb-8">
                        <label for="message" class="text-base font-bold text-primary">Pesan</label>
                        <textarea type="message" id="message" class="w-full bg-slate-200 text-text p-3 rounded-md focus:outline-none focus:ring-accent focus:ring-1 focus:border-accent h-32"></textarea>
                    </div>
                    <div class="w-full px-4">
                        <button class="text-base font-semibold text-background bg-accent py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Contact Section End -->
    
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
    <script src="/dist/js/script.js"></script>
</body>


<script>
    const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const sidebarLinks = sidebar.querySelectorAll('a');

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        hamburger.classList.add('hamburger-active');
        overlay.classList.remove('hidden');
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        hamburger.classList.remove('hamburger-active');
        overlay.classList.add('hidden');
    }

    hamburger.addEventListener('click', () => {
        const isHidden = sidebar.classList.contains('-translate-x-full');
        if (isHidden) {
            openSidebar();
        } else {
            closeSidebar();
        }
    });

    window.addEventListener('click', (e) => {
        if (!sidebar.contains(e.target) && !hamburger.contains(e.target)) {
            closeSidebar();
        }
    });

    overlay.addEventListener('click', closeSidebar);

    // Tutup sidebar saat klik link
    sidebarLinks.forEach(link => {
        link.addEventListener('click', () => {
            closeSidebar();
        });
    });
</script>
</html>