<?php

    require "../Admin/fungsi_admin.php";
    $id_produk = $_GET['id_produk'];
    $data_produk = ambilData("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];
    $id_kategori = $data_produk['id_kategori'];
    $kategori = ambilData("SELECT * FROM kategori_produk WHERE id_kategori = '$id_kategori'")[0];
    $data_owner = ambilData("SELECT * FROM profil_owner")[0];

    
    $wa = $data_owner['nomor_wa'];
    $waReal = substr($wa, 1);



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Produk - Elizabeth Ulos</title>
    <link rel="stylesheet" href="CSS/InformasiProduk.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" href="logoToko.jpg">
   <style>
  .carousel {
    max-width: 300px; /* Atur lebar sesuai kebutuhan */
    margin-left: auto;
    margin-right: auto;
  }
    #produk{
    padding: 10px 20px;
    color: white !important;
    border-radius: 10px;
    background-color: #722d2d;
    border-bottom: 4px solid rgba(214, 147, 147, 0.3) !important;
}
</style>

</head>
<body>
       <!-- navigasi -->
    
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
                    <a href="Tentang.php">Tentang Kami</a>
                    <a href="Produk.php" id="produk">Produk</a>    
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


<section id="contact" class="contact" style="margin-top: 100px; ">
  <div class="container" data-aos="fade-up">
<style type="text/css">
</style>
    
    <div class="section-title">
      <h2>Informasi Produk</h2>

    </div>
    <?php $a=2; ?>
    <div class="row">
      <div class="col-lg-12 d-flex align-items-stretch">
<div class="row info" >
  <div class="col-lg-6">
    <!-- Carousel with 3 images -->
<style>
  .carousel {
    height: 400px; /* Atur tinggi carousel sesuai kebutuhan */
  }

  .carousel-inner img {
    object-fit: cover;
    height: 400px;
    width: 100%;
  }
</style>



<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../Gambar/gambar_carousel/<?php echo $data_produk['SC1']; ?>" class="d-block w-100" alt="Image 1" width=100%>
    </div>
    <div class="carousel-item">
      <img src="../Gambar/gambar_carousel/<?php echo $data_produk['SC2']; ?>" class="d-block w-100" alt="Image 2" width=100%>
    </div>
    <div class="carousel-item">
      <img src="../Gambar/gambar_carousel/<?php echo $data_produk['SC3']; ?>" class="d-block w-100" alt="Image 3" width=100%>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

  </div>
  
  <div class="col-lg-6">
    <div class="row">
      <div class="col-12">
        <h4 class="title">Nama Produk:</h3>
              <p><?php echo $data_produk['nama_produk']; ?></p>
      </div>
      <div class="col-12">
        <h4 class="title">Deskripsi Produk:</h3>
              <?php 
                // Data deskripsi dari database

                // Regex pattern untuk menemukan link dalam deskripsi
                $pattern = '/\b(?:https?:\/\/|www\.)\S+\b/';

                // Fungsi preg_replace untuk mengganti link dengan tag <a href>
                $deskripsi_dengan_link = preg_replace($pattern, '<a href="$0" target="_blank">$0</a>', $data_produk['deskripsi']);

                // Output hasil deskripsi yang telah dibungkus dengan tag <a href>

               ?>
              <p style="max-width: 100%;overflow-wrap: break-word;" ><?= $deskripsi_dengan_link; ?></p>
      </div>
      <div class="col-12">
        <h4 class="title">Kategori Produk:</h3>
              <p><?php echo $kategori['nama_kategori']; ?></p>
      </div>

            <div class="col-12">
        <h4 class="title">Harga Produk:</h3>
              <h4 class="highlight" style="color:red;">Rp<?php echo number_format( $data_produk['harga_produk'], 0, ',', '.'); ?></h4>
      </div>

                  <div class="col-12">
               <h4 class="title">
                        <a href="Produk.php"><button class="btn btn-danger rounded-3">Kembali</button></a>

                   <button class="btn btn-success rounded-3" data-bs-toggle="modal" data-bs-target="#pesanModal">Pesan</button>
                    
                </h4>
      </div>


    </div>
  </div>

</div>

      </div>
    </div>

  </div>
</section>

        <center>

        
        </center>
<!-- Modal -->
<div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="pesanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pesanModalLabel">Pesan Produk <?php echo $data_produk['nama_produk']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="jumlahPesan">Berapa banyak yang ingin anda pesan?</label><br>
                <input type="number" id="jumlahPesan" name="jumlahPesan" min="1" value="1">
                <br><br>
                <label for="alamat">Alamat:</label><br>
                <textarea id="alamat" name="alamat" rows="3"></textarea>
            </div>
            <div class="modal-footer">
                <!-- Tombol untuk mengirim pesan WhatsApp dengan jumlah pesanan dan alamat yang dimasukkan -->
                <a href="#" class="btn btn-success rounded-3" onclick="pesanProduk()">Pesan</a>
                <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function pesanProduk() {
        var jumlahPesan = document.getElementById('jumlahPesan').value;
        var alamat = document.getElementById('alamat').value;
        var pesanTemplate = "Halo, saya tertarik untuk memesan produk <?php echo $data_produk['nama_produk']; ?> sebanyak " + jumlahPesan + ".\nAlamat: " + alamat + "\nTerima kasih.";
        var waLink = "https://wa.me/62<?php echo $waReal; ?>?text=" + encodeURIComponent(pesanTemplate);
        window.open(waLink, '_blank');

                // Refresh halaman setelah pesan dikirim
        setTimeout(function() {
            location.reload();
        }, 1000); // Waktu delay sebelum halaman direfresh (dalam milidetik)
    }


</script>

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

