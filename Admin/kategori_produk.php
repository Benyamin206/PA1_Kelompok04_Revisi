<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login_admin.php");
    exit;
}

include 'layouts/navbar(1)_layout.html';
require 'fungsi_admin.php';


$data_kategori = ambilData("SELECT * FROM kategori_produk WHERE id_kategori NOT IN ('7')");



if (isset($_POST['submit'])) {
  $nama_kategori = htmlspecialchars($_POST['nama_kategori']);
  if ($nama_kategori == '') {
    echo "<script>
    alert('Anda belum memasukkan nama kategori.');
    alert('Gagal menambahkan kategori.');

    document.location.href = 'kategori_produk.php';

    </script>";
    exit;
  }
  $queryCek = "SELECT * FROM kategori_produk WHERE nama_kategori IN ('$nama_kategori')";
  $result = mysqli_query($conn, $queryCek);
  
  if (mysqli_num_rows($result) == 1) {
    echo "<script>
    alert('Nama kategori yang anda inputkan telah ada. Pilihlah nama kategori yang lain');
    alert('Gagal menambahkan kategori.');

    document.location.href = 'kategori_produk.php';

    </script>";
  }else{
    $queryTambah = "INSERT INTO kategori_produk VALUES ('', '$nama_kategori')";
if (mysqli_query($conn, $queryTambah)) {
  echo "<script>
    alert('Kategori Berhasil ditambahkan');
    document.location.href = 'kategori_produk.php';
  </script>";
} else {
  echo "<script>
    alert('Kategori gagal ditambahkan');
  </script>";
}



  }


}


?>
<head>
  <link rel="icon" href="logoToko.jpg">

  <link href="css/style_produk_admin.css" rel="stylesheet" />

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');


*{
    font-family: 'Roboto Slab', serif;
    font-size: large;
    transition: .2s linear;
}

    #aksi_admin{
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

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Kategori Produk
  </button>
  <a href="produk_admin.php" class="btn btn-danger">Kembali</a>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kategori Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
          Masukkan nama kategori produk yang ingin Anda tambahkan : <br>
          <input type="text" name="nama_kategori" >
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
        </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

        </div>
      </div>
    </div>
  </div>

<br>
<br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Daftar Kategori Produk</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($data_kategori as $dk){ 
        $id_kategori = $dk['id_kategori'];
        ?>
    <tr>
      <td><?php echo $dk["nama_kategori"]; ?></td>
      <td><a href="hapus_kategori_produk.php?id_kategori=<?php echo $dk['id_kategori']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus kategori produk <?php echo $dk['nama_kategori']; ?>?');">Hapus</a></td>
    </tr>
    <?php } ?> 
  </tbody>
</table>









<?php include 'layouts/navbar(2)_layout.html' ?>
