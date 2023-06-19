
<?php 


      session_start();

      if( !isset($_SESSION["login"])){
          header("Location: login_admin.php");
          exit;
      }

require "fungsi_admin.php";

$id = $_GET['id_profil_owner'];
$data_owner = ambilData("SELECT * FROM profil_owner WHERE id_profil_owner = '$id'")[0];

if (isset($_POST['submit'])) {
    $wa = $_POST['wa'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $tiktok = $_POST['tiktok'];
    $youtube = $_POST['youtube'];

    $queryUbah = "UPDATE profil_owner
                  SET nomor_wa = '$wa',
                  email = '$email',
                  facebook = '$facebook',
                  instagram = '$instagram',
                  tiktok = '$tiktok',
                  youtube = '$youtube'
                  WHERE id_profil_owner = '$id'";

    if (mysqli_query($conn, $queryUbah)) {
        echo "<script>
                alert('Berhasil Diubah');
                window.location.href = 'profil_owner.php';
            </script>";
    } else {
        echo "<script>
                alert('Gagal Diubah');
                window.location.href = 'profil_owner.php';
            </script>";
    }
}

include 'layouts/navbar(1)_layout.html';
?>
<head>
	<link href="css/style_profil_owner.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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




<br>
  <div class="container mt-5">
    <div class="contact-info">
      <h2>Informasi Owner</h2>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="wa" class="form-label">Nomor WhatsApp:</label>
          <input type="text" class="form-control" id="wa" name="wa" value="<?php echo $data_owner['nomor_wa']; ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Link Email:</label>
          <input type="text" class="form-control" id="email" name="email" value="<?php echo $data_owner['email']; ?>">
        </div>
        <div class="mb-3">
          <label for="facebook" class="form-label">Link Facebook:</label>
          <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $data_owner['facebook']; ?>">
        </div>
        <div class="mb-3">
          <label for="instagram" class="form-label">Link Instagram:</label>
          <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $data_owner['instagram']; ?>">
        </div>
        <div class="mb-3">
          <label for="tiktok" class="form-label">Link TikTok:</label>
          <input type="text" class="form-control" id="tiktok" name="tiktok" value="<?php echo $data_owner['tiktok']; ?>">
        </div>
        <div class="mb-3">
          <label for="youtube" class="form-label">Link Youtube:</label>
          <input type="text" class="form-control" id="youtube" name="youtube" value="<?php echo $data_owner['youtube']; ?>">
        </div>
        <br>
        <input type="hidden" name="id" value="<?php $id; ?>">
        <button type="submit" class="btn btn-success" name="submit">Simpan</button>
        <a href="profil_owner.php" class="btn btn-danger">Batal</a>
      </form>
    </div>
  </div>





 
<?php include 'layouts/navbar(2)_layout.html' ?>

  