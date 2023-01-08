-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 06:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_mata_dewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `Kode_Barang` varchar(5) NOT NULL,
  `Nama_Barang` varchar(40) NOT NULL,
  `Harga_Barang` int(11) NOT NULL,
  `Stock_Barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`Kode_Barang`, `Nama_Barang`, `Harga_Barang`, `Stock_Barang`) VALUES
('B0001', 'Beras Pandan Wangi', 20500, 50),
('B0002', 'Beras Setra Ramos', 10500, 27),
('B0003', 'Beras Rojo Lele', 12000, 44),
('B0004', 'Beras Pera', 13000, 40),
('B0005', 'Beras Merah', 12000, 45),
('B0006', 'Tepung Beras Rose Brand', 6500, 100),
('B0007', 'Tepung Ketan Rose Brand', 7500, 99),
('B0008', 'Tepung Bumbu Mama Suka', 15000, 100),
('B0009', 'Tepung Gandum Taj Mahal', 30000, 47),
('B0010', 'Tepung Jagung', 44500, 50),
('B0011', 'Tepung Tapioka', 6300, 100),
('B0012', 'Tepung Terigu Segitiga Biru', 1100, 100),
('B0013', 'Tepung Kanji', 5000, 100),
('B0014', 'Larrist Gula Pasir Premium Kuning', 15000, 50),
('B0015', 'Larrist Gula Pasir Premium Putih', 15000, 50),
('B0016', 'Gulaku Gula Tebu Premium Putih', 14500, 50),
('B0017', 'GMP Gula Pasir', 14000, 50),
('B0018', 'Rose Brand Gula Pasir Premium Putih', 17500, 50),
('B0019', 'Bawang Merah', 27000, 50),
('B0020', 'Bawang Puthin', 28000, 50),
('B0021', 'Tropical Minyak Goreng Botol 1 liter', 16800, 80),
('B0022', 'Sania Minyak Goreng Pouch 1 liter', 15100, 50),
('B0023', 'Bimoli Spesial Minyak Goreng Botol 1 lit', 15500, 100),
('B0024', 'Filma Minyak Goreng Pouch Botol 1 liter', 16500, 80),
('B0025', 'Sunco Minyak Goreng Botol 1 liter', 16000, 50),
('B0026', 'Margarin Amanda 500gr', 11000, 50),
('B0027', 'Margarin Blue Band 500gr', 12500, 80),
('B0028', 'Margarin Blue Band 1Kg', 26500, 50),
('B0029', 'Simas Palmia Royal Butter Margarine ', 6500, 50),
('B0030', 'Dancow Fortigro Bubuk Cokelat Sachet', 4000, 120),
('B0031', 'Dancow Fortigro Bubuk Vanilla Sachet', 4000, 120),
('B0032', 'INDOMILK Cokelat Susu Bubuk Sachet', 3500, 120),
('B0033', 'Frisian Flag Cokelat Bubuk Sachet', 2700, 96),
('B0034', 'Frisian Flag Vanilla Bubuk Sachet', 2700, 96),
('B0035', 'Telur Ayam Ras 1 Kg', 16000, 50),
('B0036', 'Telur Puyuh 1 Kg', 35000, 50),
('B0037', 'Telur Bebek 1 Kg', 27000, 50),
('B0038', 'Teh Celup Poci Asli25S', 5000, 100),
('B0039', 'Teh Celup Poci Vanila 25S', 5000, 100),
('B0040', 'Teh Celup Sosro Sachet', 2000, 100),
('B0041', 'Teh Sari Murni Kotak', 6000, 100),
('B0042', 'Teh Sari Wangi Kotak', 10000, 100),
('B0043', 'Good Day Original 20gr', 11000, 50),
('B0044', 'Good Day Cappucino 20gr', 16000, 50),
('B0045', 'Torabika Cappucino Kopi Sachet', 3000, 120),
('B0046', 'ABC Kopi Susu', 4000, 120),
('B0047', 'ABC KOpi Plus Gula', 2000, 120),
('B0048', 'Kapal Api Special Mix', 3000, 120),
('B0049', 'Luwak White Coffie Original Sachet', 2000, 120),
('B0050', 'Luwak White Coffie Less Sugar', 2000, 120),
('B0051', 'Indomie Goreng Mie Instan', 2500, 200),
('B0052', 'Indomie Instan Soto Mie', 2200, 200),
('B0053', 'Indomie Goreng Ayam Geprek', 3000, 200),
('B0054', 'Indomie Ayam Spesial', 2800, 200),
('B0055', 'Mie Sedap Kuah Soto', 2400, 200),
('B0056', 'Mie Sedap Kuah Ayam bawang', 2400, 200),
('B0057', 'Mie Sedap Goreng Kriuk', 3000, 200),
('B0058', 'Mie Sedap Korean Spicy Chicken', 3000, 200),
('B0059', 'Mie Sedap Kuah Soto', 2400, 200),
('B0060', 'Sarimi Isi 2 Ayam Bawang', 3500, 200),
('B0065', 'Teh Sosro', 5000, 30),
('B0066', 'Pop Mie Rasa Bakso', 5000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_jual`
--

