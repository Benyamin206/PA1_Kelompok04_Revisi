<?php 

session_start();

if( !isset($_SESSION["login"])){
    header("Location: login_admin.php");
    exit;
}


require "fungsi_admin.php";

$data_kategori_produk = ambilData("SELECT * FROM kategori_produk");


if(isset($_POST['submit'])){

  if(tambah($_POST) > 0){
      echo "<script>
alert('Produk Berhasil ditambahkan');
document.location.href = 'produk_admin.php';
</script>";
  }else{
      echo "<script>
      alert('Produk Gagal diitambahkan
      ');
      document.location.href = 'produk_admin.php';
  </script>";
  }

}

?>










<?php include 'layouts/navbar(1)_layout.html' ?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');


*{
    font-family: 'Roboto Slab', serif;
    font-size: large;
    transition: .2s linear;
/*    text-transform: capitalize;*/
}
#dasbor{
  background-color : #722D2D;
  color : white;
}
#aksi_admin{
  background-color : white;
  color : #722D2D;
}
#ulasan{
  background-color : #722D2D;
  color : white;
}
#halaman_website{
  background-color : #722D2D;
  color : white;
}
#profil_owner{
  background-color : #722D2D;
  color : white;
}
#dasbor:hover{
  background-color: white;
  color: grey;
}
#aksi_admin:hover{
  background-color: white;
  color: grey;
}
#ulasan:hover{
  background-color: white;
  color: grey;
}
#profil_owner:hover{
  background-color: white;
  color: grey;
}
#halaman_website:hover{
  background-color: white;
  color: grey;
}


</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<link href="css/style_tambah_produk.css" rel="stylesheet" />



<div class="container">
    <h2>Tambah Produk</h2>
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nama_produk" class="form-label">Nama Produk:</label>
        <input type="text" id="nama_produk" name="nama" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="myDropdown" class="form-label">Kategori:</label>
        <select id="myDropdown" name="id_kategori" class="form-select" required>
          <?php foreach($data_kategori_produk as $dkp) {?>
        <option value="<?php echo $dkp['id_kategori']; ?>"><?php echo $dkp['nama_kategori']; ?></option>
        <?php } ?>
        </select>      
      </div>

      <div class="mb-3">
        <label for="harga_produk" class="form-label">Harga Produk:</label>
        <input type="number" id="harga_produk" name="harga" class="form-control" required>
      </div>
      
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label for="slide2" class="form-label">Gambar Utama:</label>
        <input type="file" id="slide2" name="gambar" class="form-control" accept="image/*" required>
      </div>
      <div class="mb-3">
        <label for="slide1" class="form-label">Slide Carousel 1:</label>
        <input type="file" id="slide1" name="slide1" class="form-control" accept="image/*" required>
      </div>
      <div class="mb-3">
        <label for="slide2" class="form-label">Slide Carousel 2:</label>
        <input type="file" id="slide2" name="slide2" class="form-control" accept="image/*" required>
      </div>
      <div class="mb-3">
        <label for="slide3" class="form-label">Slide Carousel 3:</label>
        <input type="file" id="slide3" name="slide3" class="form-control" accept="image/*" required>
      </div>
      <input type="submit" class="btn btn-primary" name="submit" value="Tambah">
      <a href="produk_admin.php" class="btn btn-danger">Kembali</a>

      </form>
  </div>
  <br><br>



  <?php include 'layouts/navbar(2)_layout.html' ?>


