<?php
require "../Admin/fungsi_admin.php";

$data_owner = ambilData("SELECT * FROM profil_owner")[0];


$rand = rand(9999,1000);

if(isset($_POST['submit'])){
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $isi = htmlspecialchars($_POST['isi']);
    $gambar = uploadGambarUlasan();
    if($gambar == false){
                echo "<script>
        alert('Gagal mengirim ulasan');
        document.location.href = 'Ulasan.php';
        </script>";
        exit;
    }
    $captcha = htmlspecialchars($_POST['captcha']);
    $captchaRandom = htmlspecialchars($_POST['captcha-rand']);
    

    if($captcha !== $captchaRandom
    ){
        echo "<script>
        alert('captcha tidak valid');
        document.location.href = 'Ulasan.php';
        </script>";
        exit;
    }else{
        $queryUlasan = "INSERT INTO ulasan VALUE
                          ('','$nama','$email',NOW(),'$isi','$gambar', '1')";
        mysqli_query($conn, $queryUlasan);
        
        if(mysqli_affected_rows($conn) > 0){
            echo "<script>
            alert('Ulasan berhasil dikirim');
           // document.location.href = 'Ulasan.php';
        </script>";
        }else{
            echo "<script>
            alert('Ulasan gagal dikirim');
          //  document.location.href = 'Ulasan.php';
        </script>"; 
        }
    }



}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan - Elizabeth Ulos</title>
    <link rel="stylesheet" href="CSS/Ulasan.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" href="logoToko.jpg">
    <style>
        .captcha{
            background-color: yellow;
            text-align : center;
            font-size: 30px;
            font-weight:700
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
                    <a href="Tentang.php">Tentang Kami</a>
                    <a href="Produk.php">Produk</a>    
                    <a href="Ulasan.php" id="ulasan">Ulasan</a>    
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

    <section id="contact" class="contact" style="margin-top: 100px;">
      <div class="container align-items" data-aos="fade-up"  style="display:flex;justify-content:center;" >

        <section  >
        <div class="section-title">
          <h2 style="text-align: center;" >Beri Kami Ulasan</h2>
          <p>Toko Yang Menyediakan Berbagai Ulos Yang Dapat Dibeli Dan Menyediakan Layanan Pemesanan Dari Luar Pulau</p>
        </div>
 
         <div style="width:100%;display:flex;justify-content:center;" >
         <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-center w-75">
         <form  method="post" role="form" class="php-email-form" action = "" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Nama Anda</label>
                  <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Email Anda</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Pesan</label>
                <textarea class="form-control" name="isi" rows="10" required></textarea>
              </div>

              <div class="form-group">
  <label for="foto"><h4>Tambahkan Foto :</h4></label>
  <div class="input-group">
    <input type="file" class="form-control form-control-lg" id="foto" name="foto">
    <!-- <label class="input-group-text" for="foto"></label> -->
  </div>
</div>

     
              <br>
              <div class="row">
              <div class="form-group col-md-6">
                  <label for="name">Masukkan Captha</label>
                  <input type="text" class="form-control" name="captcha" id="captcha" required>
                  <input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
                </div>

                <div class="form-group col-md-6">
                <label for="captcha"> Captcha</label><br>
                <div class="captcha" id="captcha"><?php echo $rand; ?></div>
                </div>
              </div>
              <div class="text-center"><button type="submit" name="submit">Kirim</button></div>
            </form>
          </div>
         </div>
        </section>

        </div>

      </div>
    </section>

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