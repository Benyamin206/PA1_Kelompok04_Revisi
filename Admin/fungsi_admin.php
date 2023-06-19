<?php




$conn = mysqli_connect('127.0.0.1', 'root', '', 'PA1_revisi');





// Mengambil data dari tabel di database
function ambilData($query){    // ambil data dari database, dan memasukkannya ke dalam array
    global $conn;
    $data = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($data)){
        $rows[] = $row;
    }
    return $rows; 
}



// Fungsi Menambahkan Produk
// Fungsi Menambahkan Produk
function tambah($data)
{
    global $conn;

    // Mengambil data masukan form Melalui POST
    $namaProduk = htmlspecialchars($data['nama']);
    $queryCek = "SELECT * FROM produk WHERE nama_produk IN ('$namaProduk')";
    $result = mysqli_query($conn, $queryCek);
  
    if(mysqli_num_rows($result) == 1) {
                    echo " <script>
            alert('Nama produk telah ada. Carilah nama produk yang lain');
            alert('Gagal menambahkan produk');

         </script>";
         return false;
    }


    $id_kategori = htmlspecialchars($data['id_kategori']);
    $hargaProduk = htmlspecialchars($data['harga']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $namaSemuaGambar = uploadGambarKeseluruhan();

    // cek apakah namaSemuaGambar bernilai false 
    if (!$namaSemuaGambar) {
        return false;
    }

    $gambar = htmlspecialchars($namaSemuaGambar[0]);
    $SC1 = htmlspecialchars($namaSemuaGambar[1]);
    $SC2 = htmlspecialchars($namaSemuaGambar[2]);
    $SC3 = htmlspecialchars($namaSemuaGambar[3]);
    $queryInsertProduk = "INSERT INTO produk
                          VALUES ('', '$namaProduk','$id_kategori', '$hargaProduk', '$deskripsi', '$gambar',
                          '$SC1', '$SC2', '$SC3')";
    mysqli_query($conn, $queryInsertProduk);

    // menggunakan mysqli_affected_rows untuk memastikan query berhasil dijalankan
    return mysqli_affected_rows($conn);
}






// fungsi mengupload seluruh gambar
function uploadGambarKeseluruhan(){

    // seleksi
    foreach($_FILES as $fileGambar){

        // cek apakah gambarnya ada ?
        if($fileGambar['error'] === 4){
        echo " <script>
            alert('Anda belum memilih gambar atau terdapat gambar yang kosong');
         </script>";
         return false;
        }

        // mengambil ekstensi
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar      = explode('.', $fileGambar['name']);
        $ekstensiGambar      = strtolower(end($ekstensiGambar));
        
        // cek apakah ekstensi sesuai
        if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo " <script>
            alert('Inputan gambar tidak valid');
         </script>";
         return false;
        }
    }


    $indeks = 1;
    $listNamaGambar = [];  // tempat menyimpan nama - nama gambar

    // Upload
    foreach($_FILES as $fileGambar){
    if($indeks == 1){
        $gambarUtama = true;
    }else{
        $gambarUtama = false;
    }

     // mengambil ekstensi
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar      = explode('.', $fileGambar['name']);
    $ekstensiGambar      = strtolower(end($ekstensiGambar));

    $namaGambarBaru = uniqid();
    $namaGambarBaru .= '.';
    $namaGambarBaru .= $ekstensiGambar;

    // upload gambar relatif terhadap halaman ini
    if($gambarUtama == true){
        move_uploaded_file($fileGambar['tmp_name'], '../Gambar/gambar_produk/'.$namaGambarBaru);
        $listNamaGambar[] = $namaGambarBaru;
    }else if($gambarUtama == false){
        move_uploaded_file($fileGambar['tmp_name'], '../Gambar/gambar_carousel/'.$namaGambarBaru);
        $listNamaGambar[] = $namaGambarBaru;
    }
    $indeks++;
    }

    return $listNamaGambar;
}





