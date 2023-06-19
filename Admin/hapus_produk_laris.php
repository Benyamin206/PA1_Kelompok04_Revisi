<?php 


session_start();

if( !isset($_SESSION["login"])){
    header("Location: login_admin.php");
    exit;
}






require "fungsi_admin.php";
$id_produk = $_GET['id_produk'];


if(hapusProdukLaris($id_produk) > 0){
    echo "<script>
    alert('Produk Laris Berhasil Dihapus');
    document.location.href = 'produk_laris.php';
</script>";
} else{
    echo "<script>
    alert('Produk Laris Gagal Dihapus');
    document.location.href = 'produk_laris.php';
</script>";
}








?>