-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2023 pada 20.38
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pa1_revisi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_`
--

CREATE TABLE `admin_` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(100) DEFAULT NULL,
  `password_admin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_`
--

INSERT INTO `admin_` (`id_admin`, `username_admin`, `password_admin`) VALUES
(1, 'admin', 'admin12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`) VALUES
(2, 'songket'),
(3, 'sortali'),
(7, 'tidak punya kategori'),
(16, 'ulos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga_produk` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `SC1` text DEFAULT NULL,
  `SC2` text DEFAULT NULL,
  `SC3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga_produk`, `deskripsi`, `gambar`, `SC1`, `SC2`, `SC3`) VALUES
(34, 'Ragi Hotang', 3, '130000', 'Ulos ini ulos wajib yang diproduksi atau dipakai didalam adat pernikahan. Ulos ini merupakan ulos hande-hande pria atau ulos pengantin yang dipakai oleh pria. Ulos ini memiliki ragam harga dan rupa. Ulos ini berada pada kisaran harga Rp 130.000,00 sampai dengan jutaan.\r\nUntuk selengkapnya, produk ini dapat Anda lihat melalui video. Berikut adalah link videonya https://youtu.be/T1uQao4Qluo\r\n', '648560505f1e1.jpg', '648560505f809.jpg', '648560505fe4c.jpg', '648560506023b.jpg'),
(35, 'Bintang Maratur', 16, '1450000', 'Ulos ini disebut juga dengan tenun pangan meat atau tenun pangan Toba. Ulos Bintang Maratur ini memiliki ukuran yang kecil, karena ulos ini biasanya digunakan untuk pahompu atau ulos untuk anak yang baru lahir, cucu tardidi atau cucu naik sidi. Ulos ini biasanya diberikan pada anak laki-laki, karena anak laki-laki yang menjadi pemimpin sehingga dia dapat mengatur semua. Ulos ini memiliki harga Rp 1.450.000,00.\r\n\r\nBerikut adalah link video untuk produk ini : https://www.youtube.com/watch?v=4NdrFxT9qIY&amp;pp=ygUeZWxpemFiZXRoIHVsb3MgYmludGFuZyBtYXJhdHVy', '6485608b184ae.jpg', '6485608b18c17.jpg', '6485608b18ee5.jpg', '6485608b190b8.jpg'),
(36, 'Mangiring', 16, '500000', 'Ulos Mangiring memiliki fungsi yang hamper sama dengan Ulos Bingtang Maratur. Ulos ini digunakan untuk anak 7 bulanan, anak yang baru lahir, anak yang tardidi, anak naik sidi, mengangkat anak dan juga memberi marga pada anak. Ulos ini biasanya diberikan pada anak perempuan untuk mengiring-iring jalan. Ulos ini memiliki ukuran yang kecil pula.\r\nUlos ini memiliki kisaran harga Rp 450.000 sampai dengan Rp 650.000, 00.\r\n\r\nBerikut adalah link video untuk melihat produk lebih jelas lagi : https://www.youtube.com/watch?v=sfdgQviOB8Y&amp;pp=ygUYZWxpemFiZXRoIHVsb3MgbWFuZ2lyaW5n', '648560d69df8b.jpg', '648560d69e442.jpg', '648560d69ec48.jpg', '648560d69f0ec.jpg'),
(37, 'Simarinjam sisi', 7, '2200000', 'Ulos ini memiliki ukuran yang lebar karena ditenun dua kali pada sisi kiri dan kanan. Yang kemudian sisi kiri dan kanan tersebut akan digabung menjadi 1 ulos. Ulos ini merupakan salah satu ulos yang sangat langka. Ulos ini biasanya dicari untuk orang-orang pintar atau orang yang sedang mencari ilmu. Pada zaman dahulu ulos ini digunakan untuk selimut atau gobar. Ulos ini memiliki kisaran harga Rp 2.200.000,00.\r\nBerikut adalah link video untuk produk ini : https://youtu.be/tqIiePVRjiI', '6485610f01b3b.jpg', '6485610f020ed.jpg', '6485610f0233f.jpg', '6485610f025fd.jpg'),
(38, 'Ragi Huting', 2, '777000', 'Ulos ini digunakan untuk anak gadis atau gadis perawan. Namun ulos ini sudah jarang dipakai khusus pada gadis perawan. Ulos ini sekarang sudah diaplikasikan untuk setelan sarung dan setelan.\r\nBerikut link video untuk melihat produk lebih jelas lagi : https://youtu.be/L9Vdt46tthY', '6485617265f0d.jpg', '648561726637a.jpg', '648561726668e.jpg', '64856172669a4.jpg'),
(39, 'Lobu-lobu', 7, '600000', 'Ulos ini memiliki bentuk menyatu. Cara pemakaian ulos ini adalah dengan memasukkan sepasang suami isteri kedalam satu ulos. Ulos ini biasanya dicari orang tua untuk diberikan kepada anak perempuannya yang sudah menikah bebearapa tahun namun belum memiliki keturunan. Ulos Lobu-lobu ini diberikan sebagai lambang doa, dan untuk harga ulos ini adalah Rp.600.000.\r\nBerikut adalah link video untuk produk : https://youtu.be/qqRcUkxpngA', '648561a862f07.jpg', '648561a8634e2.jpg', '648561a863860.jpg', '1687198527.jpg'),
(40, 'Lima Hasta', 16, '500000', 'Ulos ini mempunyai dua jenis motif, yaitu silima hasta dan si pitung hasta. Perbedaan keduanya terletak pada ukuran dan jumlah garis - garis yang terdapat pada ulosnya.\r\nFungsi ulos ini adalah untuk diberikan kepada anak laki laki atau anak perempuan ketika akan pergi ke perantauan. Ulos ini diberikan disertakan dengan doa agar anak yang akan pergi ke perantauan agar anak tersebut berhasil sukses dan sehat - sehat. Harga ulos ini adalah Rp.500.000,00.', '648561d3edde2.jpg', '648561d3ee219.jpg', '648561d3ee4d5.jpg', '648561d3ee74f.jpg'),
(41, 'Sitolu Tuho', 16, '750000', 'Ulos ini memiliki motif yang mirip dengan Si bolang. Ulos ini biasanya diberikan kepada anak laki laki atau anak perempuan yang meninggal di usia yang sangat muda. (biasanya usia 12 tahun ke bawah). Harganya adalah Rp.750.000,00.', '6485621048e14.jpg', '64856210492be.jpg', '64856210496d2.jpg', '6485621049a11.jpg'),
(42, 'Harungguan', 16, '2300000', 'Ulos Harungguan ini dibentuk dari ribuan benang. Jenis benang yang digunakan yakni benang 100. Setiap motif dalam ulos Harungguan memiliki jumlah benang masing-masing.\r\nUlos ini mendapat sebutan sebagai rajanya ulos.  Sebutan tersebut dikarenakan dalam selembar ulos harungguan terdapat beberapa motif ulos batak, seperti Sibolang, Ragi Hotang, Mangiring, Bolean, Bintang Maratur, Suri suri ganjang.\r\nUntuk melihat produk lebih jelas, berikut adalah link video untuk produk ini : https://www.youtube.com/watch?v=50-TyyJRZHQ&amp;pp=ygUZZWxpemFiZXRoIHVsb3MgaGFydW5nZ3Vhbg%3D%3D', '6485628346e90.jpg', '648562834753b.jpg', '64856283479f7.jpg', '6485628347ee7.jpg'),
(43, 'Runjat', 16, '2000000', 'Ulos runjat biasanya digunakan oleh ibu-ibu orang batak sebagai ikat kepala/ sering disebut hande-hande ulos ini juga jarang dipakai oleh orang batak dikarenakan juga harganya yang termasuk mahal, untuk harga ulos ini adalah Rp.2.000.000.', '648db811ba382.jpg', '648562b3c2414.jpg', '648562b3c278a.jpg', '649089c241c6b.jpg'),
(44, 'Pinuncaan', 16, '3000000', 'Ulos ini merupakan ulos paling sering dicari orang dan wajib ada dipesta pernikahan adat Batak karena ulos ini disebut juga dengan ulos passamot.Untuk satu lembar ulos ini dilakukan tiga kali penenunan. Satu dilekukan untuk menenun kepala ulos, satu digunkana menenun tonga ulos dan satu lagi untuk kiri kanan ulos.Ulos ini biasanya digunakan oleh Bapak-bapak yang telah menikahkan anak laki-lakinya. Ulos ini juga dipakai ketika seorang Bapak telah meninggal dunia.Ulos ini memiliki harga Rp. 3.000.000,00.', '648562de84403.jpg', '648562de8471c.jpg', '648562de848e8.jpg', '648562de84aa9.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_laris`
--

CREATE TABLE `produk_laris` (
  `id_produk_laris` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_laris`
--

INSERT INTO `produk_laris` (`id_produk_laris`, `id_produk`) VALUES
(55, 34),
(53, 37),
(49, 38),
(54, 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_owner`
--

CREATE TABLE `profil_owner` (
  `id_profil_owner` int(11) NOT NULL,
  `nomor_wa` varchar(100) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `tiktok` text DEFAULT NULL,
  `youtube` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil_owner`
--

INSERT INTO `profil_owner` (`id_profil_owner`, `nomor_wa`, `email`, `facebook`, `instagram`, `tiktok`, `youtube`) VALUES
(1, '085277669222', 'ElizabethUlos@gmail.com', 'https://web.facebook.com/elizabethulosbatak/?locale=id_ID&_rdc=1&_rdr', 'https://www.instagram.com/elizabethulosbatak/', 'https://www.tiktok.com/@elizabethulos?_t=8cxSKND2ysT&_r=1', 'https://www.youtube.com/results?search_query=elizabeth+ulos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `email_pengirim` varchar(100) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `pandangan` varchar(100) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `nama_pengirim`, `email_pengirim`, `waktu`, `isi`, `gambar`, `pandangan`) VALUES
(11, 'Mark Ambarita', 'mark190623@gmail.com', '2023-06-18 23:09:15', 'Saya sangat menyukai produknya. Pengiriman juga cepat. \r\nInformasi mengenai produk juga jelas pada website sehingga memudahkan pembeli.', '1687129755.jpg', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_`
--
ALTER TABLE `admin_`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `nama_produk` (`nama_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `produk_laris`
--
ALTER TABLE `produk_laris`
  ADD PRIMARY KEY (`id_produk_laris`),
  ADD UNIQUE KEY `produk_laris` (`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `profil_owner`
--
ALTER TABLE `profil_owner`
  ADD PRIMARY KEY (`id_profil_owner`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_`
--
ALTER TABLE `admin_`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `produk_laris`
--
ALTER TABLE `produk_laris`
  MODIFY `id_produk_laris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `profil_owner`
--
ALTER TABLE `profil_owner`
  MODIFY `id_profil_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_produk` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `produk_laris`
--
ALTER TABLE `produk_laris`
  ADD CONSTRAINT `produk_laris_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
