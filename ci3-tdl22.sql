-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table ci3-tdl22.article
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(128) DEFAULT NULL,
  `slug` varchar(128) NOT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(128) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `penulis` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.article: ~3 rows (approximately)
INSERT INTO `article` (`id`, `judul`, `slug`, `isi`, `gambar`, `tanggal`, `penulis`) VALUES
	(10, 'Jersey Sizechart Update', 'jersey-sizechart-update', 'Jersey Sizechart Update', 'flyer3-tdl22.png', '2022-07-30', 'Hadi Santosoo'),
	(11, 'Update Data Peserta', 'update-data-peserta', 'Update Data Peserta Tour de Loksado 2022', 'updatepeserta.jpg', '2022-07-30', 'Hadi Santosoo'),
	(15, 'Informasi Pembayaran', 'informasi-pembayaran', 'Informasi pembayaran asuransi dan jersey untuk pesepeda Tour de Loksado 2022', 'flyer2-tdl22.png', '2022-07-30', 'Hadi Santosoo');

-- Dumping structure for table ci3-tdl22.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori` int(1) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `umur_kategori` varchar(128) NOT NULL,
  `gambar_kategori` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nama_kategori` (`nama_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.category: ~8 rows (approximately)
INSERT INTO `category` (`id`, `kode_kategori`, `nama_kategori`, `umur_kategori`, `gambar_kategori`) VALUES
	(2, 1, 'Woman Open', '&gt;17 Tahun', 'womanopen.png'),
	(3, 2, 'Man Junior', '16 s/d 18 Tahun', 'manjunior.png'),
	(4, 3, 'Man Elite', '19 s/d 30 Tahun', 'manelite.png'),
	(5, 4, 'Man Master A', '31 s/d 40 Tahun', 'manmastera.png'),
	(6, 5, 'Man Master B', '41 s/d 46 Tahun', 'manmasterb.png'),
	(7, 6, 'Man Master C', '&gt;47 Tahun', 'manmasterc.png'),
	(8, 7, 'Uncategorize', '-', 'uncategorize.png'),
	(9, 8, ' *', ' ', ' ');

-- Dumping structure for view ci3-tdl22.category_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `category_view` (
	`id` INT(11) NOT NULL,
	`kode_kategori` INT(1) NOT NULL,
	`nama_kategori` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`umur_kategori` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`gambar_kategori` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`jlh` BIGINT(21) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view ci3-tdl22.count_cyclist_per_category_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `count_cyclist_per_category_view` (
	`jlh` BIGINT(21) NOT NULL,
	`kode_kategori` VARCHAR(1) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view ci3-tdl22.count_cyclist_per_date_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `count_cyclist_per_date_view` (
	`jlh_dftr_perhari` BIGINT(21) NOT NULL,
	`tanggal_daftar` DATE NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view ci3-tdl22.count_cyclist_per_jersey_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `count_cyclist_per_jersey_view` (
	`jlh` BIGINT(21) NOT NULL,
	`ukuran_jersey` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view ci3-tdl22.count_cyclist_per_province_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `count_cyclist_per_province_view` (
	`jlh` BIGINT(21) NOT NULL,
	`nama_provinsi` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view ci3-tdl22.count_cyclist_per_zone_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `count_cyclist_per_zone_view` (
	`jlh` BIGINT(21) NOT NULL,
	`kode_asaldaerah` VARCHAR(1) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table ci3-tdl22.cyclist
CREATE TABLE IF NOT EXISTS `cyclist` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `no_identitas` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.cyclist: ~20 rows (approximately)
INSERT INTO `cyclist` (`id`, `no_identitas`, `nama`, `username`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `telp`, `email`, `foto`, `tanggal_daftar`) VALUES
	(1, '6372050505820008', 'Mailan', 'mailan', '1982-05-05', 'Laki-Laki', 'Jl.Jeruk Komplek Graha Mega 1 Blok C 7 Rt/Rw 029/007 Sungai Ulin Banjarbaru Utara, Banjarbaru Kalsel', '08135111117', 't4ya_mailan@yahoo.co.id', '1.jpg', '2022-08-03'),
	(2, '6371050507730006', 'Wirro', 'wirro', '1973-07-05', 'Laki-Laki  ', 'Jl Sultan Adam Komp Mandiri Lestari Iv Blok C1 No.14 Rt.37 Kel. Surgi Mufti 70122 Banjarmasin Kal-Sel ', '08125137777', 'wirro7@gmail.com', '2.jpg', '2022-08-03'),
	(3, '6371012003790006', 'Roni Fauzie', 'roni-fauzie', '1978-03-20', 'Laki-Laki  ', 'Jalan Krisna 7 No 14 Rt 21 Beruntung Jaya', '081348346113', 'roni.fauzie45@gmail.com', '3.jpg', '2022-08-04'),
	(4, '6210022311730003', 'Didik Fatkurrohman', 'didik-fatkurrohman', '1973-11-23', 'Laki-Laki  ', 'Perum Langkai Permai Ii No.07_x000D_\nJl. Rta Milono Km 7_x000D_\nPalangkaraya', '081332164637', 'didi.ppk@gmail.com', '4.jpg', '2022-08-04'),
	(5, '6371050905810004', 'Muhammad Hijrah Saputra', 'muhammad-hijrah-saputra', '1981-05-09', 'Laki-Laki  ', 'Jl A.Yani Km 6 No 15 Rt 08 Kelurahan Pemurus Dalam Kecamatan Banjarmasin Selatan', '085332003333', 'hijrahsaputra2012@gmail.com', '5.jpg', '2022-08-04'),
	(6, '6371050806820003', 'Fery Susanto', 'fery-susanto', '1982-06-08', 'Laki-Laki  ', 'Komp. Mustika Graha Asri Jl. Mustika Xii No.20 Rt.11 Loktabat Utara Banjarbaru', '082255486082', 'fery.susanto.ahmad@gmail.com', '6.jpg', '2022-08-04'),
	(7, '6303021506020002', 'Muhammad Adetya Dharma', 'muhammad-adetya-dharma', '2002-06-15', 'Laki-Laki  ', 'Jl.Mahligai No.13 Rt.15 Rw.02', '083155736686', 'aditya.ma33@gmail.com', '7.jpg', '2022-08-05'),
	(8, '6371051909890008', 'Md.Syarief Rahman', 'mdsyarief-rahman', '1989-09-19', 'Laki-Laki  ', 'Jalan Meratus Gang 3 Telaga Rt 13 No 15', '085349843320', 'syariefrahman75@gmail.com', '8.jpg', '2022-08-06'),
	(9, '6305040704920001', 'Akhmad Afrianda Rezkie', 'akhmad-afrianda-rezkie', '1992-04-07', 'Laki-Laki  ', 'Komp. Ady Jaya 2 Blok K. 11 Kec. Bungur Kab. Tapin', '082213777277', 'afrianda7@gmail.com', '9.jpg', '2022-08-06'),
	(10, '6472022510870005', 'Lilik Setiawan', 'lilik-setiawan', '1987-10-25', 'Laki-Laki  ', 'Palangkaraya ', '085226233862', 'odnamokreider87@gmail.com ', '10.jpg', '2022-08-06'),
	(11, '6303050210790009', 'Iwan Athoy', 'iwan-athoy', '1979-10-02', 'Laki-Laki  ', 'Jln. Perambaian3 Komplek Graha Alam Lestari1', '0816208180', 'iwan.athoillah@gmail.com', '11.jpg', '2022-08-06'),
	(12, '6309041603850004', 'Arief Irwan Mulyandi', 'arief-irwan-mulyandi', '1985-03-16', 'Laki-Laki  ', 'Jl Pangeran Antasari No.62 Tanjung Tabalong Kalimantan Selatan', '081348489988', 'arief.site@gmail.com', '12.jpg', '2022-08-06'),
	(13, '3674012112870003', 'Aditya Gana', 'aditya-gana', '1987-12-21', 'Laki-Laki  ', 'Jl. Dahlia Kebun Sayur Komplek Kenanga No. 9A', '08115672112', 'aditya.gana.bm@gmail.com', '13.jpg', '2022-08-06'),
	(14, '6305031506870002', 'Wawan Setiawan', 'wawan-setiawan', '1987-06-15', 'Laki-Laki  ', 'Jl. Jend. Sudirman Komp Ady Jaya 2 Blok D Kab. Tapin', '081251398844', 'wa2n87@gmail.com', '14.jpg', '2022-08-07'),
	(15, '6471021510860002', 'Yunan M', 'yunan-m', '1986-10-15', 'Laki-Laki  ', 'Jl. Sultan Adam Komplek Taekwondo Permai Jalur 15 ', '08115031767', 'yunan.y2a@gmail.com ', '15.jpg', '2022-08-07'),
	(16, '6371042508870007', 'M Haris Afdilah', 'm-haris-afdilah', '1987-08-25', 'Laki-Laki  ', 'Jl Melati Indah Komplek Al Banjary No E56', '085248717188', 'assyura90@gmail.com', '16.jpg', '2022-08-07'),
	(17, '6213012303850003', 'Renaldo Ariai Panauhan', 'renaldo-ariai-panauhan', '1985-03-23', 'Laki-Laki  ', 'Jl. Nanasarunai, Tamiang Layang', '081333837584', 'nando.smk@gmail.com', '17.jpg', '2022-08-08'),
	(18, '6303031510870002', 'Viqri Ahmad Reza', 'viqri-ahmad-reza', '1987-10-15', 'Laki-Laki  ', 'Jl.Banjar Indah V No.70 Rt.10 Pemurus Dalam Banjarmasin', '087841605048', 'viqri.reza@gmail.com ', '18.jpg', '2022-08-08'),
	(19, '6372025708800001', 'Rieriens', 'rieriens', '1980-08-17', 'Perempuan  ', 'Jln Soeratno Komplek Griya Manunggal Nomor C02 Guntung Payung Banjarbaru Kalimantan Selatan ', '085348317979', 'aliffirdaus7154@gmail.com ', '19.jpg', '2022-08-08'),
	(20, '6371041003900004', 'Riza Pahlivi', 'riza-pahlivi', '1990-03-10', 'Laki-Laki  ', 'Jl. Malkon Temon Rt.23 No.23', '085654812111', 'pahlivvi@gmail.com', '20.jpg', '2022-08-08'),
	(21, '6371011508000015', 'Hadi Santoso', 'hadi-santoso', '2000-08-15', 'Laki-laki', 'Jl Trans Kalimantan ', '089531488567', 'hadisantoso@gmail.com', 'pasfoto-redbg_ss6.png', '2022-08-13'),
	(22, '1212121212121212', 'Tes Daftar', 'tes-daftar', '2000-12-12', 'Laki-laki', 'Jl Pramuka', '330330', 'tesja@gmail.com', '', '2022-08-13'),
	(23, '3209211212121233', 'Syamsul', 'syamsul', '2000-12-12', 'Laki-laki', 'Jl Trans Kalimantan ', '089531488567', 'syamsul@gmail.com', 'zoro14.jpg', '2022-08-16'),
	(24, '1234512345123456', 'Farid Fuady', 'farid-fuady', '2022-08-15', 'Laki-laki', 'Jl Pramuka', '089523241209', 'faridfuady@gmail.com', 'pasfoto-redbg_ss7.png', '2022-08-16'),
	(25, '1122112211221122', 'Roronoa Zoro', 'roronoa-zoro', '2022-10-25', 'Laki-laki', 'Jl Trans Kalimantan', '09932', 'roronoazoro@gmail.com', '2022_05_14_monkey-d-luffy-gear5th-model-nika-203148609.png', '2022-10-25'),
	(26, '6372011609000016', 'Reza Fikri', 'reza-fikri', '2000-09-16', 'Laki-laki', 'Jl Belitung', '089631298678', 'rezafikri@gmail.com', 'pasfoto-redbg_ss8.png', '2022-10-25'),
	(27, '6375011508000015', 'Eko Prasetyo', 'eko-prasetyo', '2000-09-15', 'Laki-laki', 'Jl Gatot Subroto', '089541599567', 'ekoprasetyo@gmail.com', 'pasfoto-redbg_ss9.png', '2022-10-25');

-- Dumping structure for table ci3-tdl22.cyclist_category
CREATE TABLE IF NOT EXISTS `cyclist_category` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `challenge_kom` varchar(20) NOT NULL,
  `kode_kategori` varchar(1) NOT NULL,
  `bamboo_rafting` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_kom` (`kode_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.cyclist_category: ~24 rows (approximately)
INSERT INTO `cyclist_category` (`id`, `challenge_kom`, `kode_kategori`, `bamboo_rafting`) VALUES
	(1, 'Ya', '5', 'Ya'),
	(2, 'Ya', '6', 'Ya'),
	(3, 'Ya', '5', 'Tidak'),
	(4, 'Ya', '3', 'Tidak'),
	(5, 'Ya', '3', 'Ya'),
	(6, 'Ya', '4', 'Ya'),
	(7, 'Ya', '2', 'Ya'),
	(8, 'Ya', '4', 'Tidak'),
	(9, 'Ya', '2', 'Ya'),
	(10, 'Tidak', '7', 'Ya'),
	(11, 'Ya', '5', 'Tidak'),
	(12, 'Ya', '4', 'Ya'),
	(13, 'Ya', '5', 'Ya'),
	(14, 'Ya', '4', 'Ya'),
	(15, 'Tidak', '7', 'Tidak'),
	(16, 'Ya', '3', 'Ya'),
	(17, 'Ya', '4', 'Ya'),
	(18, 'Ya', '4', 'Ya'),
	(19, 'Ya', '1', 'Tidak'),
	(20, 'Tidak', '7', 'Tidak'),
	(21, 'Ya', '3', 'Ya'),
	(22, '', '8', ''),
	(23, 'Ya', '1', 'Ya'),
	(24, 'Ya', '3', 'Ya'),
	(25, '', '8', ''),
	(26, '', '8', ''),
	(27, '', '8', '');

-- Dumping structure for view ci3-tdl22.cyclist_category_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `cyclist_category_view` (
	`id` INT(3) NOT NULL,
	`nama` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`challenge_kom` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`kode_kategori` VARCHAR(1) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_kategori` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`bamboo_rafting` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view ci3-tdl22.cyclist_detail_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `cyclist_detail_view` (
	`id` INT(3) NOT NULL,
	`no_identitas` VARCHAR(16) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`username` VARCHAR(128) NULL COLLATE 'utf8mb4_general_ci',
	`tanggal_lahir` DATE NOT NULL,
	`jenis_kelamin` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`alamat` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`telp` VARCHAR(15) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`foto` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`tanggal_daftar` DATE NOT NULL,
	`challenge_kom` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_kategori` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`bamboo_rafting` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_asaldaerah` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_provinsi` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`jenis_transportasi` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`bayar_asuransi` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status_bayar_asuransi` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`beli_jersey` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`bayar_jersey` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`ukuran_jersey` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status_bayar_jersey` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view ci3-tdl22.cyclist_evacuate_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `cyclist_evacuate_view` (
	`id` INT(3) NOT NULL,
	`nama` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_kategori` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status_pesepeda` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`level_kecelakaan` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`kecelakaan` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table ci3-tdl22.cyclist_feedback
CREATE TABLE IF NOT EXISTS `cyclist_feedback` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nilai` varchar(128) NOT NULL,
  `komentar` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.cyclist_feedback: ~12 rows (approximately)
INSERT INTO `cyclist_feedback` (`id`, `nilai`, `komentar`) VALUES
	(1, 'Cukup', 'Pelaksanaan event sudah cukup baik'),
	(2, 'Baik', 'Sudah Baik'),
	(3, 'Tidak Baik', 'Pelaksnaan event kurang baik'),
	(4, 'Baik', 'Pelaksanaan event sudah baik'),
	(5, 'Sangat Baik', 'Pelaksanaan event sudah sangat baik'),
	(6, 'Sangat Tidak Baik', 'Pelaksanaan event sangat tidak baik'),
	(7, 'Sangat Tidak Baik', 'Pelaksanaan event sangat tidak baik'),
	(8, 'Cukup', 'Pelaksanaan event sudah cukup baik'),
	(9, 'Cukup', 'Pelaksanaan event sudah cukup baik'),
	(10, 'Baik', 'Pelaksanaan event sudah baik'),
	(16, 'Sangat Baik', 'Pelaksanaan event sudah sangat baik'),
	(27, '', '-');

-- Dumping structure for view ci3-tdl22.cyclist_feedback_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `cyclist_feedback_view` (
	`id` INT(3) NOT NULL,
	`nama` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nilai` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`komentar` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table ci3-tdl22.cyclist_incident
CREATE TABLE IF NOT EXISTS `cyclist_incident` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `level_kecelakaan` varchar(128) NOT NULL,
  `kecelakaan` varchar(128) NOT NULL,
  `status_pesepeda` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.cyclist_incident: ~20 rows (approximately)
INSERT INTO `cyclist_incident` (`id`, `level_kecelakaan`, `kecelakaan`, `status_pesepeda`) VALUES
	(1, 'Aman', 'Tidak Ada', 'Lanjut Bersepeda'),
	(2, 'Ringan', 'Kelelahan', 'Lanjut Bersepeda'),
	(3, 'Aman', 'Tidak Ada', 'Lanjut Bersepeda'),
	(4, 'Sedang', 'Kaki Keram', 'Dievakuasi'),
	(5, 'Sedang', 'Terjatuh', 'Dievakuasi'),
	(6, 'Aman', 'Tidak Ada', 'Lanjut Bersepeda'),
	(7, 'Berat', 'Tertabrak Trotoar', 'Dievakuasi'),
	(8, 'Aman', 'Tidak Ada', 'Lanjut Bersepeda'),
	(9, 'Aman', 'Tidak Ada', 'Lanjut Bersepeda'),
	(10, 'Berat', 'Kelelahan dan Pingsan', 'Dievakuasi'),
	(11, 'Sedang', 'Terjatuh', 'Dievakuasi'),
	(12, 'Aman', 'Tidak Ada', 'Lanjut Bersepeda'),
	(13, 'Sedang', 'Kaki Keram', 'Dievakuasi'),
	(14, 'Aman', 'Tidak Ada', 'Lanjut Bersepeda'),
	(15, 'Aman', 'Tidak Ada', 'Lanjut Bersepeda'),
	(16, 'Ringan', 'Ban Bocor', 'Dievakuasi'),
	(17, 'Sedang', 'Kaki Keram', 'Dievakuasi'),
	(18, 'Sedang', 'Kaki Keram', 'Dievakuasi'),
	(19, 'Aman', 'Tidak Ada', 'Lanjut Bersepeda'),
	(20, 'Aman', 'Tidak Ada', 'Lanjut Bersepeda'),
	(21, '', '-', ''),
	(22, '', '-', ''),
	(23, '', '-', ''),
	(24, '', '-', ''),
	(25, '', '-', ''),
	(26, '', '-', ''),
	(27, '', '-', '');

-- Dumping structure for view ci3-tdl22.cyclist_incident_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `cyclist_incident_view` (
	`id` INT(3) NOT NULL,
	`nama` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`level_kecelakaan` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`kecelakaan` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status_pesepeda` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table ci3-tdl22.cyclist_payment
CREATE TABLE IF NOT EXISTS `cyclist_payment` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `bayar_asuransi` varchar(128) NOT NULL,
  `status_bayar_asuransi` varchar(128) NOT NULL,
  `beli_jersey` varchar(128) NOT NULL,
  `ukuran_jersey` varchar(128) NOT NULL,
  `bayar_jersey` varchar(128) NOT NULL,
  `status_bayar_jersey` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.cyclist_payment: ~24 rows (approximately)
INSERT INTO `cyclist_payment` (`id`, `bayar_asuransi`, `status_bayar_asuransi`, `beli_jersey`, `ukuran_jersey`, `bayar_jersey`, `status_bayar_jersey`) VALUES
	(1, 'a1.jpg', 'Accepted', 'Ya', 'L', 'j1.jpg', 'Accepted'),
	(2, 'a2.jpg', 'Accepted', 'Ya', 'XL', 'j2.jpg', 'Accepted'),
	(3, 'a3.jpg', 'Accepted', 'Ya', 'XXL', 'j3.jpg', 'Accepted'),
	(4, 'a4.jpg', 'Accepted', 'Tidak', '-', 'nobukti.jpg', 'Accepted'),
	(5, 'a5.jpg', 'Accepted', 'Tidak', '-', 'nobukti.jpg', 'Accepted'),
	(6, 'a6.jpg', 'Accepted', 'Ya', 'M', 'j6.jpg', 'Accepted'),
	(7, 'a7.jpg', 'Accepted', 'Tidak', '-', 'nobukti.jpg', 'Accepted'),
	(8, 'a8.jpg', 'Accepted', 'Ya', 'S', 'j8.jpg', 'Accepted'),
	(9, 'a9.jpg', 'Accepted', 'Ya', 'M', 'j9.jpg', 'Accepted'),
	(10, 'a10.jpg', 'Accepted', 'Ya', 'M', 'j10.jpg', 'Accepted'),
	(11, 'a11.jpg', 'Accepted', 'Ya', 'L', 'j11.jpg', 'Accepted'),
	(12, 'a12.jpg', 'Accepted', 'Tidak', '-', 'nobukti.jpg', 'Accepted'),
	(13, 'a13.jpg', 'Accepted', 'Tidak', '-', 'nobukti.jpg', 'Accepted'),
	(14, 'a14.jpg', 'Accepted', 'Ya', 'XXL', 'j14.jpg', 'Accepted'),
	(15, 'a15.jpg', 'Accepted', 'Tidak', '-', 'nobukti.jpg', 'Accepted'),
	(16, 'a16.jpg', 'Pending', 'Ya', 'L', 'j16.jpg', 'Accepted'),
	(17, 'a17.jpg', 'Accepted', 'Ya', 'XL', 'j17.jpg', 'Accepted'),
	(18, 'a18.jpg', 'Accepted', 'Ya', 'XS', 'j18.jpg', 'Accepted'),
	(19, 'a19.jpg', 'Accepted', 'Ya', 'XS', 'j19.jpg', 'Accepted'),
	(20, 'a20.jpg', 'Accepted', 'Ya', 'S', 'j20.jpg', 'Accepted'),
	(21, 'activity_diagram_drawio.png', 'Pending', 'Ya', 'XS', 'Web_capture_27-7-2022_191341_localhost.jpg', 'Pending'),
	(22, '2022_05_14_monkey-d-luffy-gear5th-model-nika-20314860.png', 'Pending', 'Tidak', '-', 'nobukti.jpg', 'Pending'),
	(23, 'activity_diagram_drawio1.png', 'Accepted', 'Ya', 'XS', 'Web_capture_27-7-2022_191341_localhost.jpg', 'Rejected'),
	(24, '3_Wirro_MMC.png', 'Accepted', 'Ya', 'M', '15_Wawan_Setiawan.jpeg', 'Accepted'),
	(25, 'nobukti.jpg', 'Not Uploaded', '', '*', 'nobukti.jpg', 'Not Uploaded'),
	(26, 'nobukti.jpg', 'Not Uploaded', '', '*', 'nobukti.jpg', 'Not Uploaded'),
	(27, 'nobukti.jpg', 'Not Uploaded', '', '*', 'nobukti.jpg', 'Not Uploaded');

-- Dumping structure for view ci3-tdl22.cyclist_payment_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `cyclist_payment_view` (
	`id` INT(3) NOT NULL,
	`nama` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`bayar_asuransi` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status_bayar_asuransi` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`beli_jersey` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`bayar_jersey` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`ukuran_jersey` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status_bayar_jersey` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table ci3-tdl22.cyclist_winner
CREATE TABLE IF NOT EXISTS `cyclist_winner` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `urutan_finish` int(3) NOT NULL,
  `jam` varchar(2) NOT NULL,
  `menit` varchar(2) NOT NULL,
  `detik` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.cyclist_winner: ~21 rows (approximately)
INSERT INTO `cyclist_winner` (`id`, `urutan_finish`, `jam`, `menit`, `detik`) VALUES
	(1, 1, '00', '55', '03'),
	(2, 3, '00', '58', '32'),
	(3, 4, '01', '00', '13'),
	(4, 0, '00', '00', '00'),
	(5, 0, '00', '00', '00'),
	(6, 8, '01', '07', '09'),
	(7, 0, '00', '00', '00'),
	(8, 2, '00', '56', '02'),
	(9, 5, '01', '01', '45'),
	(10, 0, '00', '00', '00'),
	(11, 0, '00', '00', '00'),
	(12, 6, '01', '03', '36'),
	(13, 0, '00', '00', '00'),
	(14, 7, '01', '04', '28'),
	(15, 10, '01', '12', '16'),
	(16, 0, '00', '00', '00'),
	(17, 0, '00', '00', '00'),
	(18, 0, '00', '00', '00'),
	(19, 9, '01', '10', '22'),
	(20, 11, '01', '17', '21'),
	(21, 0, '00', '00', '00'),
	(22, 0, '00', '00', '00'),
	(23, 0, '00', '00', '00'),
	(24, 0, '00', '00', '00'),
	(25, 0, '00', '00', '00'),
	(26, 0, '00', '00', '00'),
	(27, 0, '00', '00', '00');

-- Dumping structure for view ci3-tdl22.cyclist_winner_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `cyclist_winner_view` (
	`id` INT(3) NOT NULL,
	`nama` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_kategori` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status_pesepeda` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`urutan_finish` INT(3) NOT NULL,
	`jam` VARCHAR(2) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menit` VARCHAR(2) NOT NULL COLLATE 'utf8mb4_general_ci',
	`detik` VARCHAR(2) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table ci3-tdl22.cyclist_zone
CREATE TABLE IF NOT EXISTS `cyclist_zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_asaldaerah` varchar(1) NOT NULL DEFAULT '',
  `nama_provinsi` varchar(128) NOT NULL,
  `jenis_transportasi` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.cyclist_zone: ~20 rows (approximately)
INSERT INTO `cyclist_zone` (`id`, `kode_asaldaerah`, `nama_provinsi`, `jenis_transportasi`) VALUES
	(1, '1', 'Kalimantan Selatan', 'Mandiri'),
	(2, '1', 'Kalimantan Selatan', 'Mandiri'),
	(3, '1', 'Kalimantan Selatan', 'Panitia'),
	(4, '2', 'Kalimantan Tengah', 'Panitia'),
	(5, '1', 'Kalimantan Selatan', 'Mandiri'),
	(6, '1', 'Kalimantan Selatan', 'Mandiri'),
	(7, '3', 'Jakarta', 'Mandiri'),
	(8, '1', 'Kalimantan Selatan', 'Panitia'),
	(9, '2', 'Kalimantan Timur', 'Mandiri'),
	(10, '2', 'Kalimantan Tengah', 'Panitia'),
	(11, '3', 'Jawa Barat', 'Panitia'),
	(12, '1', 'Kalimantan Selatan', 'Mandiri'),
	(13, '2', 'Kalimantan Barat', 'Mandiri'),
	(14, '3', 'Bali', 'Mandiri'),
	(15, '1', 'Kalimantan Selatan', 'Panitia'),
	(16, '1', 'Kalimantan Selatan', 'Mandiri'),
	(17, '3', 'Jawa Tengah', 'Mandiri'),
	(18, '2', 'Kalimantan Tengah', 'Mandiri'),
	(19, '2', 'Kalimantan Tengah', 'Panitia'),
	(20, '1', 'Kalimantan Selatan', 'Panitia'),
	(21, '4', '', ''),
	(22, '4', '', ''),
	(23, '1', 'Kalimantan Selatan', 'Panitia'),
	(24, '1', 'Kalimantan Selatan', 'Panitia'),
	(25, '4', '', ''),
	(26, '4', '', ''),
	(27, '4', '', '');

-- Dumping structure for view ci3-tdl22.cyclist_zone_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `cyclist_zone_view` (
	`id` INT(3) NOT NULL,
	`nama` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`kode_asaldaerah` VARCHAR(1) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_asaldaerah` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_provinsi` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`jenis_transportasi` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table ci3-tdl22.jersey
CREATE TABLE IF NOT EXISTS `jersey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ukuran_jersey` varchar(128) NOT NULL,
  `chest` varchar(128) NOT NULL,
  `sleeve` varchar(128) NOT NULL,
  `front` varchar(128) NOT NULL,
  `back` varchar(128) NOT NULL,
  `gambar_ukuran` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.jersey: ~7 rows (approximately)
INSERT INTO `jersey` (`id`, `ukuran_jersey`, `chest`, `sleeve`, `front`, `back`, `gambar_ukuran`, `keterangan`) VALUES
	(1, 'XS', '83cm', '34cm', '50cm', '62cm', 'xs.png', 'Jersey Ukuran XS'),
	(2, 'S', '86cm', '35cm', '52cm', '64cm', 's.png', 'Jersey Ukuran S'),
	(3, 'M', '90cm', '36cm', '54cm', '66cm', 'm.png', 'Jersey Ukuran M'),
	(4, 'L', '95cm', '37cm', '56cm', '68cm', 'l.png', 'Jersey Ukuran L'),
	(5, 'XL', '100cm', '39cm', '58cm', '70cm', 'xl.png', 'Jersey Ukuran XL'),
	(6, 'XXL', '104cm', '40cm', '60cm', '72cm', 'xxl.png', 'Jersey Ukuran XXL'),
	(7, '-', '-', '-', '-', '-', 'no.png', 'Tidak Memesan'),
	(15, '*', '', '', '', '', '', '');

-- Dumping structure for view ci3-tdl22.jersey_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `jersey_view` (
	`id` INT(11) NOT NULL,
	`ukuran_jersey` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`chest` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`sleeve` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`front` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`back` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`gambar_ukuran` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`keterangan` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`jlh` BIGINT(21) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for table ci3-tdl22.sponsor
CREATE TABLE IF NOT EXISTS `sponsor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_event` varchar(128) NOT NULL,
  `tanggal_event` date NOT NULL,
  `nama_sponsor` varchar(128) NOT NULL,
  `bentuk_dukungan` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.sponsor: ~2 rows (approximately)
INSERT INTO `sponsor` (`id`, `nama_event`, `tanggal_event`, `nama_sponsor`, `bentuk_dukungan`) VALUES
	(1, 'Tour de Loksado 2022', '2022-07-23', 'HiC1000', '1000 Botol Minuman HiC1000'),
	(2, 'Tour de Loksado 2021', '2022-07-24', 'Pocari Sweat', 'Ballon Gate Untuk Start dan Finish');

-- Dumping structure for table ci3-tdl22.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.user: ~24 rows (approximately)
INSERT INTO `user` (`id`, `name`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
	(0, 'Hadi Santoso', 'hadisan', 'hadisan@gmail.com', 'pasfoto-redbg_ss.png', '$2y$10$dSCnod5LFyhqAJ2Y80q8pOb8pnZ8yfKBI5LZuHUnBEwOmEz1e6co.', 1, 1, 1659155018),
	(1, 'Mailan', 'mailan', 't4ya_mailan@yahoo.co.id', 'default.jpg', '$2y$10$dfzROYFXzJJnSQiX52Vp.uj5vs15O09HICQhaM.o1jpVLvP44VOYm', 2, 1, 2022),
	(2, 'Wirro', 'wirro', 'wirro7@gmail.com', 'default.jpg', '$2y$10$ViB5dNPXiBrT6F/o40eDa.rpgt3BixyN8.SprFPx8XpQwo/i/6lHW', 2, 1, 2022),
	(3, 'Roni Fauzie', 'roni-fauzie', 'roni.fauzie45@gmail.com', 'default.jpg', '$2y$10$e2FSnXLlACprULHLCeTGTeDO8hrUix15qsS.7jhOSZ5RgRK93AJOC', 2, 1, 2022),
	(4, 'Didik Fatkurrohman', 'didik-fatkurrohman', 'didi.ppk@gmail.com', 'default.jpg', '$2y$10$BHLIywmyxXSwvXkOuxQQS.b1DMOHOJSn1xLkf.1G0fM13MT5hzklS', 2, 1, 2022),
	(5, 'Muhammad Hijrah Saputra', 'muhammad-hijrah-saputra', 'hijrahsaputra2012@gmail.com', 'default.jpg', '$2y$10$F37pvngvnvHq7Y.t7nXHVeaf2EZlrd7Aw6m8VNLYlkQITYM4pUjy.', 2, 1, 2022),
	(6, 'Fery Susanto', 'fery-susanto', 'fery.susanto.ahmad@gmail.com', 'default.jpg', '$2y$10$.71y78DzimtSgBC9rFzNfe7e.QuiP0lcVlETlSmNLnHFqieVkLahO', 2, 1, 2022),
	(7, 'Muhammad Adetya Dharma', 'muhammad-adetya-dharma', 'aditya.ma33@gmail.com', 'default.jpg', '$2y$10$IXMiVWTavbDOOpvlzpD7bOQz7XNteKpCrmO3jIQfOONRxAuQ87O9O', 2, 1, 2022),
	(8, 'Md.Syarief Rahman', 'mdsyarief-rahman', 'syariefrahman75@gmail.com', 'default.jpg', '$2y$10$WG95xiQxtxObzepCVse4NeZwdVaf4tO020N6C/Hxs5ynG6iVTTQPe', 2, 1, 2022),
	(9, 'Akhmad Afrianda Rezkie', 'akhmad-afrianda-rezkie', 'afrianda7@gmail.com', 'default.jpg', '$2y$10$zW36o4mP6Dud9y7LRPN56euSq7FZm6t310/LfCF7ZQThFllyfF3PG', 2, 1, 2022),
	(10, 'Lilik Setiawan', 'lilik-setiawan', 'odnamokreider87@gmail.com ', 'default.jpg', '$2y$10$I9jqJ9T5iNvkFPxOXtUZeeEENJR1FGjI8u4aVqG0xoSlWjIzGEe8S', 2, 1, 2022),
	(11, 'Iwan Athoy', 'iwan-athoy', 'iwan.athoillah@gmail.com', 'default.jpg', '$2y$10$nQQ3Pp00m1/aXK.xx8Q2.uDNm5VNsSLwEGayie.a/MR.oQC0oaoDa', 2, 1, 2022),
	(12, 'Arief Irwan Mulyandi', 'arief-irwan-mulyandi', 'arief.site@gmail.com', 'default.jpg', '$2y$10$tX5d8V7rhM7ZwZ7vf8QrDOxZa/.PJBYqlLCBOM6oWkK8sC84o/STK', 2, 1, 2022),
	(13, 'Aditya Gana', 'aditya-gana', 'aditya.gana.bm@gmail.com', 'default.jpg', '$2y$10$fzQJj.CljUo2wNOocF67B.OUKzyXAO0.9ZQW0x5KYbte5N2L8cKj6', 2, 1, 2022),
	(14, 'Wawan Setiawan', 'wawan-setiawan', 'wa2n87@gmail.com', 'default.jpg', '$2y$10$382COyCxV65gZKei/QKyrOLEXMnHuSxElJjaq4rowpQC6rZ/LWF72', 2, 1, 2022),
	(15, 'Yunan M', 'yunan-m', 'yunan.y2a@gmail.com ', 'default.jpg', '$2y$10$bBpsxRMS2bE0nuGlLHnfceErP94A7ftZRrfGVRclRF9QhuLjDDxOC', 2, 1, 2022),
	(16, 'M Haris Afdilah', 'm-haris-afdilah', 'assyura90@gmail.com', 'default.jpg', '$2y$10$1QFWlcSAr0b16llhAjwHA.M5q/oTGN9OwOGnjPIt9nWFTH6LCr98K', 2, 1, 2022),
	(17, 'Renaldo Ariai Panauhan', 'renaldo-ariai-panauhan', 'nando.smk@gmail.com', 'default.jpg', '$2y$10$ec4CZVH1P1nAtCSwFWdTaOTfwtXUtX1kVHpjk8mPIhaHseudOheHK', 2, 1, 2022),
	(18, 'Viqri Ahmad Reza', 'viqri-ahmad-reza', 'viqri.reza@gmail.com ', 'default.jpg', '$2y$10$V0xk29OeGWO1SlMsxEGZIeHVsCOe2YgeD9x8LEvkMPcy/F4Nhb2pq', 2, 1, 2022),
	(19, 'Rieriens', 'rieriens', 'aliffirdaus7154@gmail.com ', 'default.jpg', '$2y$10$hkas8.N0aAq5JMs8S1waJuUSh.rJFJse2NwuGJa3jtXFHhoqaSNMa', 2, 1, 2022),
	(20, 'Riza Pahlivi', 'riza-pahlivi', 'pahlivvi@gmail.com', 'default.jpg', '$2y$10$N86ERmSc4TQjsC4wIWielON7ETFCtIl4UefusFh5/lUDTo.0B97UC', 2, 1, 2022),
	(21, 'Hadi Santoso', 'hadi-santoso', 'hadisantoso@gmail.com', 'default.jpg', '$2y$10$iu1juocBrFqG73pMUII1vObQXbboKJVX.o7YVn7PLKSO2Vxxc4Fa2', 2, 1, 1660358199),
	(22, 'Tes Daftar', 'tes-daftar', 'tesja@gmail.com', 'default.jpg', '$2y$10$pgMTUiCe5C0wwlMTYqonrubF2m6j36wHxZnMrZrSxzdR5/jgH4qhC', 2, 1, 1660359562),
	(23, 'Syamsul', 'syamsul', 'syamsul@gmail.com', 'default.jpg', '$2y$10$k9r/OMgyuWZBsZKYeSYgT.d/6YVHQHD3mexNQ377XApMx/iLTetAC', 2, 1, 1660616341),
	(24, 'Farid Fuady', 'farid-fuady', 'faridfuady@gmail.com', 'default.jpg', '$2y$10$UB90fj/QulvWDrexOQ5aOOX6Xf2ogVWZl7ACfO9uXy6TsFJQRBM.m', 2, 1, 1660630812),
	(25, 'Roronoa Zoro', 'roronoa-zoro', 'roronoazoro@gmail.com', 'default.jpg', '$2y$10$wdLEl/x4wZDFE84xhHlSWOeDJRtDhJCbwNrRZpNYqSqLvmjMCtjYa', 2, 1, 1666686668),
	(26, 'Reza Fikri', 'reza-fikri', 'rezafikri@gmail.com', 'default.jpg', '$2y$10$rPh017o2uEC2vT0XHcW5DuIXaolodCZZfUmsg57pVaPD/aQmA8eRO', 2, 1, 1666689387),
	(27, 'Eko Prasetyo', 'eko-prasetyo', 'ekoprasetyo@gmail.com', 'default.jpg', '$2y$10$Bt26uAIrGUwy3/p78krYjOkgyC4pYFZDUNY0uXKf6PFBY8DjLSPXm', 2, 1, 1666689825),
	(1000, 'Ismail', 'ismail', 'ismail@gmail.com', 'default.jpg', '$2y$10$dSCnod5LFyhqAJ2Y80q8pOb8pnZ8yfKBI5LZuHUnBEwOmEz1e6co.', 3, 1, 2022);

-- Dumping structure for table ci3-tdl22.user_access_menu
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.user_access_menu: ~9 rows (approximately)
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 2, 2),
	(4, 1, 3),
	(8, 1, 9),
	(9, 1, 10),
	(10, 2, 10),
	(11, 3, 10),
	(12, 3, 2),
	(13, 3, 11),
	(14, 2, 12),
	(15, 7, 10);

-- Dumping structure for table ci3-tdl22.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.user_menu: ~7 rows (approximately)
INSERT INTO `user_menu` (`id`, `menu`) VALUES
	(1, 'Admin'),
	(2, 'User'),
	(3, 'Menu'),
	(9, 'Data'),
	(10, 'About'),
	(11, 'Pimpinan'),
	(12, 'Pesepeda');

-- Dumping structure for table ci3-tdl22.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.user_role: ~3 rows (approximately)
INSERT INTO `user_role` (`id`, `role`) VALUES
	(1, 'Admin'),
	(2, 'User'),
	(3, 'Pimpinan');

-- Dumping structure for table ci3-tdl22.user_sub_menu
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.user_sub_menu: ~32 rows (approximately)
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
	(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
	(2, 2, 'My Account Profile', 'user', 'fas fa-fw fa-user', 1),
	(3, 2, 'Edit Account Profile', 'user/editProfile', 'fas fa-fw fa-user-edit', 1),
	(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
	(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
	(8, 1, 'Article Management', 'admin/article', 'fa-solid fa-fw fa-square-pen', 1),
	(9, 1, 'Role Management', 'admin/role', 'fas fa-fw fa-user-tie', 1),
	(10, 2, 'Change Password', 'user/changePassword', 'fas fa-fw fa-key', 1),
	(12, 9, 'Cyclist', 'cyclist', 'fa-solid fa-fw fa-person', 1),
	(13, 10, 'Tour de Loksado 2022', 'about', 'fa-solid fa-fw fa-mountain', 1),
	(14, 10, 'Valindo Event Organizer', 'about/valindo', 'fa-solid fa-fw fa-building', 1),
	(15, 9, 'Cyclist Category', 'category', 'fa-solid fa-fw fa-clone', 1),
	(17, 9, 'Cyclist Zone', 'zone', 'fa-solid fa-fw fa-earth-asia', 1),
	(19, 9, 'Cyclist Payment', 'payment', 'fa-solid fa-fw fa-wallet', 1),
	(22, 10, 'Informations', 'about/infoUpdate', 'fa-solid fa-fw fa-circle-info', 1),
	(24, 11, 'Cyclist', 'pimpinan/cyclistPimpinan', 'fas fa-fw fa-person', 1),
	(25, 11, 'Cyclist Category', 'pimpinan/categoryPimpinan', 'fa-solid fa-fw fa-clone', 1),
	(26, 11, 'Cyclist Zone', 'pimpinan/zonePimpinan', 'fa-solid fa-fw fa-earth-asia', 1),
	(27, 11, 'Cyclist Payment', 'pimpinan/paymentPimpinan', 'fa-solid fa-fw fa-wallet', 1),
	(28, 11, 'Cyclist Incident', 'pimpinan/incidentPimpinan', 'fa-solid fa-fw fa-burst', 1),
	(29, 11, 'Cyclist Finisher', 'pimpinan/finisherPimpinan', 'fa-solid fa-fw fa-trophy', 1),
	(30, 12, 'Cyclist', 'pesepeda/cyclistPesepeda', 'fa-solid fa-fw fa-person', 0),
	(31, 12, 'Cyclist Category', 'pesepeda/categoryPesepeda', 'fa-solid fa-fw fa-clone', 0),
	(32, 11, 'Chart', 'pimpinan/chart', 'fa-solid fa-fw fa-chart-area', 1),
	(33, 1, 'User Management', 'admin/userManagement', 'fa-solid fa-fw fa-user-plus', 1),
	(34, 9, 'Cyclist Incident', 'incident', 'fa-solid fa-fw fa-burst', 1),
	(35, 9, 'Cyclist Finisher', 'winner', 'fa-solid fa-fw fa-trophy', 1),
	(38, 9, 'Cyclist Import', 'cyclist/cyclistImport', 'fa-solid fa-fw fa-file-import', 1),
	(39, 12, 'Home', 'pesepeda', 'fa-solid fa-fw fa-house', 1),
	(40, 12, 'My Cyclist Data', 'pesepeda/myCyclistData', 'fa-solid fa-fw fa-id-card', 1),
	(41, 12, 'My Cyclist Category', 'pesepeda/myCategoryData', 'fa-solid fa-fw fa-clone', 1),
	(42, 12, 'My Cyclist Zone', 'pesepeda/myZoneData', 'fa-solid fa-fw fa-earth-asia', 1),
	(43, 12, 'My Cyclist Payment', 'pesepeda/myPaymentData', 'fa-solid fa-fw fa-wallet', 1),
	(52, 9, 'Sponsor', 'sponsor', 'fa-solid fa-fw fa-burst', 0),
	(53, 12, 'Feedback', 'pesepeda/feedback', 'fa-solid fa-fw fa-envelope-open-text', 1),
	(54, 9, 'Cyclist Feedback', 'feedback', 'fa-solid fa-fw fa-envelope-open-text', 1);

-- Dumping structure for view ci3-tdl22.user_sub_menu_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `user_sub_menu_view` (
	`id` INT(11) NOT NULL,
	`menu_id` INT(11) NOT NULL,
	`title` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`url` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`icon` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`is_active` INT(1) NOT NULL,
	`menu` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view ci3-tdl22.user_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `user_view` (
	`id` INT(11) NOT NULL,
	`name` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`username` VARCHAR(128) NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`image` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`role` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table ci3-tdl22.zone
CREATE TABLE IF NOT EXISTS `zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_asaldaerah` varchar(128) NOT NULL,
  `kode_asaldaerah` int(1) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3-tdl22.zone: ~4 rows (approximately)
INSERT INTO `zone` (`id`, `nama_asaldaerah`, `kode_asaldaerah`, `gambar`) VALUES
	(1, 'Kalimantan Selatan', 1, 'kalsel.png'),
	(2, 'Luar Kalimantan Selatan', 2, 'kalimantan.png'),
	(3, 'Luar Pulau Kalimantan', 3, 'indonesia.png'),
	(4, '*', 4, 'null.png');

-- Dumping structure for view ci3-tdl22.zone_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `zone_view` (
	`id` INT(11) NOT NULL,
	`nama_asaldaerah` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`kode_asaldaerah` INT(1) NOT NULL,
	`gambar` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`jlh` BIGINT(21) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view ci3-tdl22.category_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `category_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `category_view` AS select `c`.`id` AS `id`,`c`.`kode_kategori` AS `kode_kategori`,`c`.`nama_kategori` AS `nama_kategori`,`c`.`umur_kategori` AS `umur_kategori`,`c`.`gambar_kategori` AS `gambar_kategori`,`countc`.`jlh` AS `jlh` from (`category` `c` join `count_cyclist_per_category_view` `countc` on(`c`.`kode_kategori` = `countc`.`kode_kategori`));

-- Dumping structure for view ci3-tdl22.count_cyclist_per_category_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `count_cyclist_per_category_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `count_cyclist_per_category_view` AS select count(0) AS `jlh`,`cyclist_category`.`kode_kategori` AS `kode_kategori` from `cyclist_category` group by `cyclist_category`.`kode_kategori`;

-- Dumping structure for view ci3-tdl22.count_cyclist_per_date_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `count_cyclist_per_date_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `count_cyclist_per_date_view` AS select count(`cyclist`.`tanggal_daftar`) AS `jlh_dftr_perhari`,`cyclist`.`tanggal_daftar` AS `tanggal_daftar` from `cyclist` group by `cyclist`.`tanggal_daftar`;

-- Dumping structure for view ci3-tdl22.count_cyclist_per_jersey_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `count_cyclist_per_jersey_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `count_cyclist_per_jersey_view` AS select count(0) AS `jlh`,`cyclist_payment`.`ukuran_jersey` AS `ukuran_jersey` from `cyclist_payment` group by `cyclist_payment`.`ukuran_jersey`;

-- Dumping structure for view ci3-tdl22.count_cyclist_per_province_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `count_cyclist_per_province_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `count_cyclist_per_province_view` AS select count(0) AS `jlh`,`cyclist_zone`.`nama_provinsi` AS `nama_provinsi` from `cyclist_zone` where `cyclist_zone`.`nama_provinsi` <> '' group by `cyclist_zone`.`nama_provinsi`;

-- Dumping structure for view ci3-tdl22.count_cyclist_per_zone_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `count_cyclist_per_zone_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `count_cyclist_per_zone_view` AS select count(0) AS `jlh`,`cyclist_zone`.`kode_asaldaerah` AS `kode_asaldaerah` from `cyclist_zone` group by `cyclist_zone`.`kode_asaldaerah`;

-- Dumping structure for view ci3-tdl22.cyclist_category_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `cyclist_category_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `cyclist_category_view` AS select `cyclist_category`.`id` AS `id`,`cyclist`.`nama` AS `nama`,`cyclist_category`.`challenge_kom` AS `challenge_kom`,`cyclist_category`.`kode_kategori` AS `kode_kategori`,`category`.`nama_kategori` AS `nama_kategori`,`cyclist_category`.`bamboo_rafting` AS `bamboo_rafting` from ((`cyclist` join `cyclist_category` on(`cyclist`.`id` = `cyclist_category`.`id`)) join `category` on(`category`.`kode_kategori` = `cyclist_category`.`kode_kategori`)) order by `cyclist`.`id`;

-- Dumping structure for view ci3-tdl22.cyclist_detail_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `cyclist_detail_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `cyclist_detail_view` AS select `c`.`id` AS `id`,`c`.`no_identitas` AS `no_identitas`,`c`.`nama` AS `nama`,`c`.`username` AS `username`,`c`.`tanggal_lahir` AS `tanggal_lahir`,`c`.`jenis_kelamin` AS `jenis_kelamin`,`c`.`alamat` AS `alamat`,`c`.`telp` AS `telp`,`c`.`email` AS `email`,`c`.`foto` AS `foto`,`c`.`tanggal_daftar` AS `tanggal_daftar`,`cc`.`challenge_kom` AS `challenge_kom`,`cc`.`nama_kategori` AS `nama_kategori`,`cc`.`bamboo_rafting` AS `bamboo_rafting`,`cz`.`nama_asaldaerah` AS `nama_asaldaerah`,`cz`.`nama_provinsi` AS `nama_provinsi`,`cz`.`jenis_transportasi` AS `jenis_transportasi`,`cp`.`bayar_asuransi` AS `bayar_asuransi`,`cp`.`status_bayar_asuransi` AS `status_bayar_asuransi`,`cp`.`beli_jersey` AS `beli_jersey`,`cp`.`bayar_jersey` AS `bayar_jersey`,`cp`.`ukuran_jersey` AS `ukuran_jersey`,`cp`.`status_bayar_jersey` AS `status_bayar_jersey` from (((`cyclist` `c` join `cyclist_category_view` `cc` on(`c`.`id` = `cc`.`id`)) join `cyclist_zone_view` `cz` on(`c`.`id` = `cz`.`id`)) join `cyclist_payment_view` `cp` on(`c`.`id` = `cp`.`id`));

-- Dumping structure for view ci3-tdl22.cyclist_evacuate_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `cyclist_evacuate_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `cyclist_evacuate_view` AS select `c`.`id` AS `id`,`c`.`nama` AS `nama`,`cgv`.`nama_kategori` AS `nama_kategori`,`ci`.`status_pesepeda` AS `status_pesepeda`,`ci`.`level_kecelakaan` AS `level_kecelakaan`,`ci`.`kecelakaan` AS `kecelakaan` from (((`cyclist` `c` join `cyclist_winner` `cw` on(`c`.`id` = `cw`.`id`)) join `cyclist_category_view` `cgv` on(`c`.`id` = `cgv`.`id`)) join `cyclist_incident` `ci` on(`c`.`id` = `ci`.`id`)) where `ci`.`status_pesepeda` = 'Dievakuasi' group by `c`.`id`;

-- Dumping structure for view ci3-tdl22.cyclist_feedback_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `cyclist_feedback_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `cyclist_feedback_view` AS select `f`.`id` AS `id`,`c`.`nama` AS `nama`,`f`.`nilai` AS `nilai`,`f`.`komentar` AS `komentar` from (`cyclist` `c` join `cyclist_feedback` `f` on(`c`.`id` = `f`.`id`));

-- Dumping structure for view ci3-tdl22.cyclist_incident_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `cyclist_incident_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `cyclist_incident_view` AS select `c`.`id` AS `id`,`c`.`nama` AS `nama`,`ci`.`level_kecelakaan` AS `level_kecelakaan`,`ci`.`kecelakaan` AS `kecelakaan`,`ci`.`status_pesepeda` AS `status_pesepeda` from (`cyclist` `c` join `cyclist_incident` `ci` on(`c`.`id` = `ci`.`id`));

-- Dumping structure for view ci3-tdl22.cyclist_payment_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `cyclist_payment_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `cyclist_payment_view` AS select `c`.`id` AS `id`,`c`.`nama` AS `nama`,`cp`.`bayar_asuransi` AS `bayar_asuransi`,`cp`.`status_bayar_asuransi` AS `status_bayar_asuransi`,`cp`.`beli_jersey` AS `beli_jersey`,`cp`.`bayar_jersey` AS `bayar_jersey`,`cp`.`ukuran_jersey` AS `ukuran_jersey`,`cp`.`status_bayar_jersey` AS `status_bayar_jersey` from (`cyclist` `c` join `cyclist_payment` `cp` on(`c`.`id` = `cp`.`id`));

-- Dumping structure for view ci3-tdl22.cyclist_winner_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `cyclist_winner_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `cyclist_winner_view` AS select `c`.`id` AS `id`,`c`.`nama` AS `nama`,`cgv`.`nama_kategori` AS `nama_kategori`,`ci`.`status_pesepeda` AS `status_pesepeda`,`cw`.`urutan_finish` AS `urutan_finish`,`cw`.`jam` AS `jam`,`cw`.`menit` AS `menit`,`cw`.`detik` AS `detik` from (((`cyclist` `c` join `cyclist_winner` `cw` on(`c`.`id` = `cw`.`id`)) join `cyclist_category_view` `cgv` on(`c`.`id` = `cgv`.`id`)) join `cyclist_incident` `ci` on(`c`.`id` = `ci`.`id`)) group by `c`.`id`;

-- Dumping structure for view ci3-tdl22.cyclist_zone_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `cyclist_zone_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `cyclist_zone_view` AS select `c`.`id` AS `id`,`c`.`nama` AS `nama`,`cz`.`kode_asaldaerah` AS `kode_asaldaerah`,`z`.`nama_asaldaerah` AS `nama_asaldaerah`,`cz`.`nama_provinsi` AS `nama_provinsi`,`cz`.`jenis_transportasi` AS `jenis_transportasi` from ((`cyclist` `c` join `cyclist_zone` `cz` on(`c`.`id` = `cz`.`id`)) join `zone` `z` on(`cz`.`kode_asaldaerah` = `z`.`kode_asaldaerah`));

-- Dumping structure for view ci3-tdl22.jersey_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `jersey_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `jersey_view` AS select `j`.`id` AS `id`,`j`.`ukuran_jersey` AS `ukuran_jersey`,`j`.`chest` AS `chest`,`j`.`sleeve` AS `sleeve`,`j`.`front` AS `front`,`j`.`back` AS `back`,`j`.`gambar_ukuran` AS `gambar_ukuran`,`j`.`keterangan` AS `keterangan`,`countj`.`jlh` AS `jlh` from (`jersey` `j` join `count_cyclist_per_jersey_view` `countj` on(`j`.`ukuran_jersey` = `countj`.`ukuran_jersey`));

-- Dumping structure for view ci3-tdl22.user_sub_menu_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `user_sub_menu_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `user_sub_menu_view` AS select `user_sub_menu`.`id` AS `id`,`user_sub_menu`.`menu_id` AS `menu_id`,`user_sub_menu`.`title` AS `title`,`user_sub_menu`.`url` AS `url`,`user_sub_menu`.`icon` AS `icon`,`user_sub_menu`.`is_active` AS `is_active`,`user_menu`.`menu` AS `menu` from (`user_sub_menu` join `user_menu` on(`user_sub_menu`.`menu_id` = `user_menu`.`id`));

-- Dumping structure for view ci3-tdl22.user_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `user_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `user_view` AS select `u`.`id` AS `id`,`u`.`name` AS `name`,`u`.`username` AS `username`,`u`.`email` AS `email`,`u`.`image` AS `image`,`r`.`role` AS `role` from (`user` `u` join `user_role` `r` on(`u`.`role_id` = `r`.`id`));

-- Dumping structure for view ci3-tdl22.zone_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `zone_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `zone_view` AS select `z`.`id` AS `id`,`z`.`nama_asaldaerah` AS `nama_asaldaerah`,`z`.`kode_asaldaerah` AS `kode_asaldaerah`,`z`.`gambar` AS `gambar`,`countc`.`jlh` AS `jlh` from (`zone` `z` join `count_cyclist_per_zone_view` `countc` on(`z`.`kode_asaldaerah` = `countc`.`kode_asaldaerah`));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
