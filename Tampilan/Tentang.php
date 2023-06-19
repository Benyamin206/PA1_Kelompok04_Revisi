<?php 
require "../Admin/fungsi_admin.php";


$data_owner = ambilData("SELECT * FROM profil_owner")[0];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang - Elizabeth Ulos</title>
    <link rel="stylesheet" href="CSS/Tentang.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" href="logoToko.jpg">
    <style>
        .navbar-toggler{
        background-color: rgb(198, 195, 195);
        border-color: white;
    }
    .navbar-toggler-icon {
        background-color: rgb(198, 195, 195);
    }
    .navbar-brand img {
            max-width: 80px;
            height: auto;
        }   
    </style>

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="box-shadow: 0 2px 7px rgba(0, 0, 0, 0.3);">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="Beranda.php">
                <div class="d-flex align-items-center">
                    <img src="gambar/REAL.jpg" alt="#" class="img-fluid">
                    <h4 class="ml-2 mb-0">
                        <span class="nav-1">Elizabeth</span>
                        <span class="nav-2">Ulos</span>
                    </h4>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto d-flex gap-4">
                    <a href="Beranda.php" id="beranda">Beranda</a>
                    <a href="Tentang.php" id="tentang">Tentang Kami</a>
                    <a href="Produk.php">Produk</a>    
                    <a href="Ulasan.php">Ulasan</a>    
                    <?php
                    session_start();
                    if( isset($_SESSION["login"])){?>
                        <a href="../Admin/dasbor_admin.php">Dasbor Admin</a>
                   <?php } else{?>
                    <a href="../Admin/login_admin.php">Login Admin</a>
                   <?php } ?>                </div>
            </div>
        </div>
    </nav>
</header>

<main class="mt-5">
    <div class="container-fluid p-0 mt-5">
        <div class="site-content">
            <div class="d-flex justify-content-center align-items-center mt-sm-4">
                <div class="d-flex flex-column">
                    <h1 class="site-title">Selamat Datang di halaman Tentang Toko</h1>
                    <p class="site-desc">Berisi informasi menarik dari toko yang kami sajikan mulai dari partonun, hingga deskripsi toko</p>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 col-md-6 mt-5 mb-5">
                            <a href="Produk.php" class="mb-5">
                                <input type="button" value="Menjadi Penjelajah" class="btn site-btn1 px-4 py-3 mr-4 mx-auto">
                            </a>
                        </div>
                        <div class="col-12 col-md-6 mt-5 mb-5">
                            <a href="#tentang1" class="mb-5">
                                <input type="button" value="Lihat Tentang Toko" class="btn site-btn2 px-4 py-3 mr-4 btn-light mx-auto">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- <div id="tentang">
        
        </div> -->
<span id="tentang1"></span>
<br><br><br>
    <main>
