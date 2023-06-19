<?php

session_start();

if( !isset($_SESSION["login"])){
    header("Location: login_admin.php");
    exit;
}





require "fungsi_admin.php";


$id_kategori = $_GET['id_kategori'];
echo $id_kategori;

$queryCek = "SELECT * FROM produk WHERE id_kategori = '$id_kategori'";
$result = mysqli_query($conn, $queryCek);

    if(mysqli_num_rows($result) > 0){
        $queryGanti = "UPDATE produk SET id_kategori = '7' WHERE id_kategori = '$id_kategori'"; //id 7 adalah tidak punya kategori
        mysqli_query($conn, $queryGanti);

        $queryHapusKategori = "DELETE FROM kategori_produk WHERE id_kategori = '$id_kategori'";
        if(mysqli_query($conn, $queryHapusKategori)){
            echo "<script>
                alert('Kategori Berhasil Dihapus');
                document.location.href = 'kategori_produk.php';
            </script>";
        }else{
            echo "<script>
                alert('Kategori Gagal Dihapus');
                document.location.href = 'kategori_produk.php';
            </script>";
        }

}else{
            $queryHapusKategori = "DELETE FROM kategori_produk WHERE id_kategori = '$id_kategori'";
        if(mysqli_query($conn, $queryHapusKategori)){
            echo "<script>
                alert('Kategori Berhasil Dihapus');
                document.location.href = 'kategori_produk.php';
            </script>";
        }else{
            echo "<script>
                alert('Kategori Gagal Dihapus');
                document.location.href = 'kategori_produk.php';
            </script>";
        }
}








// if(hapusProduk($id_produk) > 0){
//     echo "<script>
//     alert('Produk Berhasil Dihapus');
//     document.location.href = 'produk_admin.php';

// </script>";
// } else{
//     echo "<script>
//     alert('Produk Gagal Dihapus');
//     document.location.href = 'produk_admin.php';


// </script>";
// }


?>