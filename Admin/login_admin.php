<?php 

session_start();
if(isset($_SESSION['login'])){
    header("Location: dasbor_admin.php");
}

require "fungsi_admin.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $queryLogin = "SELECT * FROM admin_ WHERE username_admin = '$username'";
  
    $result = mysqli_query($conn, $queryLogin);
  
    if(mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_assoc($result);
      if($password == $row['password_admin']){
        // $_SESSION["idAdmin"] == $row['id_admin'];
        $_SESSION["login"] = $row['id_admin'];
        
        header("Location: dasbor_admin.php");
        exit;
      }
    }
  
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link href="css/style_login_admin3.css" rel="stylesheet" />

  <style>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');


*{
    font-family: 'Roboto Slab', serif;
    font-size: large;
    transition: .2s linear;
/*    text-transform: capitalize;*/
}
  </style>
</head>
<body >
  <div class="container">
    <h2 style="color:#722D2D;">Login Admin</h2>
    <form action="" method="POST">
    <?php if(isset($error)){ ?>
          <p style="color:red; font-style:italic;">Username atau password salah</p>
          <?php } ?>
      
      <label for="username" style="color:#722D2D;">Username:</label>
      <input type="text" id="username" name="username" placeholder="Masukkan username..." required>
      <label for="password" style="color:#722D2D;">Password:</label>
      <input type="password" id="password" name="password" placeholder="Masukkan password..."  required>
      <div class="ok" style="display:flex; justify-content:space-between">
      <a href="../Tampilan/beranda.php" class="button-like" style="width:40%">Kembali</a>
      <button type="submit" name="login" style="width:40%; background-color:#722D2D" >Masuk</button>
      </div>

    </form>
  </div>
</body>
</html>
