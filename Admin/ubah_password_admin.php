<?php 
          session_start();

          if( !isset($_SESSION["login"])){
              header("Location: login_admin.php");
              exit;
          }

          


require "fungsi_admin.php";


if(isset($_POST['ubah'])){
    $password_baru = $_POST['password'];

    $queryGantiPasswordAdmin = "UPDATE admin_ SET password_admin = '$password_baru'";
    mysqli_query($conn,$queryGantiPasswordAdmin);

    if(mysqli_affected_rows($conn) > 0){
        echo "<script>
        alert('password admin berhasil diubah');
        document.location.href = 'dasbor_admin.php';
    </script>";
    }else{
      echo "<script>
        alert('password admin gagal diubah');
        document.location.href = 'dasbor_admin.php';
    </script>";
    }

    
}   



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Password Admin</title>
  <link href="css/style_login_admin3.css" rel="stylesheet" />

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');


*{
    font-family: 'Roboto Slab', serif;
    font-size: large;
    transition: .2s linear;
    text-transform: capitalize;
}
    .error-message {
      color: red;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Ubah Password Admin</h2>
    <form action="" method="POST" onsubmit="return validateForm()">

      <label for="password">Password Baru: </label>
      <input type="password" id="password" name="password" required>
      <label for="confirmPassword">Konfirmasi Password: </label>
      <input type="password" id="confirmPassword" name="confirmPassword" required> <!-- Menambahkan input konfirmasi password dengan id "confirmPassword" -->
      <span id="error-message" class="error-message"></span>
      <div style = "display : flex; justify-content: space-between">
      <button type="submit" name="ubah" style="width:40%">Ubah</button>
      <a href="dasbor_admin.php" id="batal" style="width:40%">Batal</a>
      </div>
    </form>

  </div>

<script>
  function validateForm() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var errorMessage = document.getElementById("error-message");

    if (password !== confirmPassword) {
      errorMessage.textContent = "Password tidak sesuai.";
      return false;
    }

    if (password.length < 8) {
      errorMessage.textContent = "Password harus memiliki minimal 8 karakter.";
      return false;
    }

    if (!/\d/.test(password)) {
      errorMessage.textContent = "Password harus mengandung minimal satu angka.";
      return false;
    }

    if (/^\d+$/.test(password)) {
      errorMessage.textContent = "Password tidak boleh hanya terdiri dari angka saja.";
      return false;
    }

    return true;
  }
</script>


</body>
</html>
