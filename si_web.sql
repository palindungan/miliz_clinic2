-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2018 pada 10.59
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id_jenis_obat` char(3) NOT NULL,
  `nm_jenis_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_obat`
--

INSERT INTO `jenis_obat` (`id_jenis_obat`, `nm_jenis_obat`) VALUES
('J01', 'PIL'),
('J02', 'SERBUK'),
('J03', 'SIRUP'),
('J04', 'CREAM'),
('J05', 'LOTION'),
('J06', 'KAPSUL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` char(4) NOT NULL,
  `nm_karyawan` varchar(50) NOT NULL,
  `almt_karyawan` text NOT NULL,
  `jenkel_karyawan` enum('pria','wanita') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nm_karyawan`, `almt_karyawan`, `jenkel_karyawan`, `username`, `password`, `level`) VALUES
('K001', 'kika', 'lumajang', 'pria', 'kika', '$2y$10$sy0Lb5xT4YKDoyMCdQd00Opo75jjmmXGt216ztJ31VBXP7m.Kg68m', 'admin'),
('K002', 'pras', 'bondowoso', 'pria', 'pras', '$2y$10$Braurr8XfgyOCorrd1txGuq8TrbvUYfCIAa0ehK.FJZWU5GOEigZa', 'admin'),
('K003', 'rama', 'jember', 'pria', 'rama', '$2y$10$S5MI7/j7hsTxOLgqvQDtfucV7As7ZtmopCJ9JgbOnnbGl.lz0cfHC', 'kasir'),
('K004', 'indri', 'jember', 'wanita', 'indri', '$2y$10$EDEgDjpNjVzD.VuxKQza9eZBmMocAQ3x0fnhYIpYq.AOyIoQQc24W', 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` char(6) NOT NULL,
  `nm_konsultasi` varchar(50) NOT NULL,
  `hrg_konsultasi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `nm_konsultasi`, `hrg_konsultasi`) VALUES
('B00001', 'konsultasi1', 50000),
('B00002', 'konsultasi2', 75000),
('B00003', 'konsultasi3', 100000),
('B00004', 'konsultasi4', 125000),
('B00005', 'konsultasi5', 150000),
('B00006', 'konsultasi6', 175000),
('B00007', 'konsultasi7', 200000),
('B00008', 'konsultasi8', 225000),
('B00009', 'konsultasi9', 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` char(7) NOT NULL,
  `id_jenis_obat` char(3) NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `hrg_beli` int(10) NOT NULL,
  `hrg_jual` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `id_jenis_obat`, `nm_obat`, `hrg_beli`, `hrg_jual`) VALUES
