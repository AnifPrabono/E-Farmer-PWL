-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2019 pada 15.58
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_farmer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `email`) VALUES
('U1', 'admin', '$2y$11$f8/O/sPMyj8pkP9FMDSa9OBoK.u0rxFeImQtkf5HQRMneoB6VjLWS', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `curah_hujan`
--

CREATE TABLE `curah_hujan` (
  `id_hujan` varchar(20) NOT NULL,
  `hujan_min` varchar(10) DEFAULT NULL,
  `hujan_max` varchar(10) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `curah_hujan`
--

INSERT INTO `curah_hujan` (`id_hujan`, `hujan_min`, `hujan_max`, `kategori`) VALUES
('H001', '0', '50', 'Sangat Ringan'),
('H002', '51', '200', 'Ringan'),
('H003', '201', '250', 'Sedang'),
('H004', '251', '300', 'Lebat'),
('H005', '301', '350', 'Sangat Lebat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_history` varchar(10) NOT NULL,
  `id_user` varchar(5) DEFAULT NULL,
  `hujan` varchar(5) DEFAULT NULL,
  `suhu` varchar(5) DEFAULT NULL,
  `tanah` varchar(5) DEFAULT NULL,
  `tinggi` varchar(5) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id_history`, `id_user`, `hujan`, `suhu`, `tanah`, `tinggi`, `lat`, `lng`, `time`) VALUES
('H5d923c870', 'U6', 'H003', '23.14', 't04', '', '-7.7580896', '110.4131398', '2019-09-30'),
('H5d923d1c1', 'U8', 'H005', '23.14', 't01', '', '-7.7580874999999985', '110.41310899999999', '2019-09-30'),
('H5dab163db', 'U6', 'H001', '27.84', 't02', '', '-6.42994876935472', '106.79372551586914', '2019-10-19'),
('H5daf236c8', 'U6', 'H005', '22.48', 't05', '', '-7.757545995919756', '110.40860888133287', '2019-10-22'),
('H5ddf87404', 'U6', 'H003', '34', 't04', '', '-7.758154599999999', '110.41312459999999', '2019-11-28'),
('H5de13ef19', 'U1', 'H004', '25.8', 't03', '', '-7.7581215', '110.41311739999999', '2019-11-29'),
('H5de69b947', 'U1', 'H002', '24.07', 't01', '', '-7.7581408', '110.4131324', '2019-12-04'),
('H5de69bd91', 'U9', 'H003', '24.07', 't04', '', '-7.7581412', '110.4131785', '2019-12-04'),
('H5df654d33', 'U1', 'H003', '23.73', 't02', '', '-7.758124199999999', '110.41309919999999', '2019-12-15'),
('H5df65508d', 'U8', 'H003', '23.73', 't04', '', '-7.758114', '110.41316929999999', '2019-12-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `input_user`
--

CREATE TABLE `input_user` (
  `lokasi` varchar(100) DEFAULT NULL,
  `Bulan_tanam` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketinggian`
--

CREATE TABLE `ketinggian` (
  `id_ketinggian` varchar(5) DEFAULT NULL,
  `max_tinggi` varchar(5) DEFAULT NULL,
  `min_tinggi` varchar(5) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ketinggian`
--

INSERT INTO `ketinggian` (`id_ketinggian`, `max_tinggi`, `min_tinggi`, `kategori`) VALUES
('K01', '200', '0', 'dataran rendah'),
('K02', '900', '501', 'dataran tinggi'),
('K03', '500', '201', 'Bukit'),
('K04', '12000', '901', 'Gunung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suhu`
--

CREATE TABLE `suhu` (
  `id_suhu` varchar(5) NOT NULL,
  `min_suhu` varchar(5) DEFAULT NULL,
  `max_suhu` varchar(5) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suhu`
--

INSERT INTO `suhu` (`id_suhu`, `min_suhu`, `max_suhu`, `kategori`) VALUES
('s01', '6.2', '11', 'dingin'),
('s02', '11.1', '17', 'sejuk'),
('s03', '17.1', '22', 'sedang'),
('s04', '22.1', '40', 'tropis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanah`
--

CREATE TABLE `tanah` (
  `id_tanah` varchar(5) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `ph_max` varchar(12) DEFAULT NULL,
  `ph_min` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanah`
--

INSERT INTO `tanah` (`id_tanah`, `kategori`, `ph_max`, `ph_min`) VALUES
('t01', 'sangat masam', '4.5', '0'),
('t02', 'masam', '5.5', '4.6'),
('t03', 'agak masam', '6.5', '5.6'),
('t04', 'netral', '7.5', '6.6'),
('t05', 'agak alkalis', '8.5', '7.6'),
('t06', 'alkalis', '14.5', '8.6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanaman`
--

CREATE TABLE `tanaman` (
  `id_tanaman` varchar(6) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `waktu_panen` varchar(10) DEFAULT NULL,
  `harga` varchar(15) DEFAULT NULL,
  `ketinggian` varchar(10) DEFAULT NULL,
  `suhu` varchar(5) DEFAULT NULL,
  `jenis_tanah` varchar(30) DEFAULT NULL,
  `curah_hujan` varchar(20) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanaman`
--

INSERT INTO `tanaman` (`id_tanaman`, `nama`, `waktu_panen`, `harga`, `ketinggian`, `suhu`, `jenis_tanah`, `curah_hujan`, `gambar`) VALUES
('TA001', 'Selada Air', '90', '10.000-14.000', 'K01', 's03', 't03', 'H001', '1.seladaair.png'),
('TA002', 'Tomat', '60 - 90', '12.000', 'K02', 's04', 't03', 'H003', '2.32b25e3-manfaat-sayur-tomat.png'),
('TA003', 'Timun', '30-35', '8.000', 'K02', 's04', 't04', 'H001', '3.timun-png-2.png'),
('TA004', 'Cabai paprika', '40', '20.000-36.000', 'K02', 's03', 't04', 'H002', '4.paprika-oleoresin-500x500.png'),
('TA005', 'Bayam', '25', '5.000', 'K01', 's04', 't04', 'H002', '5.bayam-png-3.png'),
('TA006', 'Sawi', '30-60', '5000', 'K01', 's02', 't03', 'H002', '6.sawi-png-4.png'),
('TA007', 'Brokoli', '55-100', '5000-10000', 'K04', 's03', 't04', 'H002', '7.brokoli.png'),
('TA008', 'Kangkung', '27-30', '11000', 'K04', 's04', 't04', 'H002', '9kangkung.png'),
('TA009', 'Kemangi', '25', '2000-20000', 'K02', 's04', 't04', 'H002', '9.png'),
('TA010', 'Ketumbar', '30-40', '22000', 'K04', 's02', 't04', 'H002', '10.png'),
('TA011', 'Seledri', '30-90', '16.000', 'K04', 's04', 't03', 'H002', '11seledri.png'),
('TA012', 'Cabe', '30-35', '80.000', 'K02', 's04', 't04', 'H001', '12Cabe.png'),
('TA013', 'Buncis', '30', '20.000-50.000', 'K04', 's04', 't04', 'H002', '13buncis-png.png'),
('TA014', 'Terong', '90-120', '4.000-30.000', 'K02', 's04', 't03', 'H003', '14terongungu.png'),
('TA015', 'Pare', '30-50', '10.000-13.000', 'K02', 's01', 't03', 'H003', '15.Biji_Benih_Sayuran_Pare_Isi_4.png'),
('TA016', 'Kentang', '90-120', '12.000-20.000', 'K04', 's02', 't05', 'H002', '16potatoes-2829118_960_720.png'),
('TA017', 'Apel', '120-150', '30.000-35.000', 'K02', 's01', 't04', 'H003', '17.buah-apel-png.png'),
('TA018', 'Kelapa', '20-40', '8.000-12.000', 'K02', 's03', 't03', 'H001', '18.gambar-kelapa-png-6.png'),
('TA019', 'Pisang', '155-170', '18.000-30.000', 'K02', 's04', 't01', 'H002', '19.png-pisang-pisang-berkakhasiat-kurangi-depresi-640.png'),
('TA020', 'Jagung', '30-90', '1.500-2.500', 'K04', 's04', 't03', 'H003', '20.gambar-jagung-png-3.png'),
('TA022', 'Belimbing Wuluh', '90', '10.000-25.000', 'K01', 's04', 't02', 'H002', '22.belimbing-wuluh.jpg'),
('TA023', 'Temu lawak', '9-10', '20.000-50.000', 'K02', 's04', 't01', 'H002', '23.temulawak-png.png'),
('TA024', 'Lidah buaya', '4-6', '10.000-30.000', 'K02', 's04', 't03', 'H003', '24.ManfaatLidahBuaya.png'),
('TA025', 'Kumis kucing', '2-3', '7.500-10.000', 'K02', 's04', 't02', 'H003', '25.kumis-kucing-png-1.png'),
('TA026', 'Keji beling', '3', '15.000-20.000', 'K02', 's04', 't04', 'H002', '26.png'),
('TA027', 'Daun jarak', '20-60', '10.000', 'K01', 's03', 't03', 'H003', '27.4-Cara-Termudah-Dalam-Mengecilkan-Dahi-Yang-Jenong-3.png'),
('TA028', 'Daun beluntas', '30', '20.000', 'K02', 's04', 't03', 'H004', '28.png'),
('TA029', 'Cepaka putih', '30', '45-50.000', 'K01', 's04', 't02', 'H003', '29..jpg'),
('TA030', 'Daun adas', '360', '12.000', 'K02', 's04', 't05', 'H003', '30.leaves-3668772_960_720.png'),
('TA031', 'Jinten', '90-120', '10.000', 'K03', 's03', 't02', 'H004', '31.habatussauda.png'),
('TA032', 'Salak', '30-150', '2.500-10.000', 'K02', 's04', 't02', 'H004', '32.Buah-Salak-Foto-Crop-Nusantaranews.png'),
('TA033', 'Lobak', '60', '12.000', 'K02', 's03', 't03', 'H004', '33.Lobak.png'),
('TA034', 'Kecambah', '30-60', '20.000-25.000', 'K04', 's03', 't03', 'H005', '34.kecambah-tauge.png'),
('TA035', 'Teh', '6-55', '5.000-10.000', 'K02', 's04', 't02', 'H005', '35.daun-teh-png-3.png'),
('TA036', 'Kantong semar', '90', '10.000-35.000', 'K02', 's04', 't02', 'H004', '36.6.-bunga.jpg'),
('TA037', 'Lavender', '30-60', '2.000-50.000', 'K04', 's03', 't04', 'H004', '37.Lavender-01_0e207185-dc26-4d92-8538-fdd0a65079d6.png'),
('TA038', 'Murbei', '30-90', '35.000', 'K02', 's03', 't04', 'H004', '38,beri-hitam.png'),
('TA039', 'Stevia', '30', '2.000-10.000', 'K02', 's03', 't05', 'H004', '39.stevia.png'),
('TA041', 'Daun cincau', '30-60', '48.000', 'K02', 's04', 't03', 'H005', '41.daun-cincau-hitam.jpg'),
('TA042', 'Daun saga', '60', '45.000', 'K02', 's03', 't02', 'H005', '42.9-Manfaat-Daun-Saga-dan-Burung.jpg'),
('TA043', 'srikaya', '30-75', '75.000', 'K02', 's03', 't03', 'H005', '43.srikaya_jumbo_ungul.png'),
('TA044', 'Daun tempuyung', '60', '65.000', 'K04', 's01', 't03', 'H004', '44.tempuyung.png'),
('TA047', 'Jengkol', '90-180', '20.000-100.000', 'K02', 's03', 't05', 'H004', '47.a06361d0385e6082dc3fc1b783dd1021.png'),
('TA048', 'Gambas', '30-60', '2.000-15.000', 'K03', 's04', 't04', 'H004', '48.Oyong-1.png'),
('TA049', 'Kacang kapri', '45', '27.000', 'K02', 's03', 't03', 'H004', '49.pod-855267_960_720.png'),
('TA051', 'Kecipir', '30-160', '19.000', 'K04', 's03', 't03', 'H004', '51.kecipir.jpg'),
('TA052', 'Katuk', '240', '3.000-6.500', 'K02', 's04', 't06', 'H005', '52.daunkatuk.png'),
('TA053', 'Tebu', '160-360', '10.000-20.000', 'K01', 's03', 't05', 'H003', '53.es-tebu-png.png'),
('TA054', 'Turi', '30-90', '1.000-5.000', 'K02', 's02', 't04', 'H005', '54.tanaman-turi.jpg'),
('TA055', 'Rebung', '100-190', '1.800-65.000', 'K02', 's03', 't03', 'H004', '55.3Rebung-bambu-688x355.png'),
('TA056', 'Genjer', '60-90', '2.000', 'K01', 's03', 't04', 'H004', '56.manfaat-sayur-genjer-300x235.png'),
('TA057', 'Petai', '90-160', '300-4.000', 'K01', 's01', 't01', 'H002', '57.petai-png.png'),
('TA058', 'Bengkuang', '120-150', '5.000-20.000', 'K02', 's04', 't05', 'H004', '58.Bengkoang.png'),
('TA060', 'Durian', '240', '30.000-300.000', 'K02', 's04', 't04', 'H005', '60.sau-rieng-ri-6-ngon-gia-re.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
('U8', 'anif', '$2y$11$JJObw9fBZf1UPvjjAlnRLuxnaGkiVOES8H6Si7WW.FWxmvNdV9qKW', 'anif@gmail.com'),
('U9', 'tedi', '$2y$11$JoB3sjjvm/rqNH0iUQ4DoebU32RqUyW3dYb7xX2xjSfE/fAYw64/m', 'tedi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `curah_hujan`
--
ALTER TABLE `curah_hujan`
  ADD PRIMARY KEY (`id_hujan`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `suhu`
--
ALTER TABLE `suhu`
  ADD PRIMARY KEY (`id_suhu`);

--
-- Indeks untuk tabel `tanaman`
--
ALTER TABLE `tanaman`
  ADD PRIMARY KEY (`id_tanaman`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
