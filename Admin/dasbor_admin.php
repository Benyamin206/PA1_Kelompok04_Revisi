<?php 
      session_start();

      if( !isset($_SESSION["login"])){
          header("Location: login_admin.php");
          exit;
      }

      include 'layouts/navbar(1)_layout.html';
       
      require "fungsi_admin.php";

      $jumlah_produk = ambilData("SELECT COUNT(*) as jumlah_produk FROM produk")[0];
      $jumlah_kategori = ambilData("SELECT COUNT(*) as jumlah_kategori FROM kategori_produk WHERE id_kategori NOT IN ('7')")[0];
      $jumlah_produk_terlaris = ambilData("SELECT COUNT(*) as jumlah_produk_laris FROM produk_laris")[0];
      $jumlah_feedback = ambilData("SELECT COUNT(*) as jumlah_feedback FROM ulasan")[0];
?>  
      
<link href="css/style_dasbor.css" rel="stylesheet" />
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');


*{
    font-family: 'Roboto Slab', serif;
    font-size: large;
    transition: .2s linear;
    text-transform: capitalize;
}
  .bg-cus{
    background-color:blue;
  }
  #dasbor{
    background-color : white;
    color : #722D2D;
  }
  #dasbor:hover{
  color : #722D2D;
  }
</style>




<div class="dashboard">
    <div class="box">
      <div class="box-header">
        <h3>Jumlah Produk</h3>
      </div>
      <div class="box-content">
        <span class="count"><?php echo $jumlah_produk['jumlah_produk']; ?></span>
      </div>
    </div>

    <div class="box">
      <div class="box-header">
        <h3>Jumlah Kategori Produk</h3>
      </div>
      <div class="box-content">
        <span class="count"><?php echo $jumlah_kategori['jumlah_kategori']; ?></span>
      </div>
    </div>

    <div class="box">
      <div class="box-header">
        <h3>Jumlah Produk Terlaris</h3>
      </div>
      <div class="box-content">
        <span class="count"><?php echo $jumlah_produk_terlaris['jumlah_produk_laris']; ?></span>
      </div>
    </div>

    <div class="box">
      <div class="box-header">
        <h3>Jumlah Ulasan</h3>
      </div>
      <div class="box-content">
        <span class="count"><?php echo $jumlah_feedback['jumlah_feedback']; ?></span>
      </div>
    </div>
  </div>




<?php include 'layouts/navbar(2)_layout.html' ?>
