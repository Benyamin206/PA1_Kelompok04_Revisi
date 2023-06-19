<?php 
          session_start();

          if( !isset($_SESSION["login"])){
              header("Location: login_admin.php");
              exit;
          }


      include 'layouts/navbar(1)_layout.html';
      require "fungsi_admin.php";

$dataProduk = ambilData("SELECT * FROM produk");
$dataProdukLaris  = ambilData("SELECT * FROM produk_laris ORDER BY id_produk_laris DESC");

if(isset($_POST['submit'])){
    $id_produk = htmlspecialchars($_POST['id_produk']);

    // $listProdukLaris = [];

    // foreach($dataProdukLaris as $dPL){
    //   $listProdukLaris[] = $dPL['id_produk_laris'];
    // }

    //     if( in_array($id_produk, $listProdukLaris)){
    //         echo " <script>
    //         alert('Produk sudah tergolong laris');
    //         document.location.href = 'produk_laris.php';
    //      </script>";
    //      return false;
    //      exit;
    //     }
    $queryCekLaris = "SELECT * FROM produk_laris WHERE id_produk = '$id_produk'";
    mysqli_query($conn, $queryCekLaris);
    $cek =  mysqli_affected_rows($conn);
    if ($cek > 0) {
      echo "<script>
alert('Produk Sudah Tergolong Laris');
document.location.href = 'produk_laris.php';
</script>";
return false;
exit;
    }



    $queryTambahProdukLaris = "INSERT INTO produk_laris
    VALUE ('','$id_produk')";              
$tambahProdukLaris = mysqli_query($conn,$queryTambahProdukLaris);
$a = mysqli_affected_rows($conn);
if($a > 0 ){
echo "<script>
alert('Produk ditambahkan ke produk laris');
document.location.href = 'produk_laris.php';
</script>";
}else{
echo "<script>
alert('Gagal Ditambahkan');
document.location.href = 'produk_laris.php';
</script>";
}

}



?>



<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');


*{
    font-family: 'Roboto Slab', serif;
    font-size: large;
    transition: .2s linear;
/*    text-transform: capitalize;*/
}
    #aksi_admin{
    background-color : white;
    color : #722D2D;
  }
  #dasbor:hover{
        background-color : white;
    color : grey;

  }
</style>

<form action="" method="POST" class="form">
  <label for="myDropdown" class="form-label"><b>Tambahkan produk laris:</b></label>
  <select id="myDropdown" name="id_produk" class="form-select" required>
  <?php
  $larisOptions = '';
  $nonLarisOptions = '';
  
  foreach($dataProduk as $dp) {
    $id_produk = $dp['id_produk']; 
    $queryCek = "SELECT * 
                 FROM produk_laris
                 WHERE id_produk = '$id_produk'";
    
    $result = mysqli_query($conn, $queryCek);
    $isLaris = mysqli_num_rows($result) == 1;
    
    if ($isLaris) {
      $larisOptions .= '<option disabled value="' . $dp['id_produk'] . '">' . $dp['nama_produk'] . ' {Telah Tergolong Laris}</option>';
    } else {
      $nonLarisOptions .= '<option value="' . $dp['id_produk'] . '">' . $dp['nama_produk'] . '</option>';
    }
  }
    
  echo $nonLarisOptions . $larisOptions;
  ?>
</select>



  <br>

  <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
  <a href="produk_admin.php" class="btn btn-danger">Kembali</a>

</form>


<br><br><br>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Daftar Produk Laris</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($dataProdukLaris as $dpl){ 
        $id_produk = $dpl['id_produk'];
        $namaProdukLaris = ambilData("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];
        ?>
    <tr>
      <td><?php echo $namaProdukLaris["nama_produk"]; ?></td>
      <td><a href="hapus_produk_laris.php?id_produk=<?php echo $dpl['id_produk']; ?>" class="btn btn-danger">Hapus</a></td>
    </tr>
    <?php } ?> 
  </tbody>
</table>
<?php include 'layouts/navbar(2)_layout.html' ?>