// Ubah Produk dan Gambar Utama
function ubah($data){

    global $conn;
    // Masukkan tiap inputan dari POST ke variable
    $id_produk = $data['id_produk'];
    $nama = htmlspecialchars($data['nama_produk']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $harga = htmlspecialchars($data['harga_produk']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $gambar_lama = $data['gambar_lama'];
    $SC1_lama = $data['SC1_lama'];
    $SC2_lama = $data['SC2_lama'];
    $SC3_lama = $data['SC3_lama'];
    $gambar_produk;
    $SC1;
    $SC2;
    $SC3;

    // VALIDASI
    // validasi gambar utama
    if($_FILES['gambar']['error'] == 4){
        $gambar_produk = $gambar_lama;
    }else if($_FILES['gambar']['error'] !== 4){
        $cek = validasiGambar($_FILES['gambar']['name']);
        if($cek == false){
            return false;
        }
    }

   
     // validasi SC1
    if($_FILES['SC1']['error'] == 4){
        $SC1 = $SC1_lama;
    }else if($_FILES['SC1']['error'] !== 4){
        $cek = validasiGambar($_FILES['SC1']['name']);
        if($cek == false){
            return false;
        }
    }

    // validasi SC2
    if($_FILES['SC2']['error'] == 4){
            $SC2 = $SC2_lama;
    }else if($_FILES['SC2']['error'] !== 4){
        $cek = validasiGambar($_FILES['SC2']['name']);
        if($cek == false){
            return false;
        }
    }


    // validasi SC3
    if($_FILES['SC3']['error'] == 4){
        $SC3 = $SC3_lama;
    }else if($_FILES['SC3']['error'] !== 4){
    $cek = validasiGambar($_FILES['SC3']['name']);
    if($cek == false){
        return false;
    }
    }


    // UPLOAD 

    // upload gambar
    if($_FILES['gambar']['error'] == 4){
        $gambar_produk = $gambar_lama;
    }else if($_FILES['gambar']['error'] !== 4){
        unlink("../Gambar/gambar_produk/$gambar_lama");
        $gambar_produk = uploadGambarProduk($_FILES['gambar']['name'],$_FILES['gambar']['tmp_name']);
    }

    // upload SC1
    if($_FILES['SC1']['error'] == 4){
        $SC1 = $SC1_lama;
    }else if($_FILES['SC1']['error'] !== 4){
        unlink("../Gambar/gambar_carousel/$SC1_lama");
        $SC1 = uploadGambarCarousel($_FILES['SC1']['name'],$_FILES['SC1']['tmp_name']);
    }

    // upload SC2
    if($_FILES['SC2']['error'] == 4){
        $SC2 = $SC2_lama;
    }else if($_FILES['SC2']['error'] !== 4){
        unlink("../Gambar/gambar_carousel/$SC2_lama");
        $SC2 = uploadGambarCarousel($_FILES['SC2']['name'],$_FILES['SC2']['tmp_name']);
    }

    // upload SC3
    if($_FILES['SC3']['error'] == 4){
        $SC3 = $SC3_lama;
    }else if($_FILES['SC3']['error'] !== 4){
        unlink("../Gambar/gambar_carousel/$SC3_lama");
        $SC3 = uploadGambarCarousel($_FILES['SC3']['name'],$_FILES['SC3']['tmp_name']);
    }



    // $queryCekLaris = "SELECT * FROM produk_laris WHERE nama_produk = '$namaLama'";
    // $result = mysqli_query($conn,$queryCekLaris);

    // if(mysqli_num_rows($result) == 1){
    //     $ubahLaris = "UPDATE produk_laris
    //                   SET nama_produk = '$namaProduk'
    //                   WHERE nama_produk = '$namaLama'";
    //     mysqli_query($conn,$ubahLaris);
    // }

    

    $queryUbahProduk = "UPDATE produk
                        SET 
                        nama_produk = '$nama',
                        id_kategori = '$id_kategori',
                        harga_produk =  '$harga',
                        deskripsi = '$deskripsi',
                        gambar = '$gambar_produk',
                        SC1 = '$SC1',
                        SC2 = '$SC2',
                        SC3 = '$SC3'
                        WHERE id_produk = '$id_produk'";



    mysqli_query($conn, $queryUbahProduk);

    return mysqli_affected_rows($conn);
}




function validasiGambar($gambar){
    $nama_gambar = $gambar;

    // mengambil ekstensi
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar      = explode('.', $nama_gambar);
    $ekstensiGambar      = strtolower(end($ekstensiGambar));
        
    // cek apakah ekstensi sesuai
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo " <script>
            alert('Terdapat yang anda upload bukan gambar');
         </script>";
         return false;
        }
    return true;
}


function uploadGambarProduk($nama, $tmp){

        $nama_gambar = $nama;

         // mengambil ekstensi
         $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
         $ekstensiGambar      = explode('.', $nama_gambar);
         $ekstensiGambar      = strtolower(end($ekstensiGambar));
        
         $namaGambarBaru = uniqid();
         $namaGambarBaru .= '.';
         $namaGambarBaru .= $ekstensiGambar;

    // upload gambar relatif terhadap halaman ini
    move_uploaded_file($tmp, '../Gambar/gambar_produk/'.$namaGambarBaru);

    return $namaGambarBaru;
}


function uploadGambarCarousel($nama, $tmp){

    $nama_gambar = $nama;

     // mengambil ekstensi
     $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
     $ekstensiGambar      = explode('.', $nama_gambar);
     $ekstensiGambar      = strtolower(end($ekstensiGambar));
 
     $namaGambarBaru = uniqid();
     $namaGambarBaru .= '.';
     $namaGambarBaru .= $ekstensiGambar;

// upload gambar relatif terhadap halaman ini
move_uploaded_file($tmp, '../Gambar/gambar_carousel/'.$namaGambarBaru);

return $namaGambarBaru;
}







function hapusProdukLaris($id_produk){
    global $conn;
    $queryHapusLaris = "DELETE FROM produk_laris
                        WHERE id_produk = '$id_produk'";
    mysqli_query($conn, $queryHapusLaris);
    return mysqli_affected_rows($conn);
}



function hapusProduk($id_produk){
    global $conn;

    // Cek produk laris atau bukan
    $queryCek = "SELECT * FROM produk_laris WHERE id_produk = '$id_produk'";
    $result = mysqli_query($conn, $queryCek);

    if(mysqli_num_rows($result) == 1){
        // Hapus dari produk laris
        $queryHapusLaris = "DELETE FROM produk_laris WHERE id_produk = '$id_produk'";
        mysqli_query($conn, $queryHapusLaris);
        if(mysqli_affected_rows($conn) != 1){
            return false;
        }
    }

    $row = ambilData("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];


    $nama_gambar = $row['gambar'];
    $SC1 = $row['SC1'];
    $SC2 = $row['SC2'];
    $SC3 = $row['SC3'];

    unlink("../Gambar/gambar_produk/$nama_gambar");
    unlink("../Gambar/gambar_carousel/$SC1");
    unlink("../Gambar/gambar_carousel/$SC2");
    unlink("../Gambar/gambar_carousel/$SC3");




    // Hapus Produk
    $queryHapusProduk = "DELETE FROM produk WHERE id_produk = '$id_produk'";
    mysqli_query($conn, $queryHapusProduk);
    if(mysqli_affected_rows($conn) != 1){
        return false;
    }



    // $produk = ambilData("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];



    
    // $nama_gambar = $row['gambar'];
    // $SC1 = $row['SC1'];
    // $SC2 = $row['SC2'];
    // $SC3 = $row['SC3'];

    // unlink("../Gambar/gambar_produk/$nama_gambar");
    // unlink("../Gambar/gambar_carousel/'$SC1'");
    // unlink("../Gambar/gambar_carousel/'$SC2'");
    // unlink("../Gambar/gambar_carousel/'$SC3'");
    
    

    return  mysqli_affected_rows($conn);

}

// Mengambil data dari tabel di database










function hapusFeedback($id_ulasan){
    global $conn;
    $queryHapusUlasan = "DELETE FROM ulasan
                        WHERE id_ulasan = '$id_ulasan'";
    mysqli_query($conn, $queryHapusUlasan);
    return mysqli_affected_rows($conn);
}



function uploadGambarUlasan(){
        if($_FILES['foto']['error'] === 4){
        echo " <script>
            alert('Anda belum memilih gambar atau terdapat gambar yang kosong');
         </script>";
         return false;
        }

        // mengambil ekstensi
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar      = explode('.',$_FILES['foto']['name']);
        $ekstensiGambar      = strtolower(end($ekstensiGambar));
        
        // cek apakah ekstensi sesuai
        if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo " <script>
            alert('Inputan gambar tidak valid');
         </script>";
         return false;
        }

    $namaGambarBaru = time();
    $namaGambarBaru .= '.';
    $namaGambarBaru .= $ekstensiGambar;

    move_uploaded_file($_FILES['foto']['tmp_name'], '../Gambar/gambar_ulasan/'.$namaGambarBaru);

    return $namaGambarBaru;

}






?>