<?php 

              session_start();

              if( !isset($_SESSION["login"])){
                  header("Location: login_admin.php");
                  exit;
              }

require "fungsi_admin.php";

$data_owner = ambilData("SELECT * FROM profil_owner")[0];



include 'layouts/navbar(1)_layout.html';
?>
<head>
	<link href="css/style_profil_owner.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">
  <title>Contact Information</title>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');


*{
    font-family: 'Roboto Slab', serif;
    font-size: large;
    transition: .2s linear;
/*    text-transform: capitalize;*/
}


    #profil_owner{
    background-color : white;
    color : #722D2D;
  }
  #dasbor:hover{
    background-color : white;
    color: grey;
  }

</style>

</head>

  <style>
    .container {
      margin-top: 50px;
    }
    .box {
/*      border: 5px solid grey;*/
      padding: 20px;
      border-radius: 15px;
    }
  </style>

<style>
.shadow {
  box-shadow: 20px 4px 50px rgba(0, 0, 0, 0.4); /* Ubah nilai ini sesuai dengan preferensi Anda */
  padding: 20px;
}
</style>

<br>


 <div class="container shadow">
  <div class="text-center">
    <h1 style="color:#722D2D;">Informasi Owner</h1>
    <br><br><br>
    <div class="row justify-content-center">
      <div class="col-md-6 box shadow">
        <h3>WhatsApp: <span style="font-size: 25px;" id="whatsapp"></span></h3><br>
        <h3>Email: <a href="#" target="_blank" id="email">LINK EMAIL</a></h3><br>
        <h3>Facebook: <a href="#" target="_blank" id="facebook">LINK FACEBOOK</a></h3><br>
        <h3>Instagram: <a href="#" target="_blank" id="instagram">LINK INSTAGRAM</a></h3><br>
        <h3>TikTok: <a href="#" target="_blank" id="tiktok">LINK TIKTOK</a></h3><br>
        <h3>Youtube: <a href="#" target="_blank" id="youtube">LINK YOUTUBE</a></h3><br>
        <a href="ubah_profil_owner.php?id_profil_owner=<?php echo $data_owner['id_profil_owner']; ?>" class="btn btn-warning"><h3>Ubah</h3></a><br>
      </div>
    </div>
  </div>
</div>


  <script>
    // Replace the following lines with your dynamic data
    document.getElementById('whatsapp').textContent = '<?= $data_owner['nomor_wa']; ?>';
    document.getElementById('email').href = '<?= $data_owner['email']; ?>';
    document.getElementById('facebook').href = '<?= $data_owner['facebook']; ?>';
    document.getElementById('instagram').href = '<?= $data_owner['instagram']; ?>';
    document.getElementById('tiktok').href = '<?= $data_owner['tiktok']; ?>';
    document.getElementById('youtube').href = '<?= $data_owner['youtube']; ?>';
  </script>
  





 
<?php include 'layouts/navbar(2)_layout.html' ?>

  