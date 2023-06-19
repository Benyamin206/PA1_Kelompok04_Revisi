<?php 
              session_start();

              if( !isset($_SESSION["login"])){
                  header("Location: login_admin.php");
                  exit;
              }



      include 'layouts/navbar(1)_layout.html';
      require 'fungsi_admin.php';


      $id_produk = $_GET['id_produk'];

      $data_produk = ambilData("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];
      $id_kategori = $data_produk['id_kategori'];
      $nama_kategori_produk = ambilData("SELECT * FROM kategori_produk WHERE id_kategori = '$id_kategori'")[0];
      $nama_semua_kategori_produk  = ambilData("SELECT * FROM kategori_produk");
      $nama_semua_kategori_produk  = ambilData("SELECT * FROM kategori_produk WHERE id_kategori not in ('$id_kategori')");


    //   echo $id_produk;
    
      


      if(isset($_POST['submit'])){
        if(ubah($_POST) > 0){
            echo "
            <script>
        alert('Berhasil diubah');
        document.location.href = 'produk_admin.php';
    </script>
       ";
        }else{
            echo "
            <script >
            alert('Gagal diubah');
            document.location.href = 'produk_admin.php';
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
}
    #aksi_admin{
    background-color : white;
    color : #722D2D;
  }
</style>



<div class="container">
    <h1>Ubah Produk</h1>
    <form method = "POST" action = "" enctype="multipart/form-data">
    <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
    <input type="hidden" name="gambar_lama" value="<?php echo $data_produk['gambar']; ?>">
    <input type="hidden" name="SC1_lama" value="<?php echo $data_produk['SC1']; ?>">
    <input type="hidden" name="SC2_lama" value="<?php echo $data_produk['SC2']; ?>">
    <input type="hidden" name="SC3_lama" value="<?php echo $data_produk['SC3']; ?>">


        <div class="mb-3">
            <label for="namaProduk" class="form-label">Nama Produk :</label>
            <input type="text" class="form-control" id="namaProduk" placeholder="Masukkan Nama Produk" 
            value="<?php echo $data_produk['nama_produk']; ?>" name="nama_produk">
        </div>

        <div class="mb-3">
        <label for="myDropdown" class="form-label">Kategori:</label>
        <select id="myDropdown" name="id_kategori" class="form-select" required>

        <option value="<?php echo $nama_kategori_produk['id_kategori']; ?>"><?php echo $nama_kategori_produk['nama_kategori']; ?></option>

        <?php foreach($nama_semua_kategori_produk as $nskp) {?>
            <option value="<?php echo $nskp['id_kategori']; ?>"><?php echo $nskp['nama_kategori']; ?></option>
        <?php } ?>
        </select>   
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga :</label>
            <input type="number" class="form-control" id="harga" placeholder="Masukkan Harga"
            value="<?php echo $data_produk['harga_produk']; ?>" name="harga_produk" >
        </div>
        <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi :</label>
<textarea class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi" name="deskripsi"><?php echo $data_produk['deskripsi']; ?></textarea>

        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar :</label>
            <img id="gambarPreview" src="../Gambar/gambar_produk/<?= $data_produk['gambar']; ?>" alt="Gambar Utama" class="img-fluid mt-2" width=200 height=100>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="mb-3">
            <label for="slide1" class="form-label">Slide Carousel 1 :</label>
            <img id="slide1Preview" src="../Gambar/gambar_carousel/<?= $data_produk['SC1']; ?>" alt="" class="img-fluid mt-2" width=200 height=100>
            <input type="file" class="form-control" id="slide1" name="SC1">
        </div>
        <div class="mb-3">
            <label for="slide2" class="form-label">Slide Carousel 2 :</label>
            <img id="slide2Preview" src="../Gambar/gambar_carousel/<?= $data_produk['SC2']; ?>" alt="" class="img-fluid mt-2" width=200 height=100>
            <input type="file" class="form-control" id="slide2" name="SC2">
        </div>
        <div class="mb-3">
            <label for="slide3" class="form-label">Slide Carousel 3 :</label>
            <img id="slide3Preview" src="../Gambar/gambar_carousel/<?= $data_produk['SC3']; ?>" alt="" class="img-fluid mt-2" width=200 height=100>
            <input type="file" class="form-control" id="slide3" name="SC3">
        </div>
        <a href="produk_admin.php" class="btn btn-danger">Batal</a>
        <button type="submit" class="btn btn-success" name="submit">Simpan</button>
            <br> <br><br>
    </form>
</div>



<?php include 'layouts/navbar(2)_layout.html' ?>
