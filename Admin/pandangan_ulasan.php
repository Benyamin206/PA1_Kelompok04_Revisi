<?php 

      session_start();

      if( !isset($_SESSION["login"])){
          header("Location: login_admin.php");
          exit;
      }

require "fungsi_admin.php";

if ($_GET['id_ulasan']) {
	$id_ulasan = $_GET['id_ulasan'];


	$data_ulasan = ambilData("SELECT * FROM ulasan WHERE id_ulasan = '$id_ulasan'")[0];

	// echo $data_ulasan['pandangan'];	
	$waktu = $data_ulasan['waktu'];
	$pandangan = $data_ulasan['pandangan'];

	if($pandangan == 1){
		$queryUbah = "UPDATE ulasan SET pandangan = '0', waktu = '$waktu' WHERE id_ulasan = '$id_ulasan'";
		mysqli_query($conn, $queryUbah);
		echo "<script>
		alert('ulasan berhasil disembunyikan dari halaman website');
		document.location.href = 'ulasan_admin.php';
		</script>";
		exit;
	}else{
		$queryUbah = "UPDATE ulasan SET pandangan = '1', waktu = '$waktu' WHERE id_ulasan = '$id_ulasan'";
		mysqli_query($conn, $queryUbah);
		echo "<script>
		alert('ulasan berhasil ditampilkan dari halaman website');
		document.location.href = 'ulasan_admin.php';
		</script>";
		exit;
	}
}


 ?>