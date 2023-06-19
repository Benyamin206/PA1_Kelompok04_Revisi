<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login_admin.php");
    exit;
}

include 'layouts/navbar(1)_layout.html';
require 'fungsi_admin.php';
$data_produk = ambilData("SELECT * FROM produk ORDER BY id_produk DESC");
$a = 1;
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
<body>
  
<form action="" method="POST" class="search-form">
  <div class="input-wrapper">
    <input type="text" name="keyword" size="40" autofocus placeholder="Cari..." autocomplete="off" id="keyword" class="search-input">
  </div>
</form>
<br>

<a href="tambah_produk.php"><button class="btn btn-primary">Tambah Produk</button></a>
<a href="produk_laris.php"><button class="btn btn-primary">Produk Laris</button></a>
<a href="kategori_produk.php"><button class="btn btn-primary">Kategori Produk</button></a>



<br><br>
<div id="container" style = "overflow-y : scroll; max-height:700px">
  <table>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>Kategori</th>
      <th>Harga</th>
      <th>Deskripsi</th>
      <th>Gambar Utama</th>
      <th>Slide Carousel 1</th>
      <th>Slide Carousel 2</th>
      <th>Slide Carousel 3</th>
      <th>Aksi Admin</th>
    </tr>

    <?php foreach ($data_produk as $dp) {
      $id_kategori = $dp['id_kategori'];
      $data_kategori = ambilData("SELECT * FROM kategori_produk WHERE id_kategori = '$id_kategori'")[0];
    ?>
      <tr>
        <td><?= $a; ?></td>
        <td><?= $dp['nama_produk']; ?></td>
        <td><?php echo $data_kategori['nama_kategori']; ?></td>
        <td><?= $dp['harga_produk']; ?></td>
        <td style="max-height: 150px"><div style = "overflow-y : scroll; max-height : 150px"><?= $dp['deskripsi']; ?></div></td>
        <td><img src="../Gambar/gambar_produk/<?= $dp['gambar']; ?>" alt="Gambar Utama" width=100 height=100></td>
        <td><img src="../Gambar/gambar_carousel/<?= $dp['SC1']; ?>" alt="Slide 1" width=100 height=100></td>
        <td><img src="../Gambar/gambar_carousel/<?= $dp['SC2']; ?>" alt="Slide 1" width=100 height=100></td>
        <td><img src="../Gambar/gambar_carousel/<?= $dp['SC3']; ?>" alt="Slide 1" width=100 height=100></td>
        <td>
          <a class="btn btn-warning" href="ubah_produk.php?id_produk=<?php echo $dp['id_produk'] ?>">
            Ubah
          </a>
          <a class="btn btn-danger" href="hapus_produk.php?id_produk=<?php echo $dp['id_produk'] ?>" onclick="return confirm('Anda yakin ingin menghapus produk <?php echo $dp['nama_produk']; ?>?');">
            Hapus
          </a>
        </td>
      </tr>
    <?php $a++;
    } ?>
  </table>
  <p id="not-found" style="display: none;">Produk tidak ditemukan</p>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#keyword').on('keyup', function() {
      var keyword = $(this).val().toLowerCase();
      var found = false;
      $('table tr:gt(0)').each(function() {
        var rowText = $(this).text().toLowerCase();
        $(this).toggle(rowText.indexOf(keyword) > -1);
        if ($(this).is(":visible")) {
          found = true;
        }
      });

      if (found) {
        $('#not-found').hide();
      } else {
        $('#not-found').show();
      }
    });
  });
</script>

<?php include 'layouts/navbar(2)_layout.html' ?>