CREATE TABLE `detail_transaksi_jual` (
  `ID_Jual` varchar(5) NOT NULL,
  `Kode_Barang` varchar(5) NOT NULL,
  `Jumlah_Barang` int(11) NOT NULL,
  `Harga_Jual_Barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi_jual`
--

INSERT INTO `detail_transaksi_jual` (`ID_Jual`, `Kode_Barang`, `Jumlah_Barang`, `Harga_Jual_Barang`) VALUES
('T0004', 'B0003', 3, 12000),
('T0005', 'B0002', 3, 10500),
('T0006', 'B0003', 3, 12000),
('T0007', 'B0005', 2, 12000),
('T0008', 'B0003', 2, 12000),
('T0008', 'B0001', 2, 20500),
('T0008', 'B0003', 2, 12000),
('T0008', 'B0001', 2, 20500),
('T0008', 'B0003', 2, 12000),
('T0008', 'B0001', 2, 20500),
('T0008', 'B0004', 2, 13000),
('T0008', 'B0004', 2, 13000),
('T0008', 'B0005', 2, 12000),
('T0008', 'B0004', 2, 13000),
('T0008', 'B0004', 2, 13000),
('T0008', 'B0005', 2, 12000),
('T0008', 'B0004', 2, 13000),
('T0008', 'B0004', 2, 13000),
('T0008', 'B0005', 2, 12000),
('T0009', 'B0001', 2, 20500),
('T0009', 'B0003', 4, 12000),
('T0010', 'B0001', 1, 20500),
('T0010', 'B0019', 4, 27000),
('T0011', 'B0003', 4, 12000),
('T0011', 'B0002', 3, 10500),
('T0012', 'B0003', 2, 12000),
('T0013', 'B0001', 3, 20500),
('T0013', 'B0005', 1, 12000),
('T0014', 'B0006', 12, 6500),
('T0014', 'B0001', 23, 20500),
('T0014', 'B0002', 3, 10500),
('T0014', 'B0002', 3, 10500),
('T0015', 'B0005', 3, 12000),
('T0015', 'B0009', 3, 30000),
('T0015', 'B0004', 4, 13000),
('T0015', 'B0007', 1, 7500),
('T0016', 'B0002', 4, 10500),
('T0020', 'B0002', 3, 10500),
('T0020', 'B0005', 2, 12000),
('T0021', 'B0002', 20, 10500),
('T0021', 'B0004', 3, 13000),
('T0021', 'B0003', 6, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `Kode_Karyawan` varchar(5) NOT NULL,
  `Nama_Karyawan` varchar(40) NOT NULL,
  `No_Telp_Karyawan` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`Kode_Karyawan`, `Nama_Karyawan`, `No_Telp_Karyawan`) VALUES
('K0001', 'Agus', '08123456788'),
('K0002', 'Budi', '081223445322'),
('K0003', 'Suyono', '081223556778'),
('K0005', 'Dewa', '0823346657'),
('K0006', 'Sandy', '08123974');

-- --------------------------------------------------------

--
-- Table structure for table `simpantransaksi`
--

CREATE TABLE `simpantransaksi` (
  `id_jual` varchar(5) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `kode_karyawan` varchar(5) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `jumlahBarang` int(11) NOT NULL,
  `hargaJualbarang` int(11) NOT NULL,
  `tgl_jual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jual`
--

CREATE TABLE `transaksi_jual` (
  `id_jual` varchar(5) NOT NULL,
  `Kode_Karyawan` varchar(5) NOT NULL,
  `Tanggal_Jual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_jual`
--

INSERT INTO `transaksi_jual` (`id_jual`, `Kode_Karyawan`, `Tanggal_Jual`) VALUES
('T0001', 'K0001', '2022-12-10'),
('T0002', 'K0002', '2022-12-11'),
('T0003', 'K0001', '2022-11-11'),
('T0004', 'K0001', '2022-12-11'),
('T0005', 'K0001', '2022-12-11'),
('T0006', 'K0001', '2022-12-11'),
('T0007', 'K0001', '2022-12-11'),
('T0008', 'K0001', '2022-12-11'),
('T0009', 'K0002', '2022-12-16'),
('T0010', 'K0002', '2022-12-16'),
('T0011', 'K0001', '2022-12-16'),
('T0012', 'K0001', '2022-12-17'),
('T0013', 'K0001', '2022-12-17'),
('T0014', 'K0002', '2022-12-17'),
('T0015', 'K0002', '2022-12-17'),
('T0016', 'K0002', '2022-12-19'),
('T0017', 'K0002', '2022-12-19'),
('T0018', 'K0002', '2022-12-19'),
('T0019', 'K0001', '2022-12-19'),
('T0020', 'K0002', '2022-12-19'),
('T0021', 'K0002', '2022-12-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`Kode_Barang`);

--
-- Indexes for table `detail_transaksi_jual`
--
ALTER TABLE `detail_transaksi_jual`
  ADD KEY `ID_Jual` (`ID_Jual`);
ALTER TABLE `detail_transaksi_jual` ADD FULLTEXT KEY `ID_Jual_2` (`ID_Jual`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`Kode_Karyawan`);

--
-- Indexes for table `simpantransaksi`
--
ALTER TABLE `simpantransaksi`
  ADD KEY `simpantransaksi_ibfk_1` (`kode_barang`);

--
-- Indexes for table `transaksi_jual`
--
ALTER TABLE `transaksi_jual`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `Kode_Karyawan` (`Kode_Karyawan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `simpantransaksi`
--
ALTER TABLE `simpantransaksi`
  ADD CONSTRAINT `simpantransaksi_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`Kode_Barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
