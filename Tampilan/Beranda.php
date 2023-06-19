<?php 
require "../Admin/fungsi_admin.php";

$data_produk_laris = ambilData("SELECT * FROM produk_laris ORDER BY id_produk_laris DESC");

$data_owner = ambilData("SELECT * FROM profil_owner")[0];

$data_ulasan_customer = ambilData("SELECT * FROM ulasan WHERE pandangan = '1' ORDER BY id_ulasan DESC");
?>






<!doctype html>
<html lang="en">
  <head>
  <link rel="icon" href="logoToko.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda - Elizabeth Ulos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Beranda2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


</head>

  <body>
    <!-- navigasi -->
    
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="box-shadow: 0 2px 7px rgba(0, 0, 0, 0.3);">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="Beranda.php">
                <div class="d-flex align-items-center">
                    <img src="gambar/REAL.jpg" alt="Elizabeth Ulos" class="img-fluid">
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
                    <a href="Tentang.php">Tentang Kami</a>
                    <a href="Produk.php">Produk</a>    
                    <a href="Ulasan.php">Ulasan</a>
                    <?php
                    session_start();
                    if( isset($_SESSION["login"])){?>
                        <a href="../Admin/dasbor_admin.php">Dasbor Admin</a>
                   <?php } else{?>
                    <a href="../Admin/login_admin.php">Login Admin</a>
                   <?php } ?>       
                </div>
            </div>
        </div>
    </nav>
</header>                                                 

    <!-- Hero Section -->
    <section id="hero-section">
        <div class="container mt-2">
            <div class="row mt-5 justify-content-center text-center">
                <h1 class="text-white font-weight-bold">Selamat Datang di Website Elizabeth Ulos</h1>
                <p class="text-white opacity-75 font-weight-bold mt-3">Toko yg menyediakan RAGAM ULOS BATAK, untuk keperluan pesta batak serta ragam sarung tenunan tangan, dan melayani pengiriman barang ke seluruh wilayah Indonesia
                </p>
                <div class="mt-2 mt-lg-4">
                    <a href="#oke" class="btn bg-dark text-white rounded-pill px-4 shadow-white">
                        Produk Terlaris
                    </a>
                </div>
            </div>
        </div>
    </section>

  
                    <span id="oke"></span>
                    <br><br><br><br>
    <!-- Best Product -->
    <section id="values-products">
        <div class="justify-content-center text-center " style="display: flex; justify-content: center;  ">
            <h1 class="judul">Produk Terlaris</h1>
        </div>
        <div class="container mt-4">
            <div class="row d-flex justify-content-center align-items-center"  data-aos="fade-up" data-aos-duration="2000">
                
            <?php  foreach($data_produk_laris as $dpl) { 
                $id_produk = $dpl['id_produk'];
                $produk = ambilData("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];
                ?>
                <div class="col-12 col-md-6 col-lg-3 ms-5">
                    <div class="d-flex flex-row flex-lg-column">
                        <img src="../Gambar/gambar_produk/<?php echo $produk['gambar']; ?>" class="col-4 rounded-4" style="width : 250px; height:310px">
                        <div class="d-flex flex-column ms-5 ms-md-6 ms-lg-0 detail mt-3 mt-md-0">
                            <h5 class="mt-lg-3"><?php echo $produk['nama_produk']; ?></h5>
                            <p class="mt-lg-2">Rp<?php echo number_format( $produk['harga_produk'], 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

            </div>
        </div>

    </section>

 

    <br>
    <br>
    <!-- TESTIMONI -->
<center>            <h2 style="color:#722D2D;  border-bottom: 5px solid #722D2D; display: inline-block;">Testimoni Pada Toko Kami</h5>
            <h5>Terdapat beberapa testimoni yang kami dapatkan ketika menjual produk kami</p></center>
    <div class="container">
  <div class="row">
    <?php foreach($data_ulasan_customer as $duc){ ?>
    <div class="col-md-6" >
      <div class="card mb-3 ms-5 ms-md-5 mt-md-5 mt-5" style="max-width: 100%;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="../Gambar/gambar_ulasan/<?php echo $duc['gambar']; ?>" class="img-fluid rounded-start" alt="..." style="height: 280px; width: 100%;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title"><?php echo $duc['nama_pengirim']; ?></h3>
              <h6 class="card-title"><?php echo $duc['email_pengirim'] ?></h6>
              <p class="card-text" style="overflow-y: scroll;max-height: 100px; height: 100px"><?php echo $duc['isi']; ?></p>
              <p class="card-text"><small class="text-body-secondary"><?php echo $duc['waktu']; ?></small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>



    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4 mt-3 mt-md-4" style="background-color: #323232;">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left me-5">
                <div class="col-md-3 col-lg-3 col-xl-4 mx-auto mt-3">
                    <h5 class="d-flex flex-column text-uppercase mb-4 font-weight-bold text-warning">Elizabeth Ulos</h5>
                    <p>
                    </p>
                    <h2><?php echo $data_owner['nomor_wa']; ?></h2>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
  </body>
</html>