('O000001', 'J01', 'salep kulit herbal', 15000, 20000),
('O000002', 'J03', 'dexmolex 100ml', 10000, 12500),
('O000003', 'J04', 'dermovate cream 25gram', 90000, 100000),
('O000004', 'J04', 'Acelit Obat Cina', 40000, 50000),
('O000005', 'J05', 'lotion forte', 85000, 90000),
('O000006', 'J04', 'aldara cream-imiquimod', 325000, 330000),
('O000007', 'J04', 'MTC - Obat Gatal Jamur', 150000, 175000),
('O000008', 'J01', 'isotretinoin treviso 10mg', 400000, 425000),
('O000009', 'J04', 'Collagen Activator', 80000, 90000),
('O000010', 'J06', 'beli garcia ekstrak kulit manggis isi 60 kapsul', 125000, 150000),
('O000011', 'J04', 'ceradan 80 gram', 310000, 320000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` char(7) NOT NULL,
  `nm_pasien` varchar(50) NOT NULL,
  `almt_pasien` text NOT NULL,
  `umur` smallint(3) NOT NULL,
  `jenkel_pasien` enum('pria','wanita') NOT NULL,
  `no_hp` char(15) NOT NULL,
  `tgl_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nm_pasien`, `almt_pasien`, `umur`, `jenkel_pasien`, `no_hp`, `tgl_reg`) VALUES
('P000001', 'Hardana Mandala', 'Ki. Bak Mandi No. 485, Banda Aceh 39519, KalTim', 31, 'pria', '0320 7410 601', '2018-12-01'),
('P000002', 'Pia Fujiati', 'Ki. Bahagia No. 560, Palopo 86851, Bengkulu', 12, 'wanita', '0401 4063 684', '2018-12-03'),
('P000003', 'Budi Thamrin', 'Psr. Setiabudhi No. 431, Jambi 77917, NTT', 20, 'pria', '0498 4609 453', '2018-12-05'),
('P000004', 'Kayla Susanti S T', 'Gg. Bakin No. 281, Pekalongan 59315, Bengkulu', 21, 'wanita', '(+62)3123123123', '2018-12-07'),
('P000005', 'Hasna Lestari', 'Kpg. Ir. H. Juanda No. 732, Bekasi 28152, Bali', 31, 'wanita', '(+62)1612164531', '2018-12-07'),
('P000006', 'Adiarja Narpati', 'Ds. Tubagus Ismail No. 186, Singkawang 41826, SumSel', 22, 'pria', '0451 8309 254', '2018-12-09'),
('P000007', 'Liman Laswi Waluyo S Farm', 'Dk. Merdeka No. 751, Sabang 34757, JaTim', 22, 'wanita', '0654 9270 757', '2018-12-10'),
('P000008', 'Agus Pratama', 'Dk. Bakau Griya Utama No. 166, Administrasi Jakarta Selatan 31837, Bengkulu', 33, 'pria', '0683 3071 0790', '2018-12-11'),
('P000009', 'Bakiono Marpaung S IP', 'Jr. Otto No. 486, Denpasar 54514, Riau', 41, 'pria', '081231231231231', '2018-12-12'),
('P000010', 'Legawa Danuja Hardiansyah S', 'Dk. Basoka No. 630, Blitar 80122, Papua', 33, 'pria', '(+62)8816007123', '2018-12-12'),
('P000011', 'Galih Samosir S Pt', 'Psr. Bagonwoto No. 617, Sibolga 46600, Jambi', 33, 'pria', '(+62)6196574', '2018-12-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` char(4) NOT NULL,
  `nm_pemasok` varchar(50) NOT NULL,
  `almt_pemasok` text NOT NULL,
  `no_hp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `nm_pemasok`, `almt_pemasok`, `no_hp`) VALUES
('P001', 'Distributor FIFORLIF Jember Kota', 'Telengsah, Jember Kidul, Kaliwates, Kabupaten Jember, Jawa Timur', '0812-4962-351'),
('P002', 'Distributor Bio7', 'perum. pondok gede czm 4 muktisari, Gumuksari, Tegal Besar, Kaliwates, Kabupaten Jember, Jawa Timur 68131', '0851-0209-1500'),
('P003', 'Nafisa Herbal', 'Jl. Sumatra No.177, Tegal Boto Lor, Sumbersari, Kabupaten Jember, Jawa Timur 68121', '081231232312312'),
('P004', 'Distributor Lactofun Herbal', 'Perumnas wonojati Blok A No.2, Wonojati, jenggawah, Wedan Gn., Wonojati, Jenggawah, Kabupaten Jember, Jawa Timur 68171', '0822-3127-4749'),
('P005', 'Distributor K-LINK', 'Curahtakir, Tempurejo, Kabupaten Jember, Jawa Timur 68173', '0823-3159-3257'),
('P006', 'PT. Karisma Indoagro Universal', 'Jl. Imam Bonjol No.45, Kaliwates Kidul, Tegal Besar, Kaliwates, Kabupaten Jember, Jawa Timur 68131', '(0331) 483333'),
('P007', 'Beautyrossa', 'F22, Jl. Nangka, Krajan, Patrang, Kabupaten Jember, Jawa Timur 68111', '0857-0822-2255'),
('P008', 'Toko Farina Herbal', 'Perumahan Permata Indah Blok G-9,, Gang Bentoel, Sumbersari, Tegal Boto Kidul, Sumbersari, Kabupaten Jember, Jawa Timur 68124', '0812-2002-747'),
('P009', 'Distributor Crystal X Jember', 'perumahan dharma alam blok BJ 07 desa sempusari kecamatan kaliwates, Dukuh Mencek, Sukorambi, Dukuh Mencek, Sukorambi, Botosari, Dukuh Mencek, Sukorambi, Kabupaten Jember, Jawa Timur 68151', '0823-4052-5668');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasokan`
--

CREATE TABLE `pemasokan` (
  `id_pemasokan` char(10) NOT NULL,
  `id_karyawan` char(4) NOT NULL,
  `id_pemasok` char(4) NOT NULL,
  `total_hrg` int(10) NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL,
  `tgl_pemasokan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasokan`
--

INSERT INTO `pemasokan` (`id_pemasokan`, `id_karyawan`, `id_pemasok`, `total_hrg`, `bayar`, `kembalian`, `tgl_pemasokan`) VALUES
('PK-0000001', 'K001', 'P001', 20500000, 20500000, 0, '2018-12-19'),
('PK-0000002', 'K001', 'P004', 18975000, 19000000, 25000, '2018-11-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` char(6) NOT NULL,
  `nm_perawatan` varchar(50) NOT NULL,
  `hrg_perawatan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perawatan`
--

INSERT INTO `perawatan` (`id_perawatan`, `nm_perawatan`, `hrg_perawatan`) VALUES
('PR0001', 'Chemical peeling', 100000),
('PR0002', 'Dermabrasi', 125000),
('PR0003', 'Botox', 200000),
('PR0004', 'Filler', 150000),
('PR0005', 'Laser resurfacing', 100000),
('PR0006', 'Collagen induction theraphy (microneedling)', 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_obat`
--

CREATE TABLE `stok_obat` (
  `id_stok_obat` int(11) NOT NULL,
  `id_pemasokan` char(10) NOT NULL,
  `id_obat` char(7) NOT NULL,
  `tgl_exp` date NOT NULL,
  `jumlah_stok` smallint(5) NOT NULL,
  `stok_awal` smallint(5) NOT NULL,
  `harga_so` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_obat`
--

INSERT INTO `stok_obat` (`id_stok_obat`, `id_pemasokan`, `id_obat`, `tgl_exp`, `jumlah_stok`, `stok_awal`, `harga_so`) VALUES
(8, 'PK-0000001', 'O000004', '2019-05-18', 26, 30, 1200000),
(9, 'PK-0000001', 'O000006', '2019-05-18', 25, 25, 8125000),
(10, 'PK-0000001', 'O000010', '2019-05-18', 15, 15, 1875000),
(11, 'PK-0000001', 'O000011', '2019-06-22', 19, 20, 6200000),
(12, 'PK-0000001', 'O000009', '2019-06-15', 20, 20, 1600000),
(13, 'PK-0000001', 'O000003', '2019-07-20', 15, 15, 1350000),
(14, 'PK-0000001', 'O000002', '2019-03-29', 15, 15, 150000),
(15, 'PK-0000002', 'O000008', '2019-06-15', 20, 20, 8000000),
(16, 'PK-0000002', 'O000005', '2019-06-22', 30, 30, 2550000),
(17, 'PK-0000002', 'O000005', '2019-07-27', 25, 25, 2125000),
(18, 'PK-0000002', 'O000007', '2019-06-22', 40, 40, 6000000),
(19, 'PK-0000002', 'O000001', '2019-03-22', 20, 20, 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` char(10) NOT NULL,
  `id_pasien` char(7) NOT NULL,
  `id_karyawan` char(4) NOT NULL,
  `total_hrg` int(10) NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pasien`, `id_karyawan`, `total_hrg`, `bayar`, `kembalian`, `tgl_transaksi`) VALUES
('TR-0000001', 'P000009', 'K001', 350000, 350006, 0, '2018-12-06'),
('TR-0000002', 'P000008', 'K001', 300000, 300000, 0, '2018-11-08'),
('TR-0000003', 'P000003', 'K001', 320000, 320000, 0, '2018-12-20'),
('TR-0000004', 'P000006', 'K003', 300000, 300000, 0, '2018-12-20'),
('TR-0000005', 'P000006', 'K004', 375000, 2000000, 1625000, '2018-12-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_konsultasi`
--

CREATE TABLE `transaksi_konsultasi` (
  `id_transaksi_konsultasi` int(11) NOT NULL,
  `id_transaksi` char(10) NOT NULL,
  `id_konsultasi` char(6) NOT NULL,
  `qty_konsultasi` smallint(5) NOT NULL,
  `harga_k` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_konsultasi`
--

INSERT INTO `transaksi_konsultasi` (`id_transaksi_konsultasi`, `id_transaksi`, `id_konsultasi`, `qty_konsultasi`, `harga_k`) VALUES
(1, 'TR-0000001', 'B00001', 1, 50000),
(2, 'TR-0000004', 'B00005', 2, 300000),
(3, 'TR-0000005', 'B00002', 1, 75000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_obat`
--

CREATE TABLE `transaksi_obat` (
  `id_transaksi_obat` int(11) NOT NULL,
  `id_transaksi` char(10) NOT NULL,
  `id_stok_obat` int(11) NOT NULL,
  `qty_obat` smallint(5) NOT NULL,
  `harga_o` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_obat`
--

INSERT INTO `transaksi_obat` (`id_transaksi_obat`, `id_transaksi`, `id_stok_obat`, `qty_obat`, `harga_o`) VALUES
(1, 'TR-0000001', 8, 2, 100000),
(2, 'TR-0000003', 11, 1, 320000),
(3, 'TR-0000005', 8, 2, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_perawatan`
--

CREATE TABLE `transaksi_perawatan` (
  `id_transaksi_perawatan` int(11) NOT NULL,
  `id_transaksi` char(10) NOT NULL,
  `id_perawatan` char(6) NOT NULL,
  `qty_perawatan` smallint(5) NOT NULL,
  `harga_p` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_perawatan`
--

INSERT INTO `transaksi_perawatan` (`id_transaksi_perawatan`, `id_transaksi`, `id_perawatan`, `qty_perawatan`, `harga_p`) VALUES
(1, 'TR-0000001', 'PR0003', 1, 200000),
(2, 'TR-0000002', 'PR0003', 1, 200000),
(3, 'TR-0000002', 'PR0001', 1, 100000),
(4, 'TR-0000005', 'PR0003', 1, 200000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id_jenis_obat`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_jenis_obat` (`id_jenis_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indeks untuk tabel `pemasokan`
--
ALTER TABLE `pemasokan`
  ADD PRIMARY KEY (`id_pemasokan`),
  ADD KEY `id_karyawan` (`id_karyawan`,`id_pemasok`),
  ADD KEY `pemasokan_ibfk_1` (`id_pemasok`);

--
-- Indeks untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`);

--
-- Indeks untuk tabel `stok_obat`
--
ALTER TABLE `stok_obat`
  ADD PRIMARY KEY (`id_stok_obat`),
  ADD KEY `id_pemasokan` (`id_pemasokan`,`id_obat`),
  ADD KEY `id_pemasokan_2` (`id_pemasokan`),
  ADD KEY `stok_obat_ibfk_1` (`id_obat`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pasien` (`id_pasien`,`id_karyawan`),
  ADD KEY `transaksi_ibfk_1` (`id_karyawan`);

--
-- Indeks untuk tabel `transaksi_konsultasi`
--
ALTER TABLE `transaksi_konsultasi`
  ADD PRIMARY KEY (`id_transaksi_konsultasi`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_konsultasi`),
  ADD KEY `transaksi_konsultasi_ibfk_2` (`id_konsultasi`);

--
-- Indeks untuk tabel `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD PRIMARY KEY (`id_transaksi_obat`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_stok_obat` (`id_stok_obat`);

--
-- Indeks untuk tabel `transaksi_perawatan`
--
ALTER TABLE `transaksi_perawatan`
  ADD PRIMARY KEY (`id_transaksi_perawatan`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_perawatan`),
  ADD KEY `transaksi_perawatan_ibfk_2` (`id_perawatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `stok_obat`
--
ALTER TABLE `stok_obat`
  MODIFY `id_stok_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `transaksi_konsultasi`
--
ALTER TABLE `transaksi_konsultasi`
  MODIFY `id_transaksi_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  MODIFY `id_transaksi_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi_perawatan`
--
ALTER TABLE `transaksi_perawatan`
  MODIFY `id_transaksi_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_jenis_obat`) REFERENCES `jenis_obat` (`id_jenis_obat`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemasokan`
--
ALTER TABLE `pemasokan`
  ADD CONSTRAINT `pemasokan_ibfk_1` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id_pemasok`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemasokan_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stok_obat`
--
ALTER TABLE `stok_obat`
  ADD CONSTRAINT `stok_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_obat_ibfk_2` FOREIGN KEY (`id_pemasokan`) REFERENCES `pemasokan` (`id_pemasokan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_konsultasi`
--
ALTER TABLE `transaksi_konsultasi`
  ADD CONSTRAINT `transaksi_konsultasi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_konsultasi_ibfk_2` FOREIGN KEY (`id_konsultasi`) REFERENCES `konsultasi` (`id_konsultasi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD CONSTRAINT `transaksi_obat_ibfk_1` FOREIGN KEY (`id_stok_obat`) REFERENCES `stok_obat` (`id_stok_obat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_obat_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_perawatan`
--
ALTER TABLE `transaksi_perawatan`
  ADD CONSTRAINT `transaksi_perawatan_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_perawatan_ibfk_2` FOREIGN KEY (`id_perawatan`) REFERENCES `perawatan` (`id_perawatan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