<div class="section-1" >
    <div class="container text-center">
        <h1 class="mt-5" id="heading-1">Partonunun Elizabeth Ulos</h1>
        <p id="para-1" class="mt-4">Partonun adalah penjaga budaya yang bekerja demi kelangsungan warisan budaya, menjaga filosofi hidup orang Batak, serta kemahiran tradisional.Tenun tradisional adalah salah satu bidang di mana pengetahuan berharga diwariskan dari para ibu ke anak-anak perempuan mereka secara turun-temurun. Dan saat ini dengan dedikasinya yang luar biasa dalam menjaga dan mempromosikan budaya Batak melalui seni tenun ulos, Elizabeth Ulos telah membantu memastikan bahwa warisan budaya yang berharga ini akan terus hidup dan diperkaya untuk generasi mendatang. Perannya sebagai penjaga budaya memberikan inspirasi bagi kita semua untuk menghargai dan melindungi warisan budaya yang ada di masyarakat kita</p>
        
        <div class="row justify-content-center text-center card-deck"  data-aos="fade-up" data-aos-duration="2000">
            <div class="col-12 col-md-6 col-lg-4 mt-md-3">
                <div class="card mt-sm-4" style="width: 100%;  ">
                    <img src="./gambar/partonun1.jpg" alt="Image1" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">Partonun Tarutung muara meat</h4>
                        <p class="card-text">Partonun yang berada di Tarutung muara meat ini, merupakan partonun yang dimiliki oleh Elizabeth Ulos. Partonun ini berfokus untuk menenun sarung. </p>
                    </div>
                </div>
            </div>
                <div class="col-12 col-md-6 col-lg-4 mt-md-3">
                <div class="card mt-sm-4" style="width: 100%; " >
                        <img src="./gambar/partonun2.jpg" alt="Image2" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">Partonun Silaen</h4><br>
                        <p class="card-text">Partonun yang berada di Silaen ini, merupakan partonun yang dimiliki oleh Elizabeth Ulos. Partonun ini berfokus untuk menenun Ulos.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


        <div class="section-2">
            <div class="container-fluid">
                <div class="d-flex ">
                    <div class="d-flex flex-column m-5">
                        <div class="text-white">
                            <h1 class="heading-1">Detail Toko Elizabeth Ulos</h1>
                            <p class="para opacity-75">Memuat informasi yang dapat kita ketahui secara spesifik</p>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section-3 mt-4">
            <div class="container mt-4">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-4 ">
                        <div class="d-flex flex-row">
                            <i class="fas fa-question fa-3x m-2"></i>
                            <div class="d-flex flex-column">
                                <h3 class="m-2">Sejarah Singkat</h3>
                                <p class="m-2">Elizabeth Ulos pertama sekali berdiri pada tahun 2018. Nama Elizabeth Ulos sendiri diambil dari nama putri bungsu owner yaitu Elizabeth. Sedangkan Ulos sendiri diambil dari jenis produk yang diperjualbelikan pada toko ini.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex flex-row">
                            <i class="fas fa-clock fa-3x m-2"></i>
                            <div class="d-flex flex-column">
                                <h3 class="m-2">Jam Operasional</h3>
                                <p class="m-2">Jam operasional pada toko Elizabeth Ulos ialah dari jam 08.00 WIB s/d 22.00 WIB pada hari Senin sampai Sabtu. Sedangkan pada hari Minggu, Elizabeth Ulos tidak beroperasi..</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex flex-row">
                            <i class="fas fa-map-marker-alt fa-3x m-2"></i>
                            <div class="d-flex flex-column">
                                <h3 class="m-2">Lokasi</h3>
                                <p class="m-2">Elizabeth Ulos adalah UMKM yang berlokasi di Desa Sirongit, Sitoluama, Kabupaten Toba Samosir, Sumatera Utara.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4 mt-3 mt-md-4" style="background-color: #323232;">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left me-5">
                <div class="col-md-3 col-lg-3 col-xl-4 mx-auto mt-3">
                    <h5 class="d-flex flex-column text-uppercase mb-4 font-weight-bold text-warning">Elizabeth Ulos</h5>
  <p>
                    </p>                    <h2><?php echo $data_owner['nomor_wa']; ?></h2>
                    <p style="text-decoration: underline;"><?php echo $data_owner['email']; ?></p>

                    <div class="text-center text-md-right mt-5">
                        <h6 class="text-warning">Temukan Lebih Banyak Pada Media Sosial Kami :</h6>
                        <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                                <a href="<?php echo $data_owner['facebook']; ?>" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="_blank">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?php echo $data_owner['instagram']; ?>" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="_blank">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?php echo $data_owner['tiktok']; ?>" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="_blank">
                                    <i class="bi bi-tiktok"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?php echo $data_owner['youtube']; ?>" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="_blank">
                                    <i class="bi bi-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-6 mx-auto mt-3">
                    <div class="iframe-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3986.4263299503386!2d99.12710621475559!3d2.362757498278076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMsKwMjEnNDUuOSJOIDk5wrAwNyc0NS41IkU!5e0!3m2!1sid!2sid!4v1684829412115!5m2!1sid!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="peta"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-center align-items-center">
            <div class="mt-md-2">
                <p>© 2022 All rights reserved</p>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/041b345707.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>  
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>