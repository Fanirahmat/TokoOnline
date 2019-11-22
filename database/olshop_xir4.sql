-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2019 pada 14.15
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
-- Database: `olshop_xir4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'SoeparnoAsmara', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `gambar`, `harga`, `stok`, `id_kategori`) VALUES
(1, 'Laptop Lonovo', 'images1.jpg', '7000000', 10154, 1),
(3, 'Hedset VIVO', 'Farhan_Habibun_13.JPG', '75000', 10, 2),
(9, 'Hedset VIVO', 'oracle2.JPG', '700', 10, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Laptop'),
(2, 'Aksesoris'),
(4, 'Software');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id_nota`, `id_pembeli`, `bukti`, `tgl`, `grandtotal`) VALUES
(14, 6, '', '2019-02-01', 7000000),
(15, 6, '', '2019-02-01', 0),
(16, 6, '', '2019-02-04', 75000),
(17, 6, '', '2019-02-04', 0),
(18, 6, '', '2019-02-04', 7000000),
(19, 6, '', '2019-02-04', 75000),
(20, 6, '', '2019-02-04', 75000),
(21, 6, '', '2019-02-04', 7000000),
(22, 6, '', '2019-02-04', 7000000),
(23, 6, '', '2019-02-04', 700),
(24, 6, '', '2019-02-04', 7000000),
(25, 6, '', '2019-02-04', 1400),
(26, 6, 'Kamar1.jpeg', '2019-02-04', 75000),
(27, 6, '1.JPG', '2019-02-10', 8000000),
(28, 6, '', '2019-04-29', 7075000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `alamat`, `no_telp`, `username`, `password`) VALUES
(1, 'Soeparno', 'JL. Danau Laut Sungai No.10', '085123456', 'soeparnoAsmara', 'asmara123'),
(2, 'Joni Iskandara', 'Jl. Bulan Bintang', '124341211231', 'SuperJoni', 'Joni123'),
(4, 'Achmad Jihad', 'Jl. Danau Sentanu', '08573284926432', 'thestepenine', '12345'),
(6, 'as', 'as', '12', 'admin', '123'),
(7, 'fasya', 'nganjuks', '08573284926432', 'fas123', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `id_nota`, `id_barang`, `qty`) VALUES
(22, 14, 1, 1),
(23, 16, 3, 1),
(24, 18, 1, 1),
(25, 19, 3, 1),
(26, 20, 3, 1),
(27, 21, 1, 1),
(28, 22, 1, 1),
(29, 23, 9, 1),
(30, 24, 1, 1),
(31, 25, 9, 2),
(32, 26, 3, 1),
(33, 27, 1, 1),
(34, 27, 1, 1),
(35, 28, 1, 1),
(36, 28, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `id_nota` (`id_nota`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_nota`) REFERENCES `nota` (`id_nota`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
